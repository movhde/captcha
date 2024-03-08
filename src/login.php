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
  <title>Login</title>
</head>

<?php include "header.php" ?>

<body dir="rtl" class="bg-[#f0fbea] font-yekan">
  <div class="container mx-auto px-4 h-auto min-h-screen flex justify-center items-center">
    <div class="shadow-xl bg-[#4F6F52] w-full max-w-lg h-auto p-7 rounded-2xl">
      <form action="auth.php" method="POST" class="flex flex-col gap-3">
        <h3 class="text-white text-xl text-center">ورود به حساب کاربری</h3>
        <div class="flex flex-col gap-2">
          <label class="text-base text-white">ایمیل:</label>
          <input type="email" name="userEmail" placeholder="ایمیل خود را وارد کنید" class="text-sm focus:shadow-lg focus:shadow-black-500/40 border-2 focus:outline-none p-1.5 rounded-xl
          <?php if (isset($_SESSION['incorrect_info']) && $_SESSION['incorrect_info'] == 1) : ?> bg-red-200 border-red-200 <?php else : ?> bg-white border-transparent <?php endif; ?>">
        </div>
        <div class="flex flex-col gap-2">
          <label class="text-base text-white">رمز عبور:</label>
          <input type="password" name="userPass" placeholder="رمز عبور خود را وارد کنید" class="text-sm focus:shadow-lg focus:shadow-black-500/40 border-2 focus:outline-none p-1.5 rounded-xl
          <?php if (isset($_SESSION['incorrect_info']) && $_SESSION['incorrect_info'] == 1) : ?> bg-red-200 border-red-200 <?php else : ?> bg-white border-transparent <?php endif; ?>">
        </div>
        <?php if (isset($_SESSION['incorrect_info']) && $_SESSION['incorrect_info'] == 1) : ?><span class="text-sm text-red-400 -mt-2">نام کاربری یا رمز عبور خود را اشتباه وارد کرده اید.</span> <?php endif; ?>
        <div class="flex flex-col gap-3 items-end">
          <input type="submit" value="ورود" class="w-32 text-sm bg-white focus:shadow-lg focus:shadow-[#f0fbea]-500/40 border-2 border-transparent focus:outline-none hover:bg-[#f0fbea] hover:opacity-65 hover:cursor-pointer transition duration-300 p-1.5 rounded-xl">
        </div>
      </form>
    </div>
  </div>
</body>

</html>