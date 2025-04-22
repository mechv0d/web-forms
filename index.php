<?php session_start();

?>

<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes"/>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="/css/main.css"/>

  <title>Главная</title>
</head>

<body>

<h1>Главная</h1>

<?php
if ($_SESSION['logged']) {
  echo "Здравствуйте, {$_SESSION["name"]}!";
  echo <<<XYZ
<button class="colored-button" onclick="location.replace('/php/scripts/exit_auth.php')">Выйти</button>
XYZ;
} else {
  echo <<<XYZ
<button class="colored-button" onclick="location.replace('/pages/registration.php')">Создать аккаунт</button>
<button class="colored-button" onclick="location.replace('/pages/login.php')">Войти</button>
XYZ;
}

?>

</body>
</html>
