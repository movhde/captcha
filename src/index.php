<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../assets/styles/output.css" rel="stylesheet" />
  <title>Captcha</title>
</head>

<body dir="rtl" class="bg-[#f0fbea]">
  <?php include "header.php" ?>

  <div class="mt-10 flex flex-col justify-center items-center gap-3">
    <h3 class="text-center text-3xl text-[#4F6F52]">
      <?php if (!isset($_SESSION['loggedIn'])) : ?>
        <?php echo "کاربر عزیز میتوانید از منوی بالا حساب کاربری ایجاد و به آن وارد شوید." ?>
      <?php else : ?>
        <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] !== '') : ?>
          <?php echo "خوش آمدی {$_SESSION['loggedIn']} عزیز." ?>
        <?php else : ?>
          <?php echo "ورود شما با موفقیت ثبت گردید." ?>
        <?php endif; ?>
      <?php endif; ?>
    </h3>
  </div>
</body>

</html>