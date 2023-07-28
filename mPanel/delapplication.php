<?php
ini_set("display_errors", 0);
include('connect.php');

$pname=$_POST['thedata'];
$delqry="delete from applications where app_id='$pname' ";
if($conn->query($delqry)){
    echo "<script>alert('Deleted');</script>";
}else{
    echo "<script>alert('Failed');</script>";
}

?>

