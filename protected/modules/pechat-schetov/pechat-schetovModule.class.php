<?php

declare(strict_types=1);

namespace Fastest\Core\Modules;

final class pechat-schetovModule extends \Fastest\Core\Modules\Module
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

        $cache = 'module.pechat-schetov.list';

        # Получение списка
        #
        if (!($pechat-schetov = $this->compiled($cache)))
        {
            $pechat-schetov = Q("SELECT * FROM `#_mdd_pechat-schetov` WHERE `visible`=1 ORDER BY STR_TO_DATE(`date`, '%d.%m.%Y') DESC, `ord` DESC")->all();

            if (!empty($pechat-schetov))
            {
                foreach ($pechat-schetov as &$pechat-schetov_item)
                {
                    $pechat-schetov_item['date'] = Dates($pechat-schetov_item['date'], $this->locale);
                }
            }

            $this->cache->setCache($cache, $pechat-schetov);
        }

        # Мета теги
        #
        $meta = $this->metaData($pechat-schetov);

        return [
            'meta'              =>  $meta,
            'pager'             =>  $pager,
            'pechat-schetov'         =>  $pechat-schetov,
            'template'          =>  'list'
        ];
    }

    public function itemMethod($system = '')
    {
        $cache = 'module.pechat-schetov.item.'.$system;

        if (!($pechat-schetov = $this->compiled($cache)))
        {
            $pechat-schetov = Q("SELECT * FROM `#_mdd_pechat-schetov` WHERE `visible`='1' AND `system` LIKE ?s LIMIT 1", [ $system ])->row();

            $pechat-schetov['link'] = $this->linkCreate($pechat-schetov['system']);
            $pechat-schetov['date'] = Dates($pechat-schetov['date'], $this->locale);

            $file = new Files;

            if (isset($pechat-schetov['photo']))
            {
                $pechat-schetov['photo'] = $file->getFilesByGroup($pechat-schetov['photo'], ['sm', 'original'], ['id', 'title', 'file', 'ord', 'created'], true);
            }

            $this->cache->setCache($cache, $pechat-schetov);
        }

        # Мета теги
        #
        $meta = $this->metaData($pechat-schetov);

        # Хлебные крошки
        #
        $this->addBreadCrumbs($pechat-schetov, [ 'id', 'id', 'name', 'system' ]);

        return [
            'meta'              =>  $meta,
            'page'              =>  [ 'name' => '' ],
            'pechat-schetov'     =>  $pechat-schetov,
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