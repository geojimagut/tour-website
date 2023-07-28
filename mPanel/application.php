<?php
ini_set("display_errors", 0);
session_start();

include('connect.php');
include('sec.php');

if(isset($_POST['finalbook'])){
  $name=$_POST['txtname'];
  $packageid=$_POST['selpackage'];
  $phone=$_POST['txtphone'];
  $email=$_POST['txtemail'];
  $from=$_POST['txtfrom'];
  $people=$_POST['txtpeople'];
  $comment=$_POST['txtcomment'];




  
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
?>
<script>alert('Thank you for booking with  us') </script>
<?php
}

}else{
?>
<script>alert('You have already booked')</script>
<?php
}  

}


}else if(isset($_POST['bookupdate'])){
  $appid=$_POST['txtid'];
  $name=$_POST['txtname'];
  $packageid=$_POST['selpackage'];
  $phone=$_POST['txtphone'];
  $email=$_POST['txtemail'];
  $from=$_POST['txtfrom'];
  $people=$_POST['txtpeople'];
  $comment=$_POST['txtcomment'];
  if($packageid==''){

//inserting data into db
$insertqry="update applications set name=? , email=? , phone=? , people=? , day_one=? , comment=? where app_id=? ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertqry)){
	echo "Failed";
}else{
	mysqli_stmt_bind_param($stmtinsert, "ssiissi", $name, $email, $phone, $people, $from, $comment, $appid );
	mysqli_stmt_execute($stmtinsert);
  ?>
      <script>alert('Updated successfully') </script>
      <?php
}

  }else{


//inserting data into db
$insertqry="update applications set package_id=?, name=? , email=? , phone=? , people=?, day_one=? , comment=? where app_id=? ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertqry)){
	echo "Failed";
}else{
	mysqli_stmt_bind_param($stmtinsert, "issiissi",$packageid, $name, $email, $phone, $people, $from, $comment, $appid );
	mysqli_stmt_execute($stmtinsert);
  ?>
      <script>alert('Updated successfully') </script>
      <?php
}

}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications</title>
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
</head>
<body>
  <style>
    #black_back{
      width:100%;
      height:100vh;
      background-color:black;
      z-index:20;
      position:absolute;
      opacity:0.7;
      display:none;
    }
    #detail_panel{
      width:70%;
      margin-left:15%;
      margin-top:10vh;
      height:70vh;
      position:absolute;
      z-index:21;
      background-color:#FFFFFF;
      border-radius:5px;
      display:none;
    }
    .table-holder table tbody td p{
      color:black;
      font-weight:bold;
    }
    .table-holder table tbody td p span{
      color:rgb(0,130,189);
      font-weight:none;
    }
    #detail_panel p{
      margin-left:5%;
      font-weight:bold;
    }
    #detail_panel p:first-child{
      margin-top:30px;
    }
    #detail_panel span{
      color:rgb(0,130,189);
      font-weight:0;
      margin-left:2%;
    }
  </style>
  <div id="black_back">

  </div>
  <div id="detail_panel">
    <p>NAME:<span id="show_name"></span></p>
    <p>EMAIL:<span id="show_email"></span></p>
    <p>PHONE:<span id="show_phone"></span></p>
    <p>PACKAGE:<span id="show_package"></span></p>
    <p>DURATION:<span id="show_duration"></span></p>
    <p>CHECK IN:<span id="show_check"></span></p>
    <p>COMMENT:<span id="show_comment"></span></p>
    <p>NO. OF PEOPLE: <span id="show_people"></span></p>
  </div>
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
<div class="panel">
  <div id="result">
    <!--show result-->
  </div>
<div class="table-holder"id="view-application">
<button class="btn btn-primary"id="button-book"style="margin-bottom:15px">BOOK</button>
<table id="tbl-application" class="table table-striped" style="width:100%">
        <thead>
              <tr>
                <th hidden>#</th>
                <th style="width:30%">Personal Details</th>
                <th style="width:40%">Tour Details</th>
                <th>Completion</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
            include('connect.php');
            $selectCat="select * from applications inner join packages where applications.package_id=packages.id ";
            $result=$conn->query($selectCat);
            while($row=mysqli_fetch_assoc($result)){
              
              ?>
            <tr>
            <td hidden><?php echo $row['app_id'];?></td>
              <td>
                <p>Name: <span class="app_name"><?php echo $row['name'];?></span></p>
                <p>Email: <span class="app_email"><?php echo $row['email'];?></span></p>
                <p>Tel: <span class="app_phone"><?php echo $row['phone'];?></span></p>
            </td>
              <td>
              <p>Package: <span class="app_pack"><?php echo $row['package_name'];?></span></p>
                <p>Duration: <span class="app_duration"><?php echo $row['package_duration'];?></span></p>
                <p>Check In: <span class="app_day"><?php echo $row['day_one'];?></span></p>
                <p><span></span> <span hidden class="app_comment"><?php echo $row['comment'];?></span></p>
                <p><span></span> <span hidden class="app_people"><?php echo $row['people'];?></span></p>
              </td>
              <td>
                <?php
                if($row['status']=='1'){
                    ?><label style="font-weight:bold;color:green;">COMPLETED</label><?php
                }else{
                  ?>
                  <button class="btn btn-secondary btn_done">MARK</button>
                  <?php
                }
              ?>
            </td>
              <!--td><?php echo $row['people'];?></td>
              <td><?php echo $row['day_one'];?></td>
              <td><?php echo $row['package_name'];?></td>
              <td><?php echo $row['package_duration'];?></td>
              <td><?php echo $row['comment'];?></td> -->
              <td><span style="margin-right:8px"><i class="fa fa-eye pointer view" aria-hidden="true" style="font-size:30px;color:black"></i></span><span><i class="fa fa-edit pointer btn-update-application" aria-hidden="true" style="font-size:30px;color:black"></i></span><span><i class="fa fa-trash pointer btn-delete-application" aria-hidden="true" style="font-size:30px;color:red"></i></span></td>

            </tr>

            <?php
          }
          ?>
          </tbody>
        </table>
