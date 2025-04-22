<?php global $db;

use Random\RandomException;

session_start();

if ($_SESSION['logged']) {
  header('Location: /index.php', 10);
  return;
}

require '../connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 'on');

/**
 * @throws RandomException
 */
function passgen(): string
{
  $randomNumber = random_int(0, 9999);
  return sprintf("%04d", $randomNumber);
}

$phone = $_POST['phone'];
$email = $_POST['email'];

$sql = "SELECT up_pk FROM user_profile WHERE phone='$phone' or email='$email' limit 1";
echo $sql;
$result = mysqli_query($db, $sql);
$count = mysqli_num_rows($result);
$result = mysqli_fetch_assoc($result);

if ($count == 0) {
  $ind = '"/index.php"';
  echo 'Пользователь не найден!';
  echo "<button onclick='location.replace($ind)'>На главную</button>";
  return;
}


$uid = $result['up_pk'];
$pass = passgen();

$sql = "Insert INTO auth_request(uid, pass) VALUES ('$uid', '$pass')";
$result = mysqli_query($db, $sql);

$_SESSION['uid'] = $uid;
$_SESSION['pass'] = $pass;

// code to send password on phone or email

header('Location: /pages/login_proceed.php', 10);
