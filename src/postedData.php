<?php
include "utilities.php";

$inputSum = convertPersianNumbersToEnglish($_POST['sum']);
$sum = $_SESSION['number1'] + $_SESSION['number2'];

if ($inputSum === $sum) {
  $_SESSION['incorrect_sum'] = false;
  echo "karet dorosteeeee";
  session_destroy();
} else {
  $_SESSION['incorrect_sum'] = true;
  session_destroy();
  header("Location: http://localhost/captchaProject/src/");
}