</div>
<div id="application-form">
  <div class="top-bar">
<button class="btn btn-primary"id="button-cancel-book"style="margin-bottom:15px;">CANCEL</button>
</div>
  <div class="part-a">
<form id="frmbook"action="application.php"method="POST">
  <input type="hidden"name="txtid"id="txtid">
<div class="form-group">
  <label for="">Destination</label>
  <select name="seldestination" id="sel_product_update"class="form-control" onchange="updateselectedValue(this.value)"style="width:80%;">
    <option value=""selected="true" disabled>Select Destination</option>
<?php
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
            include('connect.php');
            $selectCat="select * from destinations";
            $result=$conn->query($selectCat);
   

            while($row=mysqli_fetch_assoc($result)){?>
    
                <option value="<?php echo $row['destination_id'];?>"><?php echo $row['destination_name'];?></option>
            <?php
            }
            ?>
</select>
        </div>
        <div class="form-group">
  <label for="">Package</label>
  <select name="selpackage" id="selpackage"class="form-control"style="width:80%;" >
  <option selected="true"disabled>Select package</option>
    <!--from db-->
          </select>

          </div>
  <div class="form-group">
    <label for="exampleInputPassword1"class="card-title">Full Names</label>
    <input type="text" class="form-control" id="txtname"name="txtname" placeholder="John Doe"required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"class="card-title">Email Address</label>
    <input type="email" class="form-control" id="txtemail" name="txtemail"aria-describedby="emailHelp" placeholder="someone@example.com"required>
    
  </div>
          </div>
  <div class="part-b">
  <div class="form-group">
    <label for="exampleInputPassword1"class="card-title">Phone Number</label>
    <input type="number" class="form-control" id="txtphone"name="txtphone" placeholder="0700000000"required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"class="card-title">No. of People</label>
    <input type="number" class="form-control" id="txtpeople"name="txtpeople" placeholder="3"required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"class="card-title">From</label>
    <input type="date" class="form-control" id="txtfrom"name="txtfrom" placeholder="3"required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Comments</label>
    <textarea class="form-control" id="txtcomment" name="txtcomment"rows="3"placeholder="Anything else"style="width:80%;"></textarea>
  </div>
  <input type="submit" class="btn btn-info"style="width:40%"id="finalbook"name="finalbook"value="Book">
  <input type="submit" class="btn btn-info"style="width:40%"id="bookupdate"name="bookupdate"value="Update">
  
</form>
</div>
</div>
        </div>
</body>
</html>
<!--script-->
<script>
  //selecting pacakge according to destination
function updateselectedValue(id){
    $.ajax({
        url:'handler.php',
        method:'POST',
        data:{sel_product_update:id},
        success:function(response){
            $('#selpackage').html(response);
        }
    })
}
$(document).ready(function(){
  $('.btn_done').on('click', function(){
    var id=$(this).closest('tr').find('td:eq(0)').text().trim()
        var state=confirm('Mark this tour done?');
        if(state==true){
            $.ajax({
            url:'done.php',
            method:'POST',
            data:{id:id},
            success:function(data){
                $('#black_back').html(data)
            }
        })
        }else{
                
        }
    })

 $('.view').on('click', function(){
  document.getElementById('black_back').style.display='block';
  document.getElementById('detail_panel').style.display='block'
  window.scrollTo(0,0)
  document.body.style.overflowY='hidden'
  $('#show_name').html($(this).closest('tr').find('.app_name').text().trim())
  $('#show_email').html($(this).closest('tr').find('.app_email').text().trim())
  $('#show_phone').html($(this).closest('tr').find('.app_phone').text().trim())
  $('#show_package').html($(this).closest('tr').find('.app_pack').text().trim())
  $('#show_duration').html($(this).closest('tr').find('.app_duration').text().trim())
  $('#show_check').html($(this).closest('tr').find('.app_day').text().trim())
  $('#show_comment').html($(this).closest('tr').find('.app_comment').text().trim())
  $('#show_people').html($(this).closest('tr').find('.app_people').text().trim())
 })
 $('#black_back').on('click', function(){
  document.getElementById('black_back').style.display='none';
  document.getElementById('detail_panel').style.display='none'
  window.scrollTo(0,0)
  document.body.style.overflowY='scroll'
 })
})
</script>