<?php

declare(strict_types=1);
namespace Fastest\Core\Modules;
include_once 'define.php';

final class reestrModule extends \Fastest\Core\Modules\Module
{
    public function router()
    {        
        return $this->blockMethod();
    }

    
    public function blockMethod()
    {
        $servername = DB_HOST;
		$username 	= DB_USER;
		$password 	= DB_PASS;
		$dbname   	= DB_BASE;
        $conn = mysqli_connect($servername,$username,$password,$dbname);

        if (mysqli_connect_errno()) {
			die("Connection failed: " . $conn->connect_error);
        } 	

        $contracts = Q("SELECT * FROM `#_mdd_contracts`", array())->all();

        foreach($contracts as $contract) {
            if($contract['end_date'] == '' && $contract['status'] != 1) {
                $id = $contract['id'];
                $update = "UPDATE `db_mdd_contracts` SET `status` = 1 WHERE `id` = '$id'";
                $conn->query($update);
            }
        }

        $conn->close();
  
            if(isset($_GET['show'])) {
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
            } else {
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
            LEFT JOIN `#_mdd_renters` as `renter` ON `contract`.`renter` = `renter`.`id` WHERE `status` = 1", array())->all();
            }
                 
                 
        $renters = Q("SELECT * FROM `#_mdd_renters` WHERE `login` != 'admin'", array())->all();
         
        $today = strtotime(date("d.m.Y"));

        for ($i = 0; $i < count($reestr); $i++) {
            $date = strtotime($reestr[$i]['end_date']);
       
            if ($date - $today > 0 && $date - $today < 3600 * 24 * 30) {
                $reestr[$i]['status'] = 0.5; 
            }
        }

       // exit(__($renters));  
        return [
            'template'  => 'block',
            'reestr'    => $reestr,
            'renters'   => $renters
        ];
    }
}
