<?php session_start();

$_SESSION['logged'] = false;
$_SESSION['name'] = null;

header('Location: /index.php', 10);
