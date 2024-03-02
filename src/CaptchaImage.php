<?php
include "utilities.php";

class captchaImage
{
  public $image;

  function __construct()
  {
    $x = rand(1, 70);
    $y = rand(1, 70);
    $x2 = rand(1, 70);
    $y2 = rand(1, 70);
    $txtAngle = rand(-5, 5);
    $txt = convertEnglishToPersian($_SESSION['number1']) . " + " . convertEnglishToPersian($_SESSION['number2']) . " = ";
    $txtFont = "../assets/fonts/IRANYekanX-Regular.ttf";
    $this->image = imagecreatetruecolor(75, 35);
    $white = imagecolorallocate($this->image, 255, 255, 255);
    $black = imagecolorallocate($this->image, 0, 0, 0);
    $randomColor = imagecolorallocate($this->image, rand(0, 255), rand(0, 255), rand(0, 255));
    $randomColor2 = imagecolorallocate($this->image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagefilledrectangle($this->image, 0, 0, 75, 35, $white);
    imagettftext($this->image, 12, $txtAngle, 15, 22, $black, $txtFont, $txt);
    imageline($this->image, $x, $y, $x2, $y2, $randomColor);
    imageline($this->image, $y, $y2, $x, $x2, $randomColor2);
    imageline($this->image, $x2, $x2, $y2, $x2, $randomColor2);
  }

  public function show()
  {
    ob_start();

    imagejpeg($this->image, NULL, 100);

    $rawImageBytes = ob_get_clean();

    echo "<img src='data:image/jpeg;base64," . base64_encode($rawImageBytes) . "' />";
  }
}

$capImg = new captchaImage;
