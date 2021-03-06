<head>
  <link rel="icon" href="/img/favicon.png" type="image/x-icon">
  <link type="text/css" rel="stylesheet" href="/css/login.css">
</head>

<body>
  <div class="grid">
    <div id="login">
      <h2><span class="fontawesome-lock"></span>Войти в систему</h2>
      <form action="" method="POST" id="authorization">
        <fieldset>
          <p><label for="login">Логин</label></p>
          <p><input type="text" class="form-input" name="login" placeholder="Введите ваш логин"></p>
          <p><label for="password">Пароль</label></p>
          <p><input type="password" class="form-input" name="password" placeholder="Введите ваш пароль"></p>
          <p><input type="submit" value="Войти" id="submit"></p>
        </fieldset>
      </form>
    </div>
  </div>
  <div class="error">
  <div class="error-msg">
    <img src="/img/warning_white_48x48.png" alt="">
    <div class="error-msg-text">
      <p><strong>Неправильная пара логин-пароль! Авторизоваться не удалось</strong></p>
      <p>Возможно у вас выбрана другая раскладка клавиатуры или нажата клавиша "Caps Lock".<br>Попробейте авторизоваться ещё раз.</p>
    </div>
  </div>    
  </div>

  <script type="text/javascript" src="/static/js/jquery.min.js"></script>
  <script type="text/javascript" src="/static/js/main.js"></script>
</body>