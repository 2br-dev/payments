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



/* $host='localhost';
$user='root';
$pass='';
$db='authorization';
$conn=mysqli_connect($host,$user,$pass,$db);

$get_login = Q("SELECT * FROM `#_mdd_renters` WHERE `login`='admin' AND `password`= '123213'", array())->row();
$username_login = $get_login['short_name'];

if($_SESSION['login'] == "Господь") {
    $_SESSION['admin'] = 'true';
} else {
    $_SESSION['admin'] = 'false';
}

exit(__($_SESSION)); */

        if (isset($_GET['renter'])) {
            $renter_name = $_GET['renter'];
     
                $payments_docs = Q("SELECT 
            
                *         
                FROM `#_mdd_contracts` as `contract`
        
                LEFT JOIN `#_mdd_renters` as `renters`
                ON `contract`.`renter` = `renters`.`id`

                LEFT JOIN `#_mdd_invoice` as `invoice`
                ON `contract`.`summa` = `invoice`.`rest`
                 
                WHERE `renters`.`full_name` = ?s AND `contract`.`status` = ?i", array($renter_name, 1))->all();
        } 

        return [
            'template' => 'block',
            'payments' => $payments,
            'payments_docs' => $payments_docs,
            'renter_name' => $renter_name
        ];
    }
}