<?php include 'files/header.php'; ?>
<?php 
//post name
    $username = @$_POST['username'];
    $password = @$_POST['password'];
    $email = @$_POST['email'];
    $country = @$_POST['country'];
    // $username = @$_POST['username'];

    // get ip
    $ip =getIp();

    if(isset($_POST['signup'])){
        if(empty($username) || empty($password) || empty($email) || empty($country)){
            echo "<script> alert('برجاء إدخال الحقول كامله')</script>";

        }else{
        $insert_c = "insert into customers(username,password,email,country,ip) values('$username','$password','$email','$country','$ip')";
        $run_c = mysqli_query($connect , $insert_c);
        if($run_c){
            echo "<script> alert('تم تسجيلك فى الموقع بنجاح ')</script>";
        }
        }
        
    }

?>

<form action="" method='post'>
    <div class="panal" style='width:500px; margin:0px auto; ' >
        <div class='panalTitle'>
            تسجيل عضويه
        </div>
        <div class='panalBody'>
            <div> إسم المستخدم</div>
            <input type="text" name="username" id="">
            <br>
            <br>
            <div> كلمة السر</div>
            <input type="text" name="password" id="">
            <br>
            <br>
            <div>  البريد الإلكترونى </div>
            <input type="text" name="email" id="">
            <br>
            <br>
            <div> الدوله </div>
            <input type="text" name="country" id="">
            <br>
            <br>
            <input type="submit" value='تسجيل' name="signup" id="">

        </div>
    </div>
</form>

<?php include 'files/footer.php'; ?>
