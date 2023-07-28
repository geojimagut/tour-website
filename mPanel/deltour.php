<?php
ini_set("display_errors", 0);
include('connect.php');

$pname=$_POST['id'];
$delqry="delete from type where type_id='$pname' ";
if($conn->query($delqry)){
    ?>
   <script>
   alert('Deleted')
    setTimeout(function(){
        location.href='tour.php'
    },700)
    </script>
    <?php
}else{
    echo "<script>alert('Failed');</script>";
}

?>

