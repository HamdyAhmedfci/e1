<?php
//connect to db
$connect = mysqli_connect('localhost','root','','ecommerce');

//post value
$a_name = @$_POST['a_name'];
$a_pass = @$_POST['a_pass'];

if(isset($_POST['login'])) {
    if(empty($a_name)){
        echo '<script>alert("يرجى إدخال إسم المستخدم ")</script>';
    }elseif(empty($a_pass)){
        echo '<script>alert("يرجى إدخال كلمة المرور ") </script>';
    }else{
        //get admin name & admin password
        $get_admin = "select * from admin where a_name='$a_name' AND a_pass='$a_pass'";
        $run_admin = mysqli_query($connect , $get_admin);

        //admin isset
        if(mysqli_num_rows($run_admin) == 1){
            $row_admin = mysqli_fetch_array($run_admin);
            //admin value isset
            $a_name = $row_admin['a_name'];

            //cookie here
            setcookie("aname",$aname , time()+60*60*24);
            setcookie("adminLogin",1,time()+60*60*24);

            echo '<script>alert(" مرحبا بك أيها المدير ")</script>';
            header('location:ok.php');
        }
        else{
        echo '<script>alert("البيانات غير صحيحه ") </script>';

        }
        
        }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styleAdmin.css">
</head>
<body>
    <div class="login">
        <h3 style='text-align:center; margin-top:30px; font-size:25px'> تسجيل الدخول للأدمن </h3>
        <form action="login.php" method='post'>
            <input type="text" name='a_name' placeholder='إسم المستخدم '><br>
            <input type="password" name='a_pass' placeholder='كلمة المرور '><br>
            <input type="submit" name='login' value="تسجيل الدخول ">
        </form>
    </div>
    
</body>
</html>