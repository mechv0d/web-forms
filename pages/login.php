<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Войти</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="/css/main.css"/>
</head>

<body class="login-body">

<script src="js/app.js"></script>

<header>
  <h1>Вход</h1>
  <button class="colored-button" onclick="location.replace('/index.php')">На главную</button>
</header>

<form id="submit_form" method="post" class="form_reg" action="/php/scripts/login_script.php">
  <label for="input_phone">Номер телефона</label>
  <input id="input_phone" name="phone" type="tel" pattern="+[0-9999]{1} [0-9]{3}-[0-9]{3}-[0-9]{4}"
         placeholder="+7 123-456-8901">

  <span>– Или введите почту –</span>

  <label for="input_email">Электронная почта</label>
  <input id="input_email" name="email" type="email" placeholder="Электронная почта">


  <input style="margin-top: 16px" class="colored-button attention" type="submit" value="Отправить код" name="doGo"/>


</form>

</body>

</html>
