<?php

declare(strict_types=1);

namespace Fastest\Core\Modules;

final class vystavlenie_schetovModule extends \Fastest\Core\Modules\Module
{
    public function router()
    {        
        return $this->blockMethod();  
    }

    
    public function blockMethod()
    {
         $renters = Q("SELECT 
            `contract`.`id` as `contract_id`, `contract`.`number` as `contract_number`, `contract`.`datetime`,
            `contract`.`status`, `contract`.`summa`, `contract`.`start_date`, `contract`.`end_date`, `contract`.`peni`,
            `contract`.`start_arenda`,
            
            `room`.`id` as `room_id`, `room`.`number` as `room_number`, `room`.`floor`, `room`.`square`,
            `room`.`number_scheme`, 
            
            `renter`.`id` as `renter_id`, `renter`.`short_name`, `renter`.`full_name`, `renter`.`ogrn`, `renter`.`kpp`,
            `renter`.`inn`, `renter`.`bank_bik`, `renter`.`bank_ks`, `renter`.`bank_rs`, `renter`.`bank_name`,`renter`.`email`, 
            `renter`.`phone`, `renter`.`form`, `renter`.`post_adress`, `renter`.`uridich_address`  
            
            FROM `#_mdd_contracts` as `contract`					
            LEFT JOIN `#_mdd_rooms` as `room` ON `contract`.`rooms` = `room`.`id`
            LEFT JOIN `#_mdd_renters` as `renter` ON `contract`.`renter` = `renter`.`id` ORDER BY `renter`.`short_name` ASC", array())->all();
                  
         // exit(__($renters));

        return [
            'template' => 'block',
            'renters' => $renters
        ];
    }
}
