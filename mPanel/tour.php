<?php
ini_set("display_errors", 0);
session_start();
include('sec.php');
include('connect.php');
if(isset($_POST['add_tour'])){
     $tour=$_POST['tour'];

     $prev="select * from type where type=? ";
     //create a statement
     $stmtprev=mysqli_stmt_init($conn);
     if(!mysqli_stmt_prepare($stmtprev, $prev)){
     echo "Failed";
     }else{
     //bind parameters to the place holders
     mysqli_stmt_bind_param($stmtprev, 's', $tour );
     //rund parameters inside db
     mysqli_stmt_execute($stmtprev);
     $result=mysqli_stmt_get_result($stmtprev);
     $count=mysqli_num_rows($result);
     if($count<1){
        $confirmqry="insert into type(type) values(?)";
        //create a statement
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $confirmqry)){
        echo "Failed";
        }else{
        //bind parameters to the place holders
        mysqli_stmt_bind_param($stmt, 's', $tour );
        //rund parameters inside db
        mysqli_stmt_execute($stmt);
        echo "<script>alert('Tour Type Added')</script>";
        }
        }
     else{
        echo "<script>alert('Tour Type Already Exists!')</script>";
     }
}
}else if(isset($_POST['update_tour'])){
    $tour=$_POST['tour'];
    $prev=$_POST['prev'];
    $confirmqry="update type set type=? where type_id=? ";
    //create a statement
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $confirmqry)){
    echo "Failed";
    }else{
    //bind parameters to the place holders
    mysqli_stmt_bind_param($stmt, 'si', $tour, $prev );
    //rund parameters inside db
    mysqli_stmt_execute($stmt);
    echo "<script>alert('Tour Type Updated')</script>";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Types</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous">
</script>
     <!--bootsrap-->
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <!--my js-->
 <script src="js/dtscript.js?v=<?php echo time();?>"></script>
    <script src="js/dbscript.js?v=<?php echo time();?>"></script>
    <!--my css-->
    <link rel="stylesheet"href="namna/namna.css?v=<?php echo time();?>">
<!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--my css-->
    <link rel="stylesheet"href="namna/namna.css?v=<?php echo time();?>">
</head>
<body>
<div class="nav-bar">
    <ul>
    <li><a href="home.php"><i class="fa fa-home" aria-hidden="true" aria-hidden="true"></i> Dashboard</a></li>
        <li><a href="application.php"><i class="fa fa-calendar" aria-hidden="true" ></i> Booking</a></li>
        <li><a href="package.php"><i class="fa fa-gift" aria-hidden="true" aria-hidden="true"></i> Packages</a></li>
        <li><a href="tour.php"><i class="fa fa-list" aria-hidden="true" aria-hidden="true"></i>Tours</a></li>
        <li><a href="destination.php"><i class="fa fa-map-marker" aria-hidden="true" aria-hidden="true"></i> Destinations</a></li>
        <li class="main-menu"><a href="website.php"><i class="fa fa-globe" aria-hidden="true"></i> Webiste</a></li>
        <li class="main-menu"><a href="blog.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Blog</a></li>
        <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true" aria-hidden="true"></i> Profile</a></li>
        <li><form action="log.php"><button type="submit"name="logout"style="border:0;background-color:transparent"><i class="fa fa-power-off" aria-hidden="true"style="font-size:40px;color:red;"></i></button></form></li>
    </ul>
   </div>
   <div id="review_response"></div>
   <style>
    .review_panel{
        width:96%;
        margin-left:2%;
        display:flex;
    }
    .review_panel table p{
        font-weight:bold;
        color:rgb(0,130,189);
    }
    .review_panel table p span{
        color:#000;
    }
    .tour_table{
        width:70%;
    }
    .tour_panel{
        width:28%;
        margin-top:85px;
        margin-left:2%;
    }
    .tour_panel form{
        width:96%;
        margin-left:2%;
    }
    .tour_panel form input[type=text]{
        margin-bottom:20px;
    }
   </style>
   <div class="panel">
    <div class="review_panel">
        <div class="tour_table">
   <table id="tbl-application" class="table table-striped" style="width:100%">
        <thead>
              <tr>
                <th hidden>#</th>
                <th style="width:70%;">Type</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
            include('connect.php');
            $selectCat="select * from type";
            $result=$conn->query($selectCat);
            while($row=mysqli_fetch_assoc($result)){
              
              ?>
            <tr>
            <td hidden><?php echo $row['type_id'];?></td>
              <td>
                <?php echo $row['type'];?>
            </td>
              <td><i class="fa fa-edit pointer btn-update-type" aria-hidden="true" style="font-size:30px;color:rgb(0,130,189);margin-right:10px;"></i><i class="fa fa-trash pointer btn-delete-type" aria-hidden="true" style="font-size:30px;color:red"></i></td>

            </tr>

            <?php
          }
          ?>
          </tbody>
        </table>
        </div>
        <div class="tour_panel">
            <form action="tour.php"method="POST"autocomplete="off">
                <input type="hidden"name="prev"id="prev">
                <input type="text"class="form-control"placeholder="Tour Type"name="tour"id="tour"required>
                <input type="submit"class="form-control btn btn-primary"value="ADD"name="add_tour"id="add_tour">
            </form>
        </div>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('.btn-delete-type').on('click', function(){
        var id=$(this).closest('tr').find('td:eq(0)').text().trim()
        var state=confirm('Are you sure?');
        if(state==true){
            $.ajax({
            url:'deltour.php',
            method:'POST',
            data:{id:id},
            success:function(data){
                $('#review_response').html(data)
            }
        })
        }else{
              
        }
        
    })
    $('.btn-update-type').on('click', function(){
        // var prev=
        // alert(prev)
        document.getElementById('prev').value=$(this).closest('tr').find('td:eq(0)').text().trim()
        document.getElementById('tour').value=$(this).closest('tr').find('td:eq(1)').text().trim()
        
        document.getElementById('add_tour').setAttribute("name", "update_tour")
        document.getElementById('add_tour').setAttribute("value", "UPDATE")
        
    })


    })
</script>