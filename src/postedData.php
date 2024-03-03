<?php
include "utilities.php";
$pdo = require_once "Connection.php";

$inputSum = convertPersianNumbersToEnglish($_POST['sum']);
$sum = $_SESSION['number1'] + $_SESSION['number2'];

if ($inputSum === $sum) {
  $_SESSION['incorrect_sum'] = false;
  echo "karet dorosteeeee";
  unset($_SESSION['number1']);
  unset($_SESSION['number2']);
  header("Location: http://localhost/captchaProject/src/welcome.php");
} else {
  $_SESSION['incorrect_sum'] = true;
  unset($_SESSION['number1']);
  unset($_SESSION['number2']);
  header("Location: http://localhost/captchaProject/src/");
}

$sql = "insert into users(name, lastName, age) VALUES(:name, :lastName, :age)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
  'name' => $_POST['u_name'],
  'lastName' => $_POST['u_lastName'],
  'age' => convertPersianNumbersToEnglish($_POST['u_age']),
]);
