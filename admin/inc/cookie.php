<?php

    $login_cookie = $_COOKIE['adminLogin'];

    if($login_cookie != 1){
        header('location:login.php');
    }


?>
