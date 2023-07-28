<?php
ini_set("display_errors", 0);
include('connect.php');
    $idqry="select * from packages order by id DESC limit 1";
    $idresult=$conn->query($idqry);
    $row=mysqli_fetch_assoc($idresult);
    $idno=$row['id'];

    $title=nl2br($_POST['txtaname']);
    $text=nl2br($_POST['txtdayactivity']);
    $insertqry="insert into activity(pack_id, activity_title, activity_text)values(?, ?, ?) ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertqry)){
    echo "Failed";
}else{
mysqli_stmt_bind_param($stmtinsert, "iss",$idno, $title, $text );
mysqli_stmt_execute($stmtinsert);

echo "Done, Insert the rest of the days' activities ";
}
    
    
?>
