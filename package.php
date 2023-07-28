<?php include('connect.php');
ini_set("display_errors", 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Pulmmer Tours | Packages</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<!-- robots -->
<meta name="robots" content="INDEX, FOLLOW" />
    <meta name="robots" content ="imageindex"/>
    <!-- description -->
    <meta name="keywords"content="Pulmmer Tours, Pulmmertours, Pulmmer, Tourism, Tourists, Tour Packages, Mombasa, Maasai Mara, Hellsgate, Affordable tours, Affordable tour packages, Local tours, Destinations, Destination, Tour companies, tour operators"/>
    <meta name="description"content="Pulmmer Tours limited is an In-bound tour operator/ destination Management company based in Kenya. We were established in May 2022"> 


<!-- Favicon -->
<link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="css/style.css" rel="stylesheet">
</head>
<style>
    /* CSS */
.button-33 {
  background-color: #69d301;
  border-radius: 100px;
  box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
  color: white;
  cursor: pointer;
  display: inline-block;
  font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
  padding: 7px 20px;
  text-align: center;
  text-decoration: none;
  transition: all 250ms;
  border: 0;
  font-size: 16px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-33:hover {
  box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,rgba(44,187,99,.25) 0 1px 2px,rgba(44,187,99,.25) 0 2px 4px,rgba(44,187,99,.25) 0 4px 8px,rgba(44,187,99,.25) 0 8px 16px,rgba(44,187,99,.25) 0 16px 32px;
  transform: scale(1.05) rotate(-1deg);
}
</style>
<body>
<div id="response"></div>
<!-- Topbar Start -->
<div class="container-fluid bg-light pt-3 d-none d-lg-block">
<div class="container">
<div class="row">
<div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
<div class="d-inline-flex align-items-center">
<p><i class="fa fa-envelope mr-2"></i>info@pulmmertours.co.ke</p>
<p class="text-body px-3">|</p>
<p><i class="fa fa-phone-alt mr-2"></i>+254759886003</p>
</div>
</div>
<div class="col-lg-6 text-center text-lg-right">
<div class="d-inline-flex align-items-center">
<!-- <a class="text-primary px-3" href="">
<i class="fab fa-facebook-f"></i>
</a>
<a class="text-primary px-3" href="">
<i class="fab fa-twitter"></i>
</a>
<a class="text-primary px-3" href="">
<i class="fab fa-linkedin-in"></i>
</a>
<a class="text-primary px-3" href="">
<i class="fab fa-instagram"></i>
</a>
<a class="text-primary pl-3" href="">
<i class="fab fa-youtube"></i>
</a> -->
</div>
</div>
</div>
</div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
<div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
<nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
<a href="" class="navbar-brand">
<h1 class="m-0 text-primary"><span class="text-dark">PULMM</span>ER</h1>
</a>
<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
<div class="navbar-nav ml-auto py-0">
<a href="index.php" class="nav-item nav-link">Home</a>
<a href="about.php" class="nav-item nav-link">About</a>
<a href="service.php" class="nav-item nav-link">Services</a>
<a href="package.php" class="nav-item nav-link active">Tour Packages</a>
<div class="nav-item dropdown">
<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
<div class="dropdown-menu border-0 rounded-0 m-0">
<a href="destination.php" class="dropdown-item">Blog</a>
<a href="alldestination.php" class="dropdown-item">Destinations</a>
</div>
</div>
<a href="contact.php" class="nav-item nav-link">Contact</a>
</div>
</div>
</nav>
</div>
</div>
<!-- Navbar End -->
<style>
.package-item img{
max-height:38vh;
width:100%;
}
</style>

<!-- Header Start -->
<div class="container-fluid page-header">
<div class="container">
<div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
<h3 class="display-4 text-white text-uppercase">Packages</h3>
<div class="d-inline-flex text-white">
<!-- <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
<i class="fa fa-angle-double-right pt-1 px-3"></i>
<p class="m-0 text-uppercase">Packages</p> -->
</div>
</div>
</div>
</div>
<!-- Header End -->


<!-- Booking Start -->
<div class="container-fluid booking mt-5 pb-5">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 30px;">
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <form action="package.php"method="POST"autocomplete="off">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select px-4" style="height: 47px;"name="destination"required>
                                    <?php
                                        $selectCat="select * from destinations";
                                        $result=$conn->query($selectCat);
                            
                                        echo "<option selected disabled='true'>Destination</option>";
                                        while($row=mysqli_fetch_assoc($result)){?>
                                
                                            <option value="<?php echo $row['destination_id'];?>"><?php echo$row['destination_name'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                <select class="custom-select px-4" style="height: 47px;"name="type"required>
                                    <?php
                                        $selectCat="select * from type";
                                        $result=$conn->query($selectCat);
                            
                                        echo "<option selected disabled='true'>Tour Type</option>";
                                        while($row=mysqli_fetch_assoc($result)){?>
                                
                                            <option value="<?php echo $row['type_id'];?>"><?php echo$row['type'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <div class="date" id="date2" data-target-input="nearest">
                                        <input type="text" class="form-control p-4 datetimepicker-input"name="date" required placeholder="Depart Date" data-target="#date2" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                <input type="number" class="form-control p-4 datetimepicker-input" name="duration"placeholder="Duration"required>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block" type="submit" name="btn_search"style="height: 47px;">Search <i class="fa fa-search" aria-hidden="true"style="margin-top:5px;"></i></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Booking End -->


<!-- Packages Start -->
<div class="container-fluid py-5">
<div class="container pt-5 pb-3">
<div class="text-center mb-3 pb-3">
<h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h6>
<h1></h1>
</div>
<div class="row">
<?php
if(isset($_POST['btn_search'])){
$dest=$_POST['destination'];
$type=$_POST['type'];
$date=$_POST['date'];

strtotime($var);
time() - strtotime($var);
if((time()-(60*60*24)) < strtotime($date)){
    
$duration=$_POST['duration'];
$insertqry="select * from packages inner join package_images on packages.id=package_images.package_id inner join destinations on packages.dest_id=destinations.destination_id and dest_id=? and package_duration=? and type_id=? group by package_id";

$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertqry)){
echo "Failed";
}else{
mysqli_stmt_bind_param($stmtinsert, "sss", $dest, $duration, $type);
mysqli_stmt_execute($stmtinsert);
$result=mysqli_stmt_get_result($stmtinsert);
$count=mysqli_num_rows($result);
if($count<1){
    ?>
    <div class="container-fluid py-5">
<div class="container pt-5 pb-3">
   <div class="text-center mb-3 pb-3">
<h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">SEARCH RESULTS</h6>
<h1>No Search Results</h1>
<a href="package.php"><button class="btn btn-primary" type="submit"style="height: 47px; margin-top: -2px;">View Other Tours</button></a>
</div>
</div>
</div>
    <?php
}else{
while($row=mysqli_fetch_assoc($result)){
?>
<div class="col-lg-4 col-md-6 mb-4">
<div class="package-item bg-white mb-2">
<?php
echo "<img class='img-fluid' src='uploads/package/".$row["pack_image"]."' alt='Oops! Nothing to show'>";
?>
<div class="p-4">
<div class="d-flex justify-content-between mb-3">
<small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i><?php echo $row['destination_name'];?></small>
<small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i><?php echo $row['package_duration'];?> days</small>
<!-- <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>2 Person</small> -->
</div>
<a class="h5 text-decoration-none package_link"style="cursor:pointer;"> <span hidden class="hidden_package"><?php echo $row['id'];?></span> <?php echo $row['package_name'];?></a>
<div class="border-top mt-4 pt-4">
<div class="d-flex justify-content-between">
<button class="button-33 package_link bg-primary" role="button"><i class="fa fa-phone-alt mr-2"></i> Inquire</button>
<!-- <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6> -->
<!-- <h5 class="m-0">Khs <?php echo $row['package_price'];?></h5> -->
</div>
</div>
</div>
</div>
</div>
<?php
}
}
}
}else{
    ?><script>
        alert('Invalid Check in date!');
        setTimeout(function(){
            location.href="index.php"
        },200)
    </script><?php
}

}else{
$selectCat="select * from packages inner join package_images on packages.id=package_images.package_id inner join destinations on packages.dest_id=destinations.destination_id group by package_id";
$result=$conn->query($selectCat);
while($row=mysqli_fetch_assoc($result)){
?>
<div class="col-lg-4 col-md-6 mb-4">
<div class="package-item bg-white mb-2">
<?php
echo "<img class='img-fluid' src='uploads/package/".$row["pack_image"]."' alt='Oops! Nothing to show'>";
?>
<div class="p-4">
<div class="d-flex justify-content-between mb-3">
<small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i><?php echo $row['destination_name'];?></small>
<small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i><?php echo $row['package_duration'];?> days</small>
<!-- <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>2 Person</small> -->
</div>
<a class="h5 text-decoration-none package_link"style="cursor:pointer;"> <span hidden class="hidden_package"><?php echo $row['id'];?></span> <?php echo $row['package_name'];?></a>
<div class="border-top mt-4 pt-4">
<div class="d-flex justify-content-between">
<button class="button-33 package_link bg-primary" role="button"><i class="fa fa-phone-alt mr-2"></i> Inquire</button>
<!-- <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6> -->
<!-- <h5 class="m-0">Khs <?php echo $row['package_price'];?></h5> -->
</div>
</div>
</div>
</div>
</div>
<?php
}
}
?>
</div>
</div>
</div>
<!-- Packages End -->


<!-- Destination Start -->
<div class="container-fluid py-5">
<div class="container pt-5 pb-3">
<div class="text-center mb-3 pb-3">
<h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
<h1>Explore Top Destination</h1>
</div>
<div class="row">
<?php
$selectCat="select * from destination_images inner join destinations where destinations.destination_id=destination_images.desti_id group by desti_id limit 6";
$result=$conn->query($selectCat);
while($row=mysqli_fetch_assoc($result)){
?>
<div class="col-lg-4 col-md-6 mb-4">
<div class="destination-item position-relative overflow-hidden mb-2">
<?php
echo "<img class='img-fluid' src='uploads/".$row['image_name']."' alt='Oops! Nothing to show'style='max-height:40vh;width:100%;'>";
?>
<a class="destination-overlay text-white text-decoration-none" href="alldestination.php?file=<?php echo $row['destination_id']; ?>">
<h5 class="text-white"><?php echo $row['destination_name'];?></h5>
</a>
</div>
</div>
<?php
}
?>
</div>
</div>
</div>
<!-- Destination Start -->


<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
<div class="row pt-5">
<div class="col-lg-3 col-md-6 mb-5">
<a href="" class="navbar-brand">
<h1 class="text-primary"><span class="text-white">PULMM</span>ER</h1>
</a>
<p>Wonder, Explore & Discover with us. Adventure with people who wanna have adventure!</p>

</div>
<div class="col-lg-3 col-md-6 mb-5">
<h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;"><span style="color:yellow">SERVICES</span></h5>
<div class="d-flex flex-column justify-content-start">
<a class="text-white-50 mb-2" href="about.php"><i class="fa fa-angle-right mr-2"></i>About</a>
<a class="text-white-50 mb-2" href="blog.php"><i class="fa fa-angle-right mr-2"></i>Destination</a>
<a class="text-white-50 mb-2" href="service.php"><i class="fa fa-angle-right mr-2"></i>Services</a>
<a class="text-white-50 mb-2" href="package.php"><i class="fa fa-angle-right mr-2"></i>Packages</a>
<!-- <a class="text-white-50 mb-2" href="testimonial.php"><i class="fa fa-angle-right mr-2"></i>Testimonial</a> -->
</div>
</div>
<div class="col-lg-3 col-md-6 mb-5">
<h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;"><span style="color:yellow">Quick Links</span></h5>
<div class="d-flex flex-column justify-content-start">
<a class="text-white-50 mb-2" href="about.php"><i class="fa fa-angle-right mr-2"></i>About</a>
<a class="text-white-50 mb-2" href="blog.php"><i class="fa fa-angle-right mr-2"></i>Destination</a>
<a class="text-white-50 mb-2" href="service.php"><i class="fa fa-angle-right mr-2"></i>Services</a>
<a class="text-white-50 mb-2" href="package.php"><i class="fa fa-angle-right mr-2"></i>Packages</a>
<!-- <a class="text-white-50 mb-2" href="testimonial.php"><i class="fa fa-angle-right mr-2"></i>Testimonial</a> -->
</div>
</div>
<div class="col-lg-3 col-md-6 mb-5">
<h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;"><span style="color:yellow">Contact Us</span></h5>
<p><i class="fa fa-address-card alt mr-2"style="color:yellow"></i>P.O BOX 254759886003- Nanyuki</p>
<p><i class="fa fa-phone-alt mr-2"style="color:yellow"></i>+2547598860030</p>
<p><i class="fa fa-envelope mr-2"style="color:yellow"></i>info@pulmmertours.co.ke</p>
<h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;color:yellow;">Newsletter</h6>
<div class="w-100">
<div class="input-group">
<input type="text" class="form-control border-light email" style="padding: 25px;" placeholder="Your Email">
<div class="input-group-append">
<button class="btn btn-primary px-3 subscribe">Subscribe</button>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
<div class="row">
<div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
</p>
</div>
<div class="col-lg-6 text-center text-md-right">
<!-- <p class="m-0 text-white-50">Designed by <a href="https://htmlcodex.com">HTML Codex</a> -->
</p>
</div>
</div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="js/book.js?v=<?php echo time();?>"></script>
<script src="js/main.js"></script>
</body>

</html>
<script>
$(document).ready(function(){
$('.package_link').on('click', function(){
var id=$(this).closest('.p-4').find('.hidden_package')[0].innerText
$.ajax({
url:'single.php',
method:'POST',
data:{id:id},
success:function(data){
$('#response').html(data)
}
})
})
})
</script>