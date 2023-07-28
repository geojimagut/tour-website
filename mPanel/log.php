<?php
ini_set("display_errors", 0);
session_start();
include('sec.php');

session_destroy();
header('Location:index.php');
?> 