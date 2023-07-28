<?php
ini_set("display_errors", 0);
session_start();
include('connect.php');
$id=$_POST['destinationdata'];
$selectdest="select * from destinations where destination_id=? limit 1 ";
$stmt = $conn->prepare($selectdest); 
$stmt->bind_param("i", $id);
$stmt->execute();
$resultdest = $stmt->get_result();

while($rowdest=mysqli_fetch_assoc($resultdest)){
$_SESSION['destinationid']=$rowdest['destination_id'];

?>
<!-- php -->
<?php
$destinationid=$_SESSION['destinationid'];
$selectCat="select * from destination_images where desti_id='$destinationid'";
$result=$conn->query($selectCat);
while($row=mysqli_fetch_assoc($result)){
?>
<div id="carouselExampleControls" class="carousel slide blog_carousel" data-ride="carousel"style="width:100%;">
<div class="carousel-inner"style="max-height:80vh">
<?php
$i=0;
foreach ($result as $rows) {
$actives='';
if($i==0){
$actives='active';
}

?>
<div class="carousel-item <?=$actives;?>"style="width:100%;">
<img class="d-block w-100" src="<?= 'uploads/'.$rows['image_name'];?>"alt="First slide"style="width:100%">
</div>
<?php
$i++;
}
?>
</div>
<div class="col-12"style="background-color:transparent">
<nav aria-label="Page navigation"style="background-color:transparent">
<ul class="pagination pagination-lg justify-content-center bg-white mb-0" style="padding: 30px;">
<li class="page-item ">
<a class="page-link carousel-control-prev" href="#carouselExampleControls" aria-label="Previous"role="button" data-slide="prev">
<span aria-hidden="true"><i class="fa fa-arrow-left" aria-hidden="true"style="color:red;font-size:20px;padding:10px;background-color:orange;"></i></span>
<span class="sr-only"></span>
</a>
</li>
<li class="page-item">
<a class="page-link carousel-control-next" href="#carouselExampleControls" aria-label="Next"role="button" data-slide="next">
<span aria-hidden="true"><i class="fa fa-arrow-right" aria-hidden="true"style="color:red;font-size:20px;padding:10px;background-color:orange;"></i></span>
<span class="sr-only"></span>
</a>
</li>
</ul>
</nav>
</div>
<div class="blog_body">
<h3 class="text-uppercase mb-4" style="letter-spacing: 5px;font-size:20px;margin-left:2%;"><?php echo $rowdest['destination_name'];?></h3>
<p class="text-body px-3"><?php echo $rowdest['destination_profile'];?></p>
<h3 class="text-uppercase mb-4" style="letter-spacing: 5px;font-size:20px;margin-left:2%;">Attractions</h3>
<p class="text-body px-3"><?php echo $rowdest['destination_attraction'];?></p>

</div>
<!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleControls custom" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a> -->
</div>
<?php
}
}

?>           

<!--rows end here-->