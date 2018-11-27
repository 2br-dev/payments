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

        $renter_name = false;
        $payments_docs = false;

        $payments = Q("SELECT  
        *         
        FROM `#_mdd_contracts` as `contract`

        LEFT JOIN `#_mdd_renters` as `renters`
        ON `contract`.`renter` = `renters`.`id`
         
        WHERE `contract`.`status` = ?i", array(1))->all();

        if (isset($_GET['renter'])) {
            $renter_name = $_GET['renter'];
     
                $payments_docs = Q("SELECT 
            
                *         
                FROM `#_mdd_contracts` as `contract`
        
                LEFT JOIN `#_mdd_renters` as `renters`
                ON `contract`.`renter` = `renters`.`id`

                LEFT JOIN `#_mdd_invoice` as `invoice`
                ON `contract`.`id` = `invoice`.`contract_id`
                 
                WHERE `renters`.`full_name` = ?s AND `contract`.`status` = ?i", array($renter_name, 1))->all();
        } 

        // exit(__($payments));

        return [
            'template' => 'block',
            'payments' => $payments,
            'payments_docs' => $payments_docs,
            'renter_name' => $renter_name
        ];
    }
}