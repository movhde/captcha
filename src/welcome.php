<?php
include "CaptchaImage.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../assets/styles/output.css" rel="stylesheet" />
  <title>welcomes</title>
</head>

<body dir="rtl" class="bg-[#f0fbea]">
  <div class="mt-10 flex flex-col justify-center items-center gap-3">
    <h3 class="text-center text-3xl text-[#4F6F52]">
      <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] !== '') : ?>
        <?php echo "خوش آمدی {$_SESSION['loggedIn']} عزیز." ?>
      <?php else : ?>
        <?php echo "ورود شما با موفقیت ثبت گردید." ?>
      <?php endif; ?>
    </h3>
    <div class="flex gap-3">
      <a href="http://localhost/captchaProject/src/"><button class=" text-white bg-[#4F6F52] w-32 p-3.5 rounded-xl">ثبت نام</button></a>
      <a href="http://localhost/captchaProject/src/login.php"><button class=" text-white bg-[#4F6F52] w-32 p-3.5 rounded-xl">ورود</button></a>
    </div>
  </div>
</body>

</html>