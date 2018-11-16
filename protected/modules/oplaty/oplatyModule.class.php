<?php

declare(strict_types=1);

namespace Fastest\Core\Modules;

final class oplatyModule extends \Fastest\Core\Modules\Module
{
    public function router()
    {
        if (isset($this->arguments[1]))
        {
            return $this->errorPage;
        }

        if (isset($this->arguments[0]))
        {
            return $this->itemMethod(intval($this->arguments[0]));
        }

        return $this->listMethod();
    }

    public function listMethod()
    {
        # Пагинация
        #
        $pager = $this->pager($this->countItem(), $this->limit);

        $cache = 'module.oplaty.list';

        # Получение списка
        #
        if (!($oplaty = $this->compiled($cache)))
        {
            $oplaty = Q("SELECT * FROM `#_mdd_oplaty` WHERE `visible`=1 ORDER BY STR_TO_DATE(`date`, '%d.%m.%Y') DESC, `ord` DESC")->all();

            if (!empty($oplaty))
            {
                foreach ($oplaty as &$oplaty_item)
                {
                    $oplaty_item['date'] = Dates($oplaty_item['date'], $this->locale);
                }
            }

            $this->cache->setCache($cache, $oplaty);
        }

        # Мета теги
        #
        $meta = $this->metaData($oplaty);

        return [
            'meta'              =>  $meta,
            'pager'             =>  $pager,
            'oplaty'         =>  $oplaty,
            'template'          =>  'list'
        ];
    }

    public function itemMethod($system = '')
    {
        $cache = 'module.oplaty.item.'.$system;

        if (!($oplaty = $this->compiled($cache)))
        {
            $oplaty = Q("SELECT * FROM `#_mdd_oplaty` WHERE `visible`='1' AND `system` LIKE ?s LIMIT 1", [ $system ])->row();

            $oplaty['link'] = $this->linkCreate($oplaty['system']);
            $oplaty['date'] = Dates($oplaty['date'], $this->locale);

            $file = new Files;

            if (isset($oplaty['photo']))
            {
                $oplaty['photo'] = $file->getFilesByGroup($oplaty['photo'], ['sm', 'original'], ['id', 'title', 'file', 'ord', 'created'], true);
            }

            $this->cache->setCache($cache, $oplaty);
        }

        # Мета теги
        #
        $meta = $this->metaData($oplaty);

        # Хлебные крошки
        #
        $this->addBreadCrumbs($oplaty, [ 'id', 'id', 'name', 'system' ]);

        return [
            'meta'              =>  $meta,
            'page'              =>  [ 'name' => '' ],
            'oplaty'     =>  $oplaty,
            'breadcrumbs'       =>  $this->breadcrumbs,
            'template'          =>  'item'
        ];
    }

    public function blockMethod()
    {
        return [
            'template' => 'block'
        ];
    }
}