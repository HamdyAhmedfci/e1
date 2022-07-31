
<?php
    include "inc/header.php";

    // post value
    $p_title = @$_POST['p_title'];
    $P_category = @$_POST['p_category'];
    $p_img = @$_FILES['p_img']['name'];
    $p_img_tmp = @$_FILES['p_img']['tmp_name'];
    $p_price = @$_POST['p_price'];
    $p_desc = @$_POST['p_desc'];
    $p_key_word = @$_POST['p_key_word'];

//move uploade image

move_uploaded_file($p_img_tmp , "images/$p_img");

if(isset($_POST['addpro'])){
    //insert product
    if(empty($p_title)){
        echo "<script>alert('برجاء إدخال إسم المنتج')</script>";
    }elseif(empty($P_category)){
        echo "<script>alert('برجاء إدخال حقل التصنيف ')</script>";
    }elseif (empty($p_img)) {
        echo "<script>alert('برجاء إدخال حقل صورة المنتج')</script>";
    }elseif(empty($p_price)){
        echo "<script>alert('برجاء إدخال سعر المنتج')</script>";
    }elseif(empty($p_desc)){
        echo "<script>alert('برجاء إدخال وصف المنتج')</script>";
    }elseif(empty($p_key_word)){
        echo "<script>alert('برجاء إدخال حقل الكلمه المفتاحيه للمنتج')</script>";
    }else{
        // if(isset($_POST['addpro'])){
            $insert_pro = "insert into products(p_title , p_category , p_img , p_price , p_desc , p_key_word)
             values('$p_title','$P_category','$p_img','$p_price','$p_desc','$p_key_word')";
    
            $run_pro = mysqli_query($db , $insert_pro);
            
            if(isset($run_pro)){
                header('location:addpro.php');
            }
        // }
    }

}
    

?>
    <!-- <script src="ckeditor5/ckeditor.js"></script> -->
<div class="adminBody">
    <form action="addpro.php" method='post' enctype="multipart/form-data">
    <label >إسم المنتج </label>
    <input type="text" name='p_title'>
<br>
    <label >تصنيف المنتج </label>
    <select name='p_category'>
        <?php
            $get_c  = "select * from category";
            $run_c  = mysqli_query($db , $get_c);
            while($row_c = mysqli_fetch_array($run_c)){
                echo '<option value="' . $row_c['c_id'] .'">'. $row_c['c_name'] .'</option>';
            }
        ?>
    </select>
    <br>
    <label >صورة المنتج </label>
    <input type="file" name='p_img'><br>
    <br>
    <label >سعر المنتج </label>
    <input type="text" name='p_price'>
    <br>
    <label >وصف المنتج </label>
    <textarea name="p_desc" id="editor1" rows="6" cols="40">
    </textarea>
    <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'p_desc' );
    </script>
            <br><br><br>

    <label >كلمات مفتاحيه</label>
    <input type="text" name='p_key_word'>

    <input type="submit" name='addpro' value="أضف المنتج">
    </form>
</div>

<?php
    include "inc/footer.php";
?>