<?php

declare(strict_types=1);

namespace Fastest\Core\Modules;

final class oplatyModule extends \Fastest\Core\Modules\Module
{
    public function router()
    {        
        return $this->blockMethod();
    }

    
    public function blockMethod()
    {

        $renter_name    = false;
        $payments_docs  = false;
        $checkbox       = false;
        $contracts      = false;
        $invoices       = false;

        // получаем список арендаторов
        $renters = Q("SELECT * FROM `#_mdd_renters` WHERE `visible` = ?i", array(1))->all();

        // получаем список договоров исходя из RENTER в GET-запросе
        if (isset($_GET['renter'])) { 
            $renter_id = $_GET['renter'];
            $contracts = Q("SELECT * FROM `#_mdd_renters`
                AS `renters`
                LEFT JOIN `#_mdd_contracts` AS `contracts`
                ON `renters`.`id` = `contracts`.`renter`
                WHERE `contracts`.`renter` = ?i", array($renter_id))->all();
        } 

        // получаем список cчетов исходя из ID в GET-запросе
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $invoices = Q("SELECT * FROM `#_mdd_invoice` WHERE `contract_id` = $id AND `rest` > 0 AND `status` != 0 ORDER BY `id` ASC")->all();
        }  
        //exit(__($invoices));

        return [
            'template'      => 'block',
            'renters'       => $renters,
            'contracts'     => $contracts,
            'checkbox'      => $checkbox,
            'invoices'      => $invoices
        ];
    }
}