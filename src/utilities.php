<?php
session_start();

if (!isset($_SESSION['number1']) && !isset($_SESSION['number2'])) {
  $num1 = rand(1, 10);
  $num2 = rand(1, 10);
  $_SESSION['number1'] = $num1;
  $_SESSION['number2'] = $num2;
}

function convertPersianNumbersToEnglish($input)
{
  $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
  $english = range(0, 9);
  return (int)str_replace($persian, $english, $input);
}

function convertEnglishToPersian($input)
{
  $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
  $english = range(0, 9);
  return str_replace($english, $persian, $input);
}
