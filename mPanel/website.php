<?php
ini_set("display_errors", 0);
session_start();
include('connect.php');
include('sec.php');

if(isset($_POST['changeslide'])){
// File upload configuration 
$targetDir = "../uploads/homeslider/"; 
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
                $insertValuesSQL .= "('".$fileName."', NOW()),"; 
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
        $insert = $conn->query("INSERT INTO home_slide (image_name, image_time) VALUES $insertValuesSQL"); 
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
}else if(isset($_POST['addinclusive'])){
    $insclusivename=$_POST['txtinclusive'];
    
$confirmqry="select * from inclusives where inclusive_name=? ";
//create a statement
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $confirmqry )){
echo "Failed";
}else{
//bind parameters to the place holders
mysqli_stmt_bind_param($stmt, 's', $insclusivename );
//rund parameters inside db
mysqli_stmt_execute($stmt);
$conresult=mysqli_stmt_get_result($stmt);
$row=mysqli_fetch_assoc($conresult);
if($row['inclusive_name']!=$insclusivename){


//inserting data into db
$insertqry="insert into inclusives(inclusive_name) values(?) ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertqry)){
echo "Failed";
}else{
mysqli_stmt_bind_param($stmtinsert, "s", $insclusivename );
mysqli_stmt_execute($stmtinsert);
?>
<script>alert('Added successfully') </script>
<?php
}

}else{
?>
<script>alert('Already Exists')</script>
<?php
} 
} 
}else if(isset($_POST['updateinclusive'])){
    $insclusivename=$_POST['txtinclusive'];
    $inclusiveid=$_POST['txtid'];

//inserting data into db
$insertqry="update inclusives set inclusive_name=? where inclusive_id=? ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertqry)){
echo "Failed";
}else{
mysqli_stmt_bind_param($stmtinsert, "si", $insclusivename, $inclusiveid );
mysqli_stmt_execute($stmtinsert);
?>
<script>alert('Updated successfully') </script>
<?php
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
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
   <div class="panel">
   <div class="top-bar top-flex">
                <button class="btn btn-primary"id="btn-add-slide">HOME SLIDE IMAGE</button>
                <a href="reviews.php"><button class="btn btn-primary"id=""style="margin-right:15px">REVIEWS</button></a>
                <!--button class="btn btn-primary"id="btn-add-inclusive">TOUR INCLUSIVES</button-->
                <button class="btn btn-primary"id="btn-cancel-add">CANCEL</button>
            <h5 id="mess"></h5>
            </div>
    <div class="bottom-part">
        <div id="shown-image">
<div class="home-image">
<?php

// Get images from the database
$query = $conn->query("SELECT * FROM home_slide ");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = '../uploads/homeslider/'.$row["image_name"];
?>
    <div class="image-card">
        <table>
            <thead>

            </thead>
            <tbody>
        <tr>
        <td class="image-id"hidden><?php echo $row['image_id'];?></td>
    <td><img src="<?php echo $imageURL; ?>" alt="" /></td>
    <div class="del-image">
    <td><span><i class="fa fa-trash updt btn-del-slide-img" aria-hidden="true" style="font-size:30px;color:black"></i></span></td>
    </div>
    </tr>
    </tbody>
</table>
    </div>
    
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?> 
    </div>

        </div>
        <div id="new-slide">
    <form action="website.php"method="POST"enctype="multipart/form-data" id=frmupdatedest autocomplete="off">
  <div class="form-group">
    <label for="exampleFormControlFile1">New Home Slide Images</label>
    <input type="file" class="form-control-file" id="homeslide" name="homeimage[]" multiple />
    <input type="submit" class="btn btn-primary"name="changeslide"id="changeslide"value="Add">
  </div>
</form>
<div id="preview">

</div>
</div>
<div id="inclusive">

<button class="btn btn-primary"id="btn-cancel-inclusive">CANCEL</button>
    <div id="show-inclusive">
    <button class="btn btn-primary"id="btnaddincluded">ADD INCLUSIVES</button>
    <table id="tbl-application" class="table table-striped" style="width:100%">
        <thead>
              <tr>
                <th hidden>#</th>
                <th>inclusive</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
            include('connect.php');
            $selectCat="select * from inclusives";
            $result=$conn->query($selectCat);
            while($row=mysqli_fetch_assoc($result)){
              
              ?>
            <tr>
            <td hidden><?php echo $row['inclusive_id'];?></td>
              <td><?php echo $row['inclusive_name'];?></td>
              <td><span><i class="fa fa-edit pointer btn-update-inclusive" aria-hidden="true" style="font-size:30px;color:black"></i></span><span><i class="fa fa-trash pointer btn-delete-inclusive" aria-hidden="true" style="font-size:30px;color:red"></i></span></td>

            </tr>

            <?php
          }
          ?>
          </tbody>
        </table>
    </div>
    <div id="add-inclusive-panel">
    <button class="btn btn-primary"id="btncancelincluded">CANCEL</button>
    <form id="frmaddinclusive"method="POST"action="website.php">
        <input type="hidden"name="txtid"id="txtid">
    <div class="form-group">
    <label for="exampleInputPassword1"class="card-title">Included/Excluded Item</label>
    <input type="text" class="form-control" style="width:35%"name="txtinclusive" id="txtinclusive" placeholder="Breakfast/Lunch/Drive"required>
  </div>
  <input type="submit" class="btn btn-info"style="width:35%"id="addinclusive"name="addinclusive"value="Add">
  <input type="submit" class="btn btn-info"style="width:35%"id="updateinclusive"name="updateinclusive"value="Update">
        </form>
    </div>
</div>
    </div>
   </div>
</body>
</html>
<script>
    //displaying slide images before download
  document.querySelector('#homeslide').addEventListener('change', (e)=>{
    if(window.File && window.FileReader && window.FileList && window.Blob){
        const files=e.target.files;
        const output=document.querySelector('#preview');
        for(let i=0; i<files.length; i++){
            if(!files[i].type.match("image"))continue;
            const picReader=new FileReader();
            picReader.addEventListener("load", function(event){
                const picFile=event.target;
                const div=document.createElement("div") ;
                div.innerHTML=`<img class="the-image" src="${picFile.result}" title="${picFile.name}"/>`;
                output.appendChild(div);
            })
            picReader.readAsDataURL(files[i]);
        }
    }else{
        alert('Your browser does not support the File API');
    }
})
</script>