
<?php
ini_set("display_errors", 0);
include('connect.php');
if(isset($_POST['btn_review'])){
$name=$_POST['name'];
$review=$_POST['review'];
$confirmqry="insert into reviews(email,review) values(?, ?)";
//create a statement
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $confirmqry)){
echo "Failed";
}else{
//bind parameters to the place holders
mysqli_stmt_bind_param($stmt, 'ss', $name, $review );
//rund parameters inside db
mysqli_stmt_execute($stmt);

?><script>
setTimeout(function(){
location.reload()
},1500)
</script><?php
}  
}
// booking a tour
else{
$name=$_POST['name'];
$packageid=$_POST['packageid'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$from=$_POST['from'];
$people=$_POST['people'];
$comment=$_POST['comment'];

$confirmqry="select * from packages where id=? ";
//create a statement
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $confirmqry)){
echo "Failed";
}else{
//bind parameters to the place holders
mysqli_stmt_bind_param($stmt, 's', $packageid);
//rund parameters inside db
mysqli_stmt_execute($stmt);
$conresult=mysqli_stmt_get_result($stmt);
$row=mysqli_fetch_assoc($conresult);
$packname=$row['package_name'];
$packprice=$row['package_price'];
$packdestination=$row['destination'];
$packduration=$row['package_duration'];
$total=$people*$packprice;

?>
<script>
$(document).ready(function(){
$.ajax({
url: "https://formsubmit.co/ajax/info@pulmmertours.co.ke",
//info@pulmmertours.co.ke
method: "POST",
data: {
TOUR:"DETAILS",
Name:<?php echo json_encode($name);?>,
Email:<?php echo json_encode($email);?>,
Tel:<?php echo json_encode($phone);?>,
People:<?php echo json_encode($people);?>,
From:<?php echo json_encode($from);?>,
Comment:<?php echo json_encode($comment);?>,
Package:<?php echo json_encode($packname);?>,
Destination:<?php echo json_encode($packdestination);?>,
Duration:<?php echo json_encode($packduration);?>,
},
dataType: "json"

})

})
</script>
<?php

/*inserting record to db*/
$confirmqry="select * from applications where package_id=? and name=? and phone=? and email=? and day_one=? ";
//create a statement
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $confirmqry)){
echo "Failed";
}else{
//bind parameters to the place holders
mysqli_stmt_bind_param($stmt, 'sssss', $packageid, $name, $phone, $email, $from );
//rund parameters inside db
mysqli_stmt_execute($stmt);
$conresult=mysqli_stmt_get_result($stmt);
$row=mysqli_fetch_assoc($conresult);
if($row['package_id']!=$packageid && $row['name']!=$name && $row['phone']!=$phone && $row['email']!=$email && $row['day_one']!=$from){


//inserting data into db
$insertqry="insert into applications(package_id, name, email, phone,people, day_one, comment) values(?,?,?,?,?,?,?) ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertqry)){
echo "Failed";
}else{
mysqli_stmt_bind_param($stmtinsert, "sssssss", $packageid, $name, $email, $phone, $people, $from, $comment );
mysqli_stmt_execute($stmtinsert);

echo "Thank you for booking. We will contact you soon";
}

}else{

echo "You have already booked";

} 
}
}
}
?>