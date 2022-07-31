<?php include 'files/header.php'; ?>
<?php  
// $connect = mysqli_connect('localhost','root','','ecommerce');
$p_id = (int)$_GET['id'];
if(isset($_GET['id'])){
    $get_pro_d = "select * from products where p_id='$p_id'";
    $run_pro_d = mysqli_query($connect , $get_pro_d);
    
    $row_pro_d = mysqli_fetch_array($run_pro_d);

}
?>
<div class="w">
    <div class="panal r" style='width:660px; margin-left:10px'>
        <div class="proTitle"><?php echo $row_pro_d['p_title'] ?></div>
        <div class="proBody">
            <img src="<?php echo 'admin/images/'. $row_pro_d['p_img'] ?>" alt="picture" width='640'>
            <p style='margin:10px;'>
            <?php echo $row_pro_d['p_desc'] ?>
            </p>
        </div>

    </div>
    <div class="panal l" style='width:320px;'>
        <div class="proTitle"> تفاصيل المنتج</div>
        <div class="proDetail">
            <div id='det'> سعر المتج  : <?php echo $row_pro_d['p_price'] ?></div>
            <div id='det'>صنف المنتج : 
            <?php
            $cat = $row_pro_d['p_category'];
            $get_cat = "select * from category where c_id='$cat'";
            $run_cat = mysqli_query($connect , $get_cat);
            $row_cat = mysqli_fetch_array($run_cat);
            echo  $row_cat['c_name'];
            ?>
            </div>
            <div id='det'> كلمات مفتاحيه :<?php echo $row_pro_d['p_key_word'] ?></div>
        </div>
    </div>
    <div class="c"></div>
</div>
<?php include 'files/footer.php'; ?>
