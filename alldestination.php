<?php
ini_set("display_errors", 0);
include('connect.php');
if(!empty($_GET['file'])){
    $fileName  = basename($_GET['file']);

    $selectdest="select * from destinations where destination_id=? limit 1 ";
    $stmt = $conn->prepare($selectdest); 
    $stmt->bind_param("i", $fileName);
    $stmt->execute();
    $resultdest = $stmt->get_result();

while($rowdest=mysqli_fetch_assoc($resultdest)){
  $_SESSION['destinationid']=$rowdest['destination_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pulmmer Tours | Destinations</title>
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
                        <a href="package.php" class="nav-item nav-link">Tour Packages</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Pages</a>
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
                <h3 class="display-4 text-white text-uppercase">DESTINATIONS</h3>
                <div class="d-inline-flex text-white">
                    <!-- <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Destination</p> -->
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
    
 <!-- Blog Start -->
 <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                   
                    <div class="row pb-3"id="div-result">
                        
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
                        <p class="text-body px-3"><?php $rowdest['destination_profile'];?></p>
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;font-size:20px;margin-left:2%;">Attractions</h3>
                        <p class="text-body px-3"><?php echo $rowdest['destination_attraction'];?></p>
                        
                        </div>
                     
                        </div>
                        <?php
                    }
                }
            }
                
/*without search begin*/
else{
$selectdest="select * from destinations limit 1 ";
$resultdest=$conn->query($selectdest);

while($rowdest=mysqli_fetch_assoc($resultdest)){
  $_SESSION['destinationid']=$rowdest['destination_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pulmmer Tours | Destination</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
                        <a href="service.php" class="nav-item nav-link">Services</a>
                        <a href="package.php" class="nav-item nav-link">Tour Packages</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Pages</a>
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
                <h3 class="display-4 text-white text-uppercase">DESTINATIONS</h3>
                <div class="d-inline-flex text-white">
                    <!-- <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Destination</p> -->
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
    
 <!-- Blog Start -->
 <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                   
                    <div class="row pb-3"id="div-result">
                        
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
            }
                    ?>           
                        
                        <!--rows end here-->
                    </div>
                </div>
    
                <div class="col-lg-4 mt-5 mt-lg-0">
                   
                    <!-- Search Form ->
                    <div class="mb-5">
                        <div class="bg-white" style="padding: 30px;">
                            <div class="input-group">
                                <input type="text" class="form-control p-4" placeholder="Search">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary text-white"><i
                                            class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!- Category List -->
                    <style>
                        .certain_height{
                            max-height:60vh;
                            overflow-y:scroll;
                        }
                        .certain_height::-webkit-scrollbar{
                            display:none;
                        }
                    </style>
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">DESTINATIONS</h4>
                        <div class="bg-white" style="padding: 30px;">
                            <ul class="list-inline m-0 certain_height">
                            <?php
                                        error_reporting(E_ERROR | E_WARNING | E_PARSE);
                                        $selectCat="select * from destinations limit 7";
                                        $result=$conn->query($selectCat);
                                        while($row=mysqli_fetch_assoc($result)){?>
                                    <li class="mb-3 d-flex justify-content-between align-items-center">
                                    <?php
                                    echo "<a class='text-dark destination_link ' href='#div-result'><i class='fa fa-angle-right text-primary mr-2 '></i>".$row['destination_name']."<span class='hidden_id'hidden>".$row['destination_id']."</span></a>";
                                    
                                    $res=$conn->query("select * from packages where dest_id=".$row['destination_id']);
                                    $count=mysqli_num_rows($res);
                                    ?>
                                    <span class="badge badge-primary badge-pill"><?php echo $count;?></span>
                                </li>
                                        <?php
                                        }
                                        ?>
                            </ul>
                        </div>
                    </div>
    
                    <!-- Recent Post -->
                    <div class="mb-5 certain_height">
                    <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Recent Post</h4>
                        <?php
                             $selectCat="select blog_id,createtime,pic_name,date, left(content, 300) as profile from blog_pics inner join blog where blog.blog_id=blog_pics.destination_id group by destination_id limit 4";
                             $result=$conn->query($selectCat);
                             while($row=mysqli_fetch_assoc($result)){
                                 ?>
                             <a class="d-flex align-items-center text-decoration-none bg-white mb-3" href="destination.php?file=<?php echo $row['blog_id']; ?>">
                                 <?php
                             echo "<img class='img-fluid'style='max-height:80px;max-width:100px' src='uploads/blog/".$row['pic_name']."' alt=''>";
                             ?>
                             <div class="pl-3">
                                 <h6 class="m-1"><?php echo $row['profile'];?></h6>
                                 <small><?php echo $row['date'];?></small>
                             </div>
                         </a>
                                <?php
                            }
                        ?>
                        
                    </div>
    
                    <div class="mb-5">
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h1>Visit Our Destinations</h1>
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
                        <br>
                        
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
        $('.destination_link').on('click',function(){
            var destinationdata=$(this).closest('.destination_link').find('.hidden_id')[0].innerText
            $.ajax({
            url:'destinationevent.php',
            type:'POST',
            data:{destinationdata:destinationdata},
            success:function (data) {
                $('#div-result').html(data)
            }
        })
        })
    })
</script>