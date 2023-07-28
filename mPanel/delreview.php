<?php
ini_set("display_errors", 0);
include('connect.php');

$pname=$_POST['id'];
$delqry="delete from reviews where review_id='$pname' ";
if($conn->query($delqry)){
    ?>
   <script>
   alert('Deleted')
    setTimeout(function(){
        location.reload()
    },700)
    </script>
    <?php
}else{
    echo "<script>alert('Failed');</script>";
}

?>

