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

<?php include "header.php" ?>

<body dir="rtl" class="bg-[#f0fbea] font-yekan">
  <div class="container mx-auto px-4 h-auto min-h-screen flex justify-center items-center">
    <div class="shadow-xl bg-[#4F6F52] w-full max-w-lg h-auto p-7  rounded-2xl">
      <form action="postedData.php" method="POST" class="flex flex-col gap-3">

        <h3 class="text-white text-xl text-center">اطلاعات خود را وارد کنید</h3>
        <div class="flex flex-col gap-2">
          <label class="text-base text-white">نام:</label>
          <input type="text" name="u_name" placeholder="نام خود را وارد کنید" class="text-sm focus:shadow-lg focus:shadow-black-500/40 border-2 focus:outline-none p-1.5 rounded-xl
          <?php if (isset($_SESSION['hasNameErr']) && $_SESSION['hasNameErr'] == 1) : ?> bg-red-200 border-red-200 <?php else : ?> bg-white border-transparent <?php endif; ?>">
        </div>
        <?php if (isset($_SESSION['hasNameErr']) && $_SESSION['hasNameErr'] == 1) : ?> <span class="text-sm text-red-400 -mt-2">ورود نام الزامیست.</span> <?php endif; ?>
        <div class="flex flex-col gap-2">
          <label class="text-base text-white">نام خانوادگی:</label>
          <input type="text" name="u_lastName" placeholder="نام خانوادگی خود را وارد کنید" class="text-sm focus:shadow-lg focus:shadow-black-500/40 border-2 focus:outline-none p-1.5 rounded-xl
          <?php if (isset($_SESSION['hasLastNameErr']) && $_SESSION['hasLastNameErr'] == 1) : ?> bg-red-200 border-red-200 <?php else : ?> bg-white border-transparent <?php endif; ?>">
        </div>
        <?php if (isset($_SESSION['hasLastNameErr']) && $_SESSION['hasLastNameErr'] == 1) : ?> <span class="text-sm text-red-400 -mt-2">ورود نام خانوادگی الزامیست.</span> <?php endif; ?>
        <div class="flex flex-col gap-2">
          <label class="text-base text-white">سن:</label>
          <input type="text" name="u_age" onkeydown="return /[۰-۹ | 0-9\s]/i.test(event.key)" placeholder="سن خود را وارد کنید" class="text-sm focus:shadow-lg focus:shadow-[#f0fbea]-500/40 border-2 focus:outline-none p-1.5 rounded-xl
          <?php if (isset($_SESSION['hasAgeErr']) && $_SESSION['hasAgeErr'] == 1) : ?> bg-red-200 border-red-200 <?php else : ?> bg-white border-transparent <?php endif; ?>">
        </div>
        <?php if (isset($_SESSION['hasAgeErr']) && $_SESSION['hasAgeErr'] == 1) : ?> <span class="text-sm text-red-400 -mt-2">ورود سن الزامیست.</span> <?php endif; ?>
        <div class="flex flex-col gap-2">
          <label class="text-base text-white">ایمیل:</label>
          <input type="email" name="u_email" placeholder="ایمیل خود را وارد کنید" class="text-sm focus:shadow-lg focus:shadow-[#f0fbea]-500/40 border-2 focus:outline-none p-1.5 rounded-xl
          <?php if (isset($_SESSION['hasEmailErr']) && $_SESSION['hasEmailErr'] == 1) : ?> bg-red-200 border-red-200 <?php else : ?> bg-white border-transparent <?php endif; ?>">
        </div>
        <?php if (isset($_SESSION['hasEmailErr']) && $_SESSION['hasEmailErr'] == 1) : ?> <span class="text-sm text-red-400 -mt-2">ورود ایمیل الزامیست.</span> <?php endif; ?>
        <div class="flex flex-col gap-2">
          <label class="text-base text-white">رمز عبور:</label>
          <input type="password" name="u_pass" placeholder="رمز عبور خود را وارد کنید" class="text-sm focus:shadow-lg focus:shadow-[#f0fbea]-500/40 border-2 focus:outline-none p-1.5 rounded-xl
            <?php if (isset($_SESSION['hasPassErr']) && $_SESSION['hasPassErr'] == 1) : ?>
              bg-red-200 border-red-200 
            <?php else : ?> 
              <?php if (isset($_SESSION['invalidPass']) && $_SESSION['invalidPass'] == 1) : ?>
                bg-red-200 border-red-200 
              <?php else : ?>  
                bg-white border-transparent 
              <?php endif; ?>
            <?php endif; ?>">
        </div>
        <?php if (isset($_SESSION['hasPassErr']) && $_SESSION['hasPassErr'] == 1) : ?>
          <span class="text-sm text-red-400 -mt-2">ورود رمز عبور الزامیست.</span>
        <?php endif; ?>
        <?php if (isset($_SESSION['invalidPass']) && $_SESSION['invalidPass'] == 1 &&  $_SESSION['hasPassErr'] == 0) : ?>
          <span class="text-sm text-red-400 -mt-2">رمز عبور انتخابی شما باید حداقل ۸ حرف و دارای یک حرف بزرگ یک حرف کوچک و یک عدد باشد.</span>
        <?php endif; ?>
        <div class="flex flex-col gap-2">
          <label class="text-sm text-white">حاصل عبارت را در کادر زیر وارد کنید:</label>
          <div class="flex gap-2">
            <input name="sum" type="text" placeholder="حاصل جمع را وارد کنید" onkeydown="return /[۰-۹ | 0-9\s]/i.test(event.key)" class="w-full text-sm focus:shadow-lg focus:shadow-[#f0fbea]-500/40 border-2 focus:outline-none p-1.5 rounded-xl 
            <?php if (isset($_SESSION['incorrect_sum']) && $_SESSION['incorrect_sum'] == 1) : ?> bg-red-200 border-red-200 <?php else : ?> bg-white border-transparent <?php endif; ?>">
            <?php $capImg->show(); ?>
          </div>
        </div>
        <?php if (isset($_SESSION['incorrect_sum']) && $_SESSION['incorrect_sum'] == 1) : ?> <span class="text-sm text-red-400 -mt-2">حاصل جمع را اشتباه وارد کردید.</span> <?php endif; ?>
        <div class="flex flex-col gap-3">
          <input type="submit" value="ثبت" class="w-full text-sm bg-white focus:shadow-lg focus:shadow-[#f0fbea]-500/40 border-2 border-transparent focus:outline-none hover:bg-[#f0fbea] hover:opacity-65 hover:cursor-pointer transition duration-300 p-1.5 rounded-xl">
        </div>
      </form>
    </div>
  </div>
</body>

</html>