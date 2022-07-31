<?php include 'files/header.php'; ?>
<?php 
    session_start();
?>
<form action='' method='post'>
<table class='tbl' style='background-color:#fff; width:90%; border: 1px solid #ddd; padding:5px ; margin:auto'>
<tr>
    <th>إزاله</th>
    <th>المنتج</th>
    <th>الكميه</th>
    <th>السعر</th>
</tr>
<?php
 global $connect;
 $ip = getIP();
 $total = 0;
 $t_price = "select * from cart where ip_add='$ip'";
 $run_price =mysqli_query($connect , $t_price);
 while($row_t_price = mysqli_fetch_array($run_price)){
     $pro_id_t = $row_t_price['p_id'];
     $price_pro = "select * from products where p_id='$pro_id_t'";
     $run_price_pro = mysqli_query($connect , $price_pro);
     while($row_price_pro = mysqli_fetch_array($run_price_pro)){
         $pro_price = array($row_price_pro['p_price']);
         $pro_title = $row_price_pro['p_title'];
         $pro_img = $row_price_pro['p_img'];
         $pro_price_single = $row_price_pro['p_price'];

         $values = array_sum($pro_price);
         $total +=$values;
     

?>

<tr align=center>
    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id_t; ?>"></td>
    <td><div style='padding:4px; margin-bottom:5px; border:2px solid #ccc'> <?php echo $pro_title; ?></div><img src="admin/images/<?php echo $pro_img; ?>" width="70" alt=""></td>
    <td><input type="text" name="qty" value='<?php echo $_SESSION['qty']; ?>' size="5" id=""></td>
    <?php 
        if(isset($_POST['update_cart'])){
            $qty = $_POST['qty'];
            $update_qty = "update cart set qty='$qty'";
            $run_u_qty = mysqli_query($connect , $update_qty);
            $_SESSION['qty']=$qty;
            // $total = $total ;
         }
    ?>
    <td><?php echo $pro_price_single; ?> $</td>
</tr>
<?php }} ?>

<tr>
    <td><input type="submit" name="update_cart" value="تحديث البطاقه"/></td>
    <td><button><a href="index.php">متابعة التسوق</a></button></td>
    <?php 
        if($login_cookie == 1){
            echo "<td><button><a href='chechout.php'>إنهاء التسوق</a></button></td> ";
        }else{
            echo "<td><button><a href='login.php'>إنهاء التسوق</a></button></td> ";
        }
    ?>
    <!-- <td><button><a href="chechout.php">إنهاء التسوق</a></button></td> -->
    <td>السعر بالكامل : <?php echo $total; ?> $</td>
</tr>
<?php
    function update_cart(){
    global $connect;
    $ip = getIP();
    if(isset($_POST['update_cart'])){
        foreach ($_POST['remove'] as $id_remove){
            $delete_pro ="delete from cart where p_id = '$id_remove' AND ip_add = '$ip' ";
            $run_delete = mysqli_query($connect , $delete_pro);
            if($run_delete){
                header ('Location:cart.php');
            }
        }
    }
    }
    echo @$up_c = update_cart();

?>
</table>
     </form>

<?php include 'files/footer.php'; ?>
