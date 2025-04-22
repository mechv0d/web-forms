<?php session_start(); ?>

<!doctype html>
<html class="no-js" lang="">

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

<body>

<!-- Add your site or application content here -->
<script src="js/app.js"></script>

<?php
echo $_SESSION['pass'];
?>

<header>
  <h1>Вход</h1>
  <button class="colored-button" onclick="location.replace('/index.php')">На главную</button>
</header>

<form id="submit_form" method="post" class="form_reg" action="/php/scripts/login_proceed_script.php">
  <label for="input_code">Введите код</label>
  <input id="input_code" name="code" type="number" pattern="[0-9]{4}" required placeholder="Код">


  <input class="colored-button attention" type="submit" value="Войти" name="doGo"/>


</form>

</body>

</html>
