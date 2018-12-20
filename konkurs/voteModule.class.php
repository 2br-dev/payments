<?php

declare(strict_types=1);

namespace Fastest\Core\Modules;

final class voteModule extends \Fastest\Core\Modules\Module
{
    public function router()
    {
        return $this->blockMethod();
    }
    
    public function blockMethod()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "authorization";
            
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        } 

        if ($_COOKIE['vote_young'] == 'voted') {
            for ($i = 1; $i <= 6; $i++) {
              $count = "SELECT * FROM `db_mdd_vote` WHERE `vote` = '$i' AND `vote_category` = 'young'";
              $result = mysqli_query($conn, $count);
              ${'result_young_'.$i} = mysqli_num_rows($result);
            }
          } else {
            for ($i = 1; $i <= 6; $i++) {
                ${'result_old_'.$i} = 0;
            } 
          }

          if ($_COOKIE['vote_old'] == 'voted') {
            for ($i = 1; $i <= 6; $i++) {
              $count = "SELECT * FROM `db_mdd_vote` WHERE `vote` = '$i' AND `vote_category` = 'old'";
              $result = mysqli_query($conn, $count);
              ${'result_old_'.$i} = mysqli_num_rows($result);
            }
          } else {
            for ($i = 1; $i <= 6; $i++) {
                ${'result_old_'.$i} = 0;
            } 
          }

        return [
            'template'          =>  'block',
            'result_young_1' => $result_young_1,
            'result_young_2' => $result_young_2,
            'result_young_3' => $result_young_3,
            'result_young_4' => $result_young_4,
            'result_young_5' => $result_young_5,
            'result_young_6' => $result_young_6,
            'result_old_1' =>   $result_old_1,
            'result_old_2' =>   $result_old_2,
            'result_old_3' =>   $result_old_3,
            'result_old_4' =>   $result_old_4,
            'result_old_5' =>   $result_old_5,
            'result_old_6' =>   $result_old_6,
        ];
    }
}