
<?php
    include "inc/header.php";

    //post value
    $c_name = @$_POST['c_name'];
    if(isset($_POST['addcat'])){
        $insert_cat = "insert into category(c_name) values('$c_name')";

        $run_cat = mysqli_query($db , $insert_cat);
        
        if(isset($run_cat)){
            header('location:addcat.php');
        }
    }

?>

<div class="adminBody">
    <form action="addcat.php" method='post'>
    <label >إسم التصنيف</label>
    <input type="text" name='c_name'>
    <input type="submit" name='addcat' value="أضف التصنيف">
    </form>
</div>

<?php
    include "inc/footer.php";
?>