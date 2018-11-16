<?php

declare(strict_types=1);

namespace Fastest\Core\Modules;

final class vystavlenie-schetovModule extends \Fastest\Core\Modules\Module
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

        $cache = 'module.vystavlenie-schetov.list';

        # Получение списка
        #
        if (!($vystavlenie-schetov = $this->compiled($cache)))
        {
            $vystavlenie-schetov = Q("SELECT * FROM `#_mdd_vystavlenie-schetov` WHERE `visible`=1 ORDER BY STR_TO_DATE(`date`, '%d.%m.%Y') DESC, `ord` DESC")->all();

            if (!empty($vystavlenie-schetov))
            {
                foreach ($vystavlenie-schetov as &$vystavlenie-schetov_item)
                {
                    $vystavlenie-schetov_item['date'] = Dates($vystavlenie-schetov_item['date'], $this->locale);
                }
            }

            $this->cache->setCache($cache, $vystavlenie-schetov);
        }

        # Мета теги
        #
        $meta = $this->metaData($vystavlenie-schetov);

        return [
            'meta'              =>  $meta,
            'pager'             =>  $pager,
            'vystavlenie-schetov'         =>  $vystavlenie-schetov,
            'template'          =>  'list'
        ];
    }

    public function itemMethod($system = '')
    {
        $cache = 'module.vystavlenie-schetov.item.'.$system;

        if (!($vystavlenie-schetov = $this->compiled($cache)))
        {
            $vystavlenie-schetov = Q("SELECT * FROM `#_mdd_vystavlenie-schetov` WHERE `visible`='1' AND `system` LIKE ?s LIMIT 1", [ $system ])->row();

            $vystavlenie-schetov['link'] = $this->linkCreate($vystavlenie-schetov['system']);
            $vystavlenie-schetov['date'] = Dates($vystavlenie-schetov['date'], $this->locale);

            $file = new Files;

            if (isset($vystavlenie-schetov['photo']))
            {
                $vystavlenie-schetov['photo'] = $file->getFilesByGroup($vystavlenie-schetov['photo'], ['sm', 'original'], ['id', 'title', 'file', 'ord', 'created'], true);
            }

            $this->cache->setCache($cache, $vystavlenie-schetov);
        }

        # Мета теги
        #
        $meta = $this->metaData($vystavlenie-schetov);

        # Хлебные крошки
        #
        $this->addBreadCrumbs($vystavlenie-schetov, [ 'id', 'id', 'name', 'system' ]);

        return [
            'meta'              =>  $meta,
            'page'              =>  [ 'name' => '' ],
            'vystavlenie-schetov'     =>  $vystavlenie-schetov,
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