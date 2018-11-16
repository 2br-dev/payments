<?php

  session_start();

  if(!$_SESSION['authorization']){
    header('location:login.php');
  }; 
  
  $t1 = microtime(true);

  require 'define.php';

  $app = new Fastest\Core\App();

  $app->terminate($_SERVER);

?>  



