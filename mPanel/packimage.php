<?php
ini_set("display_errors", 0);
session_start();
include('connect.php');
if(isset($_POST['changeslide'])){

    $idqry="select * from packages order by id DESC limit 1";
    $idresult=$conn->query($idqry);
    $row=mysqli_fetch_assoc($idresult);
    $idno=$row['id'];   
// File upload configuration 
$targetDir = "../uploads/package/"; 
$allowTypes = array('jpg','png','jpeg','gif','webp'); 
 
$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
$fileNames = array_filter($_FILES['homeimage']['name']); 
if(!empty($fileNames)){ 
    foreach($_FILES['homeimage']['name'] as $key=>$val){ 
        // File upload path 
        $fileName = basename($_FILES['homeimage']['name'][$key]); 
        $targetFilePath = $targetDir . $fileName; 
         
        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to server 
            if(move_uploaded_file($_FILES["homeimage"]["tmp_name"][$key], $targetFilePath)){ 
                // Image db insert sql 
                $insertValuesSQL .= "('".$idno."','".$fileName."', NOW()),"; 
            }else{ 
                $errorUpload .= $_FILES['homeimage']['name'][$key].' | '; 
            } 
        }else{ 
            $errorUploadType .= $_FILES['homeimage']['name'][$key].' | '; 
        } 
    } 
     
    // Error message 
    $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
    $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
    $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
     
    if(!empty($insertValuesSQL)){ 
        $insertValuesSQL = trim($insertValuesSQL, ','); 
        // Insert image file name into database 
        $insert = $conn->query("INSERT INTO package_images (package_id, pack_image, image_createtime) VALUES $insertValuesSQL"); 
        if($insert){ 
            $statusMsg = "Files are uploaded successfully.".$errorMsg; 
        }else{ 
            $statusMsg = "Sorry, there was an error uploading your file."; 
        } 
    }else{ 
        $statusMsg = "Upload failed! ".$errorMsg; 
    } 
}else{ 
    $statusMsg = 'Please select a file to upload.'; 
}  
echo "<script>alert('Package Added')</script>";
?><script>
    setTimeout(function(){
        location.href='package.php';
    },300)
</script><?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Image</title>
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
        <li class="main-menu"><a href="blog.php"><i class="fa fa-newspaper" aria-hidden="true"></i> Blog</a></li>
        <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true" aria-hidden="true"></i> Profile</a></li>
        <li><form action="log.php"><button type="submit"name="logout"style="border:0;background-color:transparent"><i class="fa fa-power-off" aria-hidden="true"style="font-size:40px;color:red;"></i></button></form></li>
    </ul>
   </div>
   <div class="panel">
    <div class="add-img">
    <?php
    include('connect.php');
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    
        $idqry="select * from packages order by id DESC limit 1";
        $idresult=$conn->query($idqry);
        $row=mysqli_fetch_assoc($idresult);
        $idno=$row['id']; 
        $packname=$row['package_name'] ;
    ?>
    <h2><span>Package Name: </span><?php echo $packname;?></h2>
    <form action="packimage.php"method="POST"enctype="multipart/form-data" autocomplete="off">
  <div class="form-group">
    <label for="exampleFormControlFile1">Tour Package Images</label>
    <input type="file" class="form-control-file" id="packit" name="homeimage[]" multiple />
    <input type="submit" class="btn btn-primary"name="changeslide"id="changeimg"value="Add">
  </div>
</form>
</div>
<div id="pack-image">

</div>
</div>
</body>
</html>