<?php
include "utilities.php";

$inputSum = convertPersianNumbersToEnglish($_POST['sum']);
$sum = $_SESSION['number1'] + $_SESSION['number2'];

if ($inputSum === $sum) {
  $_SESSION['incorrect_sum'] = false;
  echo "karet dorosteeeee";
  unset($_SESSION['number1']);
  unset($_SESSION['number2']);
} else {
  $_SESSION['incorrect_sum'] = true;
  unset($_SESSION['number1']);
  unset($_SESSION['number2']);
  header("Location: http://localhost/captchaProject/src/");
}
