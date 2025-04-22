<?php global $db;
session_start();

if ($_SESSION['logged']) {
  header('Location: /index.php', 10);
  return;
}

require '../connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$surname = $_POST['surname'];
$name = $_POST['name'];
$last_name = $_POST['last_name'];
$birthdate = $_POST['birthdate'];
//$age = floor((time() - strtotime($birthdate))/31536000);
$phone = $_POST['phone'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$education = $_POST['education'] ? 1 : 0;
$country = $_POST['country'];

$sql = "Insert INTO user_profile(surname,name,last_name,birthdate,phone,email,gender,education,country)
VALUES('$surname','$name','$last_name','$birthdate','$phone','$email','$gender','$education','$country');";
$result = mysqli_query($db, $sql);

header('Location: /index.php', 10);
