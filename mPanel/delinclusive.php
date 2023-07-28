<?php
ini_set("display_errors", 0);
include('connect.php');

$rowone=$_POST['rowone'];
//inserting data into db
$insertqry="delete from inclusives where inclusive_id=? ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertqry)){
    ?>
    <script>alert('Failed') </script>
    <?php
}else{
mysqli_stmt_bind_param($stmtinsert, "i",$rowone );
mysqli_stmt_execute($stmtinsert);
?>
<script>alert('Deleted') </script>
<?php
}

?>