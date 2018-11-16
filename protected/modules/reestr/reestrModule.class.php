<?php

declare(strict_types=1);

namespace Fastest\Core\Modules;

final class reestrModule extends \Fastest\Core\Modules\Module
{
    public function router()
    {        
        return $this->blockMethod();
    }

    
    public function blockMethod()
    {
        $reestr = Q("SELECT * FROM `db_mdd_renters` WHERE `visible` = ?i", array(1))->all();
        $contract = Q("SELECT * FROM `db_mdd_contracts` WHERE `visible` = ?i ORDER BY date DESC", array(1))->all();
        $rooms = Q("SELECT * FROM `db_mdd_rooms` WHERE `visible` = ?i", array(1))->all();

        // exit(__($rooms));

        return [
            'template' => 'block',
            'reestr' => $reestr,
            'contract' => $contract,
            'rooms' => $rooms,
        ];
    }
}
