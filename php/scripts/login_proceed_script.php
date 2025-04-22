<?php global $db; session_start();

if ($_SESSION['logged']) {
  header('Location: /index.php', 10);
  return;
}


require '../connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 'on');

function is_expired(string $time, int $minutes_to_expire): bool {
  // Преобразуем строку datetime в объект DateTime
  $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $time);

  if ($dateTime === false) {
    //Обработка ошибки: некорректный формат даты
    error_log("Error: Invalid datetime format: $time");
    return true; //Или другое действие на ваше усмотрение
  }


  // Добавляем минуты к времени истечения
  $expirationTime = $dateTime->add(new DateInterval("PT{$minutes_to_expire}M"));

  // Сравниваем время истечения с текущим временем
  return $expirationTime < new DateTime();
}

$user_pass = $_POST['code'];
$uid = $_SESSION['uid'];
$pass = $_SESSION['pass'];

if ($user_pass != $pass) {
  $ind = '"/index.php"';
  echo 'Wrong password!';
  echo "<button onclick='location.replace($ind)'>На главную</button>";
  return;
}

$sql = "SELECT rq_id, time, minutes_to_expire FROM auth_request WHERE uid='$uid' and pass='$user_pass' limit 1";
$result = mysqli_query($db, $sql);
$count = mysqli_num_rows($result);
$result = mysqli_fetch_assoc($result);

$rq_id = $result["rq_id"];

if ($count == 0) {
  echo 'Запрос не найден!';
  return;
}

if (is_expired($result['time'], $result['minutes_to_expire'])) {
  echo 'Ваш запрос уже недействителен!';
  return;
}

$sql = "UPDATE auth_request
SET fulfilled = 1
WHERE rq_id = $rq_id;";
$result = mysqli_query($db, $sql);

$sql = "SELECT name FROM user_profile WHERE up_pk='$uid'";
$result = mysqli_query($db, $sql);
$result = mysqli_fetch_assoc($result);

$_SESSION['logged'] = true;
$_SESSION['name'] = $result["name"];

header('Location: /index.php', 10);
