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
  <title>Captcha</title>
</head>

<body dir="rtl" class="bg-[#f0fbea]">
  <div class="w-full h-auto min-h-screen flex justify-center items-center">
    <form action="postedData.php" method="POST">
      <div class="shadow-xl bg-[#4F6F52] w-96 max-w-2xl h-auto p-7 flex flex-col gap-3 rounded-2xl">
        <h3 class="text-white text-xl text-center">اطلاعات خود را وارد کنید</h3>
        <div class="flex flex-col gap-3">
          <label class="text-base text-sm text-white">نام:</label>
          <input type="text" name="u_name" placeholder="نام خود را وارد کنید" class="text-sm bg-white focus:shadow-lg focus:shadow-black-500/40 border-2 border-transparent focus:outline-none p-1.5 rounded-xl">
        </div>
        <div class="flex flex-col gap-3">
          <label class="text-base text-sm text-white">نام خانوادگی:</label>
          <input type="text" name="u_lastName" placeholder="نام خانوادگی خود را وارد کنید" class="text-sm bg-white focus:shadow-lg focus:shadow-black-500/40 border-2 border-transparent focus:outline-none p-1.5 rounded-xl">
        </div>
        <div class="flex flex-col gap-3">
          <label class="text-base text-white">سن:</label>
          <input type="text" name="u_age" onkeypress="return /[۰-۹ | 0-9\s]/i.test(event.key)" placeholder="سن خود را وارد کنید" class="text-sm bg-white focus:shadow-lg focus:shadow-[#f0fbea]-500/40 border-2 border-transparent focus:outline-none p-1.5 rounded-xl">
        </div>
        <div class="flex flex-col gap-3">
          <label class="text-base text-white">حاصل عبارت را در کادر زیر وارد کنید:</label>
          <div class="flex gap-2">
            <input name="sum" type="text" placeholder="حاصل جمع را وارد کنید" onkeypress="return /[۰-۹ | 0-9\s]/i.test(event.key)" class="w-full text-sm bg-white focus:shadow-lg focus:shadow-[#f0fbea]-500/40 border-2 border-transparent focus:outline-none p-1.5 rounded-xl">
            <?php $capImg->show(); ?>
          </div>
        </div>
        <div class="flex flex-col gap-3">
          <input type="submit" value="ثبت" class="w-full text-sm bg-white focus:shadow-lg focus:shadow-[#f0fbea]-500/40 border-2 border-transparent focus:outline-none hover:bg-[#f0fbea] hover:opacity-65 hover:cursor-pointer transition duration-300 p-1.5 rounded-xl">
        </div>
      </div>
    </form>
  </div>
</body>

</html>