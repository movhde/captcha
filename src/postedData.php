<?php
include "utilities.php";
$pdo = require_once "Connection.php";

$inputSum = convertPersianNumbersToEnglish($_POST['sum']);
$sum = $_SESSION['number1'] + $_SESSION['number2'];
$firstName = $_POST['u_name'];
$lastName = $_POST['u_lastName'];
$age = $_POST['u_age'];
$email = $_POST['u_email'];
$pass = $_POST['u_pass'];
$passPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';

if (empty($firstName)) {
  $_SESSION['hasNameErr'] = true;
  $cnt1 = 0;
} else {
  $_SESSION['hasNameErr'] = false;
  $cnt1 = 1;
}

if (empty($lastName)) {
  $_SESSION['hasLastNameErr'] = true;
  $cnt2 = 0;
} else {
  $_SESSION['hasLastNameErr'] = false;
  $cnt2 = 1;
}

if (empty($age)) {
  $_SESSION['hasAgeErr'] = true;
  $cnt3 = 0;
} else {
  $_SESSION['hasAgeErr'] = false;
  $cnt3 = 1;
}

if (!empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['hasEmailErr'] = false;
  $cnt5 = 1;
} else {
  $_SESSION['hasEmailErr'] = true;
  $cnt5 = 0;
}

if (!preg_match($passPattern, $pass)) {
  $_SESSION['invalidPass'] = true;
  $cnt6 = 0;
} else {
  $_SESSION['invalidPass'] = false;
  $cnt6 = 1;
}

if (empty($pass)) {
  $_SESSION['hasPassErr'] = true;
  $cnt7 = 0;
} else {
  $_SESSION['hasPassErr'] = false;
  $cnt7 = 1;
}

if ($inputSum === $sum) {
  $_SESSION['incorrect_sum'] = false;
  $cnt4 = 1;
  unset($_SESSION['number1']);
  unset($_SESSION['number2']);
} else {
  $_SESSION['incorrect_sum'] = true;
  $cnt4 = 0;
  unset($_SESSION['number1']);
  unset($_SESSION['number2']);
}

if ($cnt1 + $cnt2 + $cnt3 + $cnt4 + $cnt5 + $cnt6 + $cnt7 === 7) {
  $sql = "insert into users(name, lastName, age, email, password) VALUES(:name, :lastName, :age, :email, :password)";

  $stmt = $pdo->prepare($sql);

  $stmt->execute([
    'name' => $firstName,
    'lastName' => $lastName,
    'email' => $email,
    'password' => password_hash($pass, PASSWORD_BCRYPT, ['cost' => 12]),
    'age' => convertPersianNumbersToEnglish($age)
  ]);

  session_destroy();
  header("Location: http://localhost/captchaProject/src/login.php");
} else {
  header("Location: http://localhost/captchaProject/src/signUp.php");
}
