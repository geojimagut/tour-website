<?php include('connect.php');
ini_set("display_errors", 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pulmmer Tours | About</title>
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
                        <a href="about.php" class="nav-item nav-link active">About</a>
                        <a href="service.php" class="nav-item nav-link">Services</a>
                        <a href="package.php" class="nav-item nav-link">Tour Packages</a>
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


    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">About</h3>
                <div class="d-inline-flex text-white">
                    <!-- <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p> -->
                    <!-- <i class="fa fa-angle-double-right pt-1 px-3"></i> -->
                    <!-- <p class="m-0 text-uppercase">About</p> -->
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


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Who Are We?</h6>
                        <h1 class="mb-3">We specialize in delivery of affordable travels</h1>
                        <p>Pulmmer Tours limited is an In-bound tour operator/ destination Management company based in Kenya. We were established in May 2022</p>
                        <div class="row mb-4">
                            <?php
                                   $selectCat="select * from destination_images limit 2";

                                    $result=$conn->query($selectCat);
                                    
                                    while($row=mysqli_fetch_assoc($result)){
                                        echo "<div class='col-6'>";
                                        echo "<img class='img-fluid' src='uploads/".$row['image_name']."'alt='Oops! No image'>";
                                        echo "</div>";
                                    }
                                ?>
                        </div>
                        <a href="package.php" class="btn btn-primary mt-1"style="background-color:orange;border:none;">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Value for Money</h5>
                            <p class="m-0">Get services worth what you paid for. Pulmer Tours strives that it delivers services that exceed your expectations</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-user text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Our Team</h5>
                            <p class="m-0">We work round the clock to ensure your satisfaction</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-heart text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Passionate Travellers</h5>
                            <p class="m-0">Get on the road with people who are passionate about being on the road, how fun can it be?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->
    <style>
        .objective{
            text-align:center;
            width:90%;
            margin-left:5%;
        }
        .objective p{
            line-height:2;
            font-size:18px;
        }
        .first_objective,
        .second_objective{
            margin-bottom:40px;
        }
    </style>
    <!--objectives start  -->
    <div class="objective">
    <div class="row align-items-center">
        <div class="objective">
            <div class="first_objective">
        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Belief</h6>
        <p class="m-0">Adventure tourism, nature tourism, wildlife tourism, community and culture tourism.</p>
    </div>
    <div class="second_objective">
    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">What we offer</h6>
    <p class="m-0">We offer a variety of activities customized to our client’s needs, interests and requirements. Our guides are well trained and experienced, respectful of the environment, community and natural resources. They pay attention to detail.</p>
    </div>
    <div class="last_objective">
    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our objectives</h6>
    <p class="m-0">To provide high standard services suitable for individuals seeking relaxing, comfortable and memorable experience in the tourism industry.
    <p class="m-0">To produce expeditions and memories that would satisfy our clients</p>
    <p class="m-0">Educate and engage our clients about the culture and diverse natural beauty of Africa.</p>
    <p class="m-0">To offer travel services at very reasonable prices</p>
    <p class="m-0">Participated in both local and regional community services</p>
    </div>
        </div>
    </div>
    </div>
    <!-- objectives end -->

    <!-- Registration Start -->
    <div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <!-- <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Mega Offer</h6> -->
                        <h1 class="text-white"><span class="text-primary">Hello</span> What then?</h1>
                    </div>
                    <p class="text-white">Having trouble finding a package, or anything? Please write to us. We'll help you find what you are seeking. Talk to us</p>
                    <ul class="list-inline text-white m-0">
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Tour packages</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Holiday Recommendations</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>The best place to go and when to go</li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-primary text-center p-4">
                            <h1 class="text-white m-0">Talk To Us</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-white p-5">
                        <form class="#">
                                <div class="form-group">
                                    <input type="text" class="form-control p-4 name" placeholder="Your name" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control p-4 email" placeholder="Your email" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control px-4 message" placeholder="Tell us something"style="height: 47px;">
                                </div>
                                <div>
                                    <input type="button"class="btn btn-primary btn-block py-3 btn-inquiry" type="submit"value="SEND"></button>
                                </div>
                                <div class="the_response">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->

    <!-- Team Start ->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Guides</h6>
                <h1>Our Travel Guides</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">Guide Name</h5>
                            <p class="m-0">Designation</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">Guide Name</h5>
                            <p class="m-0">Designation</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">Guide Name</h5>
                            <p class="m-0">Designation</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-4.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">Guide Name</h5>
                            <p class="m-0">Designation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <-- Team End -->


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