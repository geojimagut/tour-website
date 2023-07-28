<?php
ini_set("display_errors", 0);
session_start();
if(($_SESSION['verification'])==""){
    header("Location: index.php");
    die();
    
}
?>