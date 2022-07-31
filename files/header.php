<?php
    include 'include/function.php';

    $user_cookie = @$_COOKIE['user'];
    $login_cookie = @$_COOKIE['login'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقع التجاره الالكترونيه</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css"/>


</head>
<body>
    <header class='w'> </header>
    <!-- -----------------------    menu -------------- -->
    <nav>
        <div class="w">
        <ul>
            <li><a href="index.php">الرئيسية</a></li>
            <?php  get_cat();   ?>
            <div class='c'></div>
        </ul>
        </div>
    </nav>
    <!-- ---------------------  search  ----------------- -->
    <div class='search'>
        <?php  cart();  ?>
        <div class='w'>
            <div class="card r">أهلا بك <?php echo $user_cookie." " ?>! سلة المشتريات - جميع المنتجات : <?php total_item();?> , السعر بالكامل : <?php total_price(); echo " $";?> - <a href='cart.php'> الذهاب إلى البطاقه</a></div>
            <div class='formsearch l'>
                <form action="search.php" method='get'>
                    <input class='inp' type="text" name='searchArea' placeholder='ابحث هنا'>
                    <input type="submit" name='search' value='ابحث'>
                </form>
            </div>
            <div class='social l'>
                <ul>
                    <li><a href=""><i class="fab fa-facebook" style='color:#1d51fb'></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"  style='color:#0ba9d6'></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"  style='color:#ce23e2'></i></a></li>
                    <li><a href="#"><i class="fab fa-whatsapp"  style='color:#14da09'></i></a></li>
                    <div class='c'></div>
                </ul>
            </div>

        </div>
    </div>
<br>
<br>
    <!-- -------------------------   product      --------------- -->
    <div class='product'>