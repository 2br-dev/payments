<?php

declare(strict_types=1);

namespace Fastest\Core\Modules;

final class authorizationModule extends \Fastest\Core\Modules\Module
{
    public function router()
    {
        if (isset($this->arguments[0])) {
            return $this->errorPage;
        }

        if (count($_POST)) {
            return $this->postMethod();
        }

        return $this->formMethod();
    }

    public function postMethod()
    {
/*         if (strstr($_backuri, '?')) {
            $_backuri = current(explode('?', $_backuri));
        } */

/*         $con = mysqli_connect("localhost","root","","authorization");

        if (mysqli_connect_errno()) {
            echo"The Connection was not established" . mysqli_connect_error();
        }    
        
        $login = $_POST['login'];
        $pass =$_POST['password'];
         
        $ret = mysqli_query( $con, "SELECT * FROM db_mdd_renters WHERE login='$login' AND password='$pass' ") or die("Could not execute query: " .mysqli_error($conn));
        $row = mysqli_fetch_assoc($ret);
          
          if (!$row) {
                echo 'fail';
            }
            else {
              session_start();
              $_SESSION['user'] = $user;
                echo 'success';
            } */
/* 
        redirect($_backuri); */
    }

    public function formMethod()
    {
        return array(
            'template'        =>    'form'
        );
    }
}
