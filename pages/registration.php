<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="/css/main.css"/>

  <title>Создать аккаунт</title>
</head>

<body>

<!-- Add your site or application content here -->
<script src="js/app.js"></script>

<header>
  <h1>Регистрация</h1>
  <button class="colored-button" onclick="location.replace('/index.php')">На главную</button>
</header>

<form id="submit_form" method="post" class="form_reg" action="/php/scripts/reg_script.php">
  <label for="input_surname">Фамилия</label>
  <input id="input_surname" name="surname" type="text" required placeholder="Фамилия">

  <label for="input_name">Имя</label>
  <input id="input_name" name="name" type="text" required placeholder="Имя">

  <label for="input_last_name">Отчество</label>
  <input id="input_last_name" name="last_name" type="text" placeholder="Отчество">

  <label for="input_birthdate">Дата рождения</label>
  <input id="input_birthdate" name="birthdate" type="date" required placeholder="Дата рождения" onchange="{
    const fullYears = Math.floor((Date.now() - new Date(document.querySelector('#input_birthdate').value).getTime()) / (365.25 * 24 * 60 * 60 * 1000));
    document.querySelector('#show_age').innerText = `Полных лет: ${fullYears}`
  } ">

  <span style="color: rgba(255, 255, 255, .9) !important;" id="show_age"></span>

  <label for="input_phone">Номер телефона</label>
  <input id="input_phone" name="phone" type="tel" pattern="+[0-9999]{1} [0-9]{3}-[0-9]{3}-[0-9]{4}" required
         placeholder="+7 123-456-8901">

  <label for="input_email">Электронная почта</label>
  <input id="input_email" name="email" type="email" required placeholder="Электронная почта">

  <label for="input_gender">Пол</label>
  <select id="input_gender" name="gender">
    <option value="not specified" selected>Не указан</option>
    <option value="male">Мужской</option>
    <option value="female">Женский</option>
  </select>

  <label for="input_education">Образование
    <input id="input_education" name="education" type="checkbox">
  </label>

  <label for="input_country">Страна</label>
  <select id="input_country" name="country">
    <option value="russia">Россия</option>
    <option value="belarus">Беларусь</option>
    <option value="kazakhstan">Казахстан</option>
    <option value="armenia">Армения</option>
    <option value="tadjikistan">Таджикистан</option>
  </select>
  <label for="input_pdata">Я согласен с обработкой моих персональных данных.
    <input id="input_pdata" name="personal_data" type="checkbox" required>
  </label>
  <input style="margin-top: 16px" class="colored-button attention" type="submit" value="Зарегистрироваться"
         name="doGo"/>
</form>

</body>

</html>
