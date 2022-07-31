<?php include 'files/header.php'; ?>
<?php 
//post name
    $username = @$_POST['username'];
    $password = @$_POST['password'];
   
    if(isset($_POST['login'])){
        if(empty($username) || empty($password)){
            echo "<script> alert('برجاء إدخال الحقول كامله')</script>";
        }else{
            $select_c = "select * from customers where username='$username' AND password='$password'";
            $run_c = mysqli_query($connect , $select_c);
            
            if(mysqli_num_rows($run_c) > 0){
                $row_c = mysqli_fetch_array($run_c);
                $user = $row_c['username'];
                $pass = $row_c['password'];

                if($user != $username && $pass != $password ){
                   echo "<script> alert('البيانات المدخله غير صحيحه ')</script>";
                }else{
                    setcookie("user",$user,time()+60*60*24);
                    setcookie("login",1,time()+60*60*24);
                   echo "<script> alert(' تم التسجيل بنجاح - أهلا بك فى موقعنا ')</script>";
                    echo '<meta http-equiv="refresh" content="3; url=\'chechout.php\'">';

                }
            }else{
            echo "<script> alert('برجاء مراجعة البيانات التى أدخلتها ')</script>";

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
            
            <input type="submit" value=' تسجيل الدخول' name="login" id="">

        </div>
    </div>
</form>

<?php include 'files/footer.php'; ?>
