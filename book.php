<?php
ini_set("display_errors", 0);
session_start();
$_SESSION['package']=$_POST['id'];
?>
<script>
    setTimeout(function(){
    location.href='bookpanel.php'
},500)
</script>