<?php include('connect.php');
ini_set("display_errors", 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Pulmmer Tours | Services</title>
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

<body>
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
<a href="service.php" class="nav-item nav-link active">Services</a>
<a href="package.php" class="nav-item nav-link">Tour Packages</a>
<div class="nav-item dropdown">
<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
<div class="dropdown-menu border-0 rounded-0 m-0">
<a href="destination.php" class="dropdown-item">Blog</a>
<a href="alldestination.php" class="dropdown-item">Destinations</a>
<!-- <a href="single.php" class="dropdown-item">Blog Detail</a>
<a href="destination.php" class="dropdown-item">Destination</a>
<a href="guide.php" class="dropdown-item">Travel Guides</a>
<a href="testimonial.php" class="dropdown-item">Testimonial</a> -->
</div>
</div>
<a href="contact.php" class="nav-item nav-link">Contact</a>
</div>
</div>
</nav>
</div>
</div>
<!-- Navbar End -->


<!-- Header Start -->
<div class="container-fluid page-header">
<div class="container">
<div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
<h3 class="display-4 text-white text-uppercase">Services</h3>
<div class="d-inline-flex text-white">
<!-- <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
<i class="fa fa-angle-double-right pt-1 px-3"></i> -->
<!-- <p class="m-0 text-uppercase">Services</p> -->
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


<!-- Service Start -->
<div class="container-fluid py-5">
<div class="container pt-5 pb-3">
<div class="text-center mb-3 pb-3">
<h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Services</h6>
<h1></h1>
</div>
<!-- row one -->
<div class="row">
<div class="col-lg-4 col-md-6 mb-4">
<div class="service-item bg-white text-center mb-2 py-5 px-4">
<i class="fa fa-globe fa-globe mx-auto mb-4"></i>
<h5 class="mb-2">Beach Holidays</h5>
<p class="m-0">Enjoy the different beaches that lie along the coastline of east Africa at affordable prices</p>
</div>
</div>
<div class="col-lg-4 col-md-6 mb-4">
<div class="service-item bg-white text-center mb-2 py-5 px-4">
<i class="fa fa-gift fa-gift mx-auto mb-4"></i>
<h5 class="mb-2">Tailor Made Holidays</h5>
<p class="m-0">Tours made just for you, if you fail to find a package that fit your rerquirements perfectly. We create it, just for you &#128522;</p>
</div>
</div>
<div class="col-lg-4 col-md-6 mb-4">
<div class="service-item bg-white text-center mb-2 py-5 px-4">
<i class="fa fa-heart fa-heart mx-auto mb-4"></i>
<h5 class="mb-2">Customized Tours; Honey moon, Family, Group</h5>
<p class="m-0">Plan for your honey moon, family and group tours with us</p>
</div>
</div>
</div>
<!-- row two -->
<div class="row">
<div class="col-lg-4 col-md-6 mb-4">
<div class="service-item bg-white text-center mb-2 py-5 px-4">
<i class="fa fa-eye fa-eye mx-auto mb-4"></i>
<h5 class="mb-2">Sight Seeing</h5>
<p class="m-0">Enjoy tour packages where you enjoy the beautiful scenaries that lie in the Eastern part of Africa</p>
</div>
</div>
<div class="col-lg-4 col-md-6 mb-4">
<div class="service-item bg-white text-center mb-2 py-5 px-4">
<i class="fa fa-globe fa-globe mx-auto mb-4"></i>
<h5 class="mb-2">Regional Charters</h5>
<p class="m-0">A simple interface allows you to easily book a tour! Get fast response via call or email concerning your tour</p>
</div>
</div>
<div class="col-lg-4 col-md-6 mb-4">
<div class="service-item bg-white text-center mb-2 py-5 px-4">
<i class="fa fa-handshake fa-handshake mx-auto mb-4"></i>
<h5 class="mb-2">Special Interest and affinity Groups</h5>
<p class="m-0">Pulmmer Tours organizes tours that are specially designed for groups which have the same interests. </p>
</div>
</div>
</div>
<!-- row three -->
<div class="row">
<div class="col-lg-4 col-md-6 mb-4">
<div class="service-item bg-white text-center mb-2 py-5 px-4">
<i class="fa fa-list fa-list mx-auto mb-4"></i>
<h5 class="mb-2">Excursions</h5>
<p class="m-0">Pleasure, Scientific or any other excursions. Pulmmer has got you covered</p>
</div>
</div>
<div class="col-lg-4 col-md-6 mb-4">
<div class="service-item bg-white text-center mb-2 py-5 px-4">
<i class="fa fa-plane fa-plane mx-auto mb-4"></i>
<h5 class="mb-2">Regional Airline Booking</h5>
<p class="m-0">Flights to facilitate your tours within the region</p>
</div>
</div>
<div class="col-lg-4 col-md-6 mb-4">
<div class="service-item bg-white text-center mb-2 py-5 px-4">
<i class="fa fa-truck fa-truck mx-auto mb-4"></i>
<h5 class="mb-2">Ground Transportations</h5>
<p class="m-0">Have your cargo delivered to any part of the country and the Eastern part of Africa at large</p>
</div>
</div>
</div>
</div>
</div>
<!-- Service End -->


<!-- Testimonial Start -->
<div class="container-fluid py-5">
<div class="container py-5">


<?php
$get=$conn->query("select * from reviews order by review_id desc limit 4");
$count=mysqli_num_rows($get);
if($count>0){
?>
<div class="text-center mb-3 pb-3">
<h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonial</h6>
<h1>What Clients Say</h1>
</div>
<div class="owl-carousel testimonial-carousel">
<?php
while($rows=mysqli_fetch_assoc($get)){
?>
<div class="text-center pb-4">
<img class="img-fluid mx-auto" src="img/user.png" style="width: 100px; height: 100px;" >
<div class="testimonial-text bg-white p-4 mt-n5">
<p class="mt-5"><?php echo $rows['review'];?>
</p>
<h5 class="text-truncate"><?php echo $rows['email'];?></h5>
<!-- <span>Profession</span> -->
</div>
</div>
<?php
}
?></div><?php
}else{
//show nothing
}

?>
</div>
</div>
<!-- Testimonial End -->
<style>
.add_review{
width:90%;
margin-left:5%;
text-align:center;
}
.add_review input[type=text],
.add_review textarea{
width:60%;
margin-left:20%;
margin-bottom:15px;
}

.add_review input[type=button]{
margin-top:5px;
}
#revew_response{
margin-top:15px;
}
</style>
<!-- Add review start -->
<div class="add_review">
<form id="frmreview">
<input type="text" class="form-control" name="name"id="name"style="padding: 25px;" placeholder="Enter Your Name">
<textarea class="form-control" name="review"id="review"style="padding: 25px;" placeholder="How was your tour. Talk to us"maxlength="100"cols=""rows="4"></textarea>
<div class="review_button">
<input type="button" class="btn btn-primary px-3"id="btn_review"name="btn_review"value="Review">
</form>
<div id="revew_response"></div>
</div>
</div>
<!-- end of add review -->

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