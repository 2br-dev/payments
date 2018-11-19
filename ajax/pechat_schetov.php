<?php
if ($_POST)
{
  $host='localhost';
  $user='root';
  $pass='';
  $db='authorization';

  $conn=mysqli_connect($host,$user,$pass,$db);

  $year = mysqli_real_escape_string($conn, $_POST['year']);
  $month = mysqli_real_escape_string($conn, $_POST['month']);

  
  echo $year;
  echo $month;
  

  

}
?>