<?php
ini_set("display_errors", 0);
session_start();
$_SESSION['package_id']=$_POST['id'];
?>
<script>
    setTimeout(function(){
    location.href='blog.php'
},500)
</script>