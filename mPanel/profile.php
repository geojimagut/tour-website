<?php
ini_set("display_errors", 0);
session_start();
?>

<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('connect.php');
include('sec.php');
if(isset($_POST['btnchangeprofile'])){
    $email=$_POST['txtemail'];
    $user=$_POST['txtusername'];
    $oldpass=md5($_POST['oldpass']);
    $newpass=md5($_POST['newpass']);
    $conqry="select * from log where password =? ";


//create a statement
$stmt=mysqli_stmt_init($conn);
//prepare the prepared statements
if(!mysqli_stmt_prepare($stmt,$conqry)){
    echo "Sql staments Failed";
}else{
//bind parameters to the place holders
mysqli_stmt_bind_param($stmt, "s",$oldpass);	
//Run parameters inside db
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);
$rows=mysqli_fetch_assoc($result);

    //$res=$conn->query($conqry);
    //$rows=mysqli_fetch_assoc($result);
    //echo $rows['password'];
    if($rows['password']!=$oldpass){
        ?><script>alert('Wrong password');</script><?php

    }else{
      
      
      if($newpass==""){
        $updateqry="update log set email=?, username=? where password=? ";
//create a statement
$stmt=mysqli_stmt_init($conn);
//prepare the prepared statements
if(!mysqli_stmt_prepare($stmt,$updateqry)){
    echo "Sql staments Failed";
}else{
//bind parameters to the place holders
mysqli_stmt_bind_param($stmt, "sss",$email,$user,$oldpass);	
//Run parameters inside db
        if(mysqli_stmt_execute($stmt)){
            ?><script>alert('Updated');</script><?php
        }else{
            ?><script>alert('Failed!');</script><?php
        }

      }
}else{
        $updateqry="update log set email=?, username=?, password=? where password=? ";
      //create a statement
$stmt=mysqli_stmt_init($conn);
//prepare the prepared statements
if(!mysqli_stmt_prepare($stmt,$updateqry)){
    echo "Sql staments Failed";
}else{
//bind parameters to the place holders
mysqli_stmt_bind_param($stmt, "ssss",$email,$user,$newpass,$oldpass);	
//Run parameters inside db
        if(mysqli_stmt_execute($stmt)){
            ?><script>alert('Updated');</script><?php
        }else{
            ?><script>alert('Failed!');</script><?php
        }

      }
      }
        
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
    <title>Profile</title>
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
    <div class="content-wrap">
        <div id="form-side">
   <form autocomplete="off"action="profile.php"method="POST">
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="txtemail" name="txtemail"aria-describedby="emailHelp" placeholder="name@example.com"required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Username</label>
    <input type="text" class="form-control" id="txtusername" name="txtusername"placeholder="Username"required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Old password</label>
    <input type="password" class="form-control" id="oldpass"name="oldpass" placeholder="Old password"required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">New password</label>
    <input type="text" class="form-control" id="newpass" name="newpass"placeholder="New password">
  </div>
 
  <button type="submit" class="btn btn-primary"name="btnchangeprofile">Submit</button>
</form>
</div>
</div>
<div class="profile-side">
<i class="fa fa-user-circle-o user" style="font-size:70px;color:red"></i>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('connect.php');
$getuser="select * from log";
$result=$conn->query($getuser);
$row=mysqli_fetch_assoc($result);
echo  "<input type='text'readonly class='userinfo'id='le-email'value=".$row["email"].">";
echo "<input type='text'readonly class='userinfo'id='le-user'value=".$row['username'].">";
?><br>
<button class="btn btn-primary"id="changepass">change</button>
<button class="btn btn-primary"id="cancelchange">Cancel</button>
</div>
   </div>
</body>
</html>
<script>

</script>