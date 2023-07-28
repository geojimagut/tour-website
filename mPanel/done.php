<?php
ini_set("display_errors", 0);
include('connect.php');

$pname=$_POST['id'];
$delqry="update applications set status='1' where app_id='$pname' ";
if($conn->query($delqry)){
    ?>
   <script>
   alert('Done')
    setTimeout(function(){
        location.reload()
    },700)
    </script>
    <?php
}else{
    echo "<script>alert('Failed');</script>";
}

?>

