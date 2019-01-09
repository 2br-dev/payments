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

        exit(__($_SERVER['REQUEST_URI'] == '/reestr-arendatorov'));
         $reestr = Q("SELECT 
            `contract`.`id` as `contract_id`, `contract`.`number` as `contract_number`, `contract`.`datetime`,
            `contract`.`status`, `contract`.`summa`, `contract`.`start_date`, `contract`.`end_date`, `contract`.`peni`,
            `contract`.`start_arenda`, `contract`.`status`, 
            
            `room`.`id` as `room_id`, `room`.`number` as `room_number`, `room`.`floor`, `room`.`square`,
            `room`.`number_scheme`, 
            
            `renter`.`id` as `renter_id`, `renter`.`short_name`, `renter`.`full_name`, `renter`.`ogrn`, `renter`.`kpp`,
            `renter`.`inn`, `renter`.`bank_bik`, `renter`.`bank_ks`, `renter`.`bank_rs`, `renter`.`bank_name`,`renter`.`email`, 
            `renter`.`phone`, `renter`.`balance`, `renter`.`form`, `renter`.`post_adress`, `renter`.`uridich_address`  
            
            FROM `#_mdd_contracts` as `contract`					
            LEFT JOIN `#_mdd_rooms` as `room` ON `contract`.`rooms` = `room`.`id`
            LEFT JOIN `#_mdd_renters` as `renter` ON `contract`.`renter` = `renter`.`id`", array())->all();
                 
        
        $renters = Q("SELECT * FROM `#_mdd_renters` WHERE `login` != 'admin'", array())->all();
         
        $today = strtotime(date("d.m.Y"));

        for ($i = 0; $i < count($reestr); $i++) {
            $date = strtotime($reestr[$i]['end_date']);
       
            if ($date - $today > 0 && $date - $today < 3600 * 24 * 30) {
                $reestr[$i]['status'] = 0.5; 
            }
        }

        // exit(__($reestr));
        return [
            'template'  => 'block',
            'reestr'    => $reestr,
            'renters'   => $renters
        ];
    }
}
