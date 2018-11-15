<?php
if ($_POST)
{
  $host='localhost';
  $user='root';
  $pass='';
  $db='authorization';

  $conn=mysqli_connect($host,$user,$pass,$db);

  $login = mysqli_real_escape_string($conn, $_POST['login']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  //$password = md5($password);

  
  $query="SELECT * FROM db_mdd_renters WHERE login='$login' AND password='$password' ";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) == 1) {
      session_start();
      $_SESSION['authorization'] = 'true';
      header('location:index.php');
    }
    else {
      echo 'wrong username or password';
    }

}
?>

<head>
  <link rel="icon" href="/img/favicon.png" type="image/x-icon">
  <link type="text/css" rel="stylesheet" href="/css/login.css">
</head>

<body>
  <div class="grid">
    <div id="login">
      <h2><span class="fontawesome-lock"></span>Войти в систему</h2>
      <form action="" method="POST">
        <fieldset>
          <p><label for="login">Логин</label></p>
          <p><input type="text" id="login" name="login" placeholder="Введите ваш логин"></p>
          <p><label for="password">Пароль</label></p>
          <p><input type="password" id="password" name="password" placeholder="Введите ваш пароль"></p>
          <p><input type="submit" value="Войти"></p>
        </fieldset>
      </form>
    </div>
  </div>
</body>