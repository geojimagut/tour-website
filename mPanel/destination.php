<?php
ini_set("display_errors", 0);
session_start();
include('connect.php');
include('sec.php');
if(isset($_POST['btndestination'])){ 
    $title=$_POST['txttitle'];
    $profile=$_POST['txtprofile'];
    $attraction=$_POST['txtattraction'];
    // $activities=$_POST['txtactivity'];

    $condest="select * from destinations where destination_name='$title' ";
    $destresult=$conn->query($condest);
    $destrow=mysqli_fetch_assoc($destresult);
    if($destrow['destination_name']!=$title){




//inserting data into db

$insertdest="insert into destinations(destination_name,destination_profile, destination_attraction) values(?,?,? ) ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertdest)){
	echo "Failed";
}else{
	mysqli_stmt_bind_param($stmtinsert, "sss",$title,$profile, $attraction);
	mysqli_stmt_execute($stmtinsert);
 
}

        /*$insertdest="insert into destinations(destination_name,destination_profile, destination_attraction, destination_activities) values('$title', '$profile', '$attraction','$activities') ";
        $conn->query($insertdest);*/
        $idqry="select * from destinations order by destination_id DESC limit 1";
        $idresult=$conn->query($idqry);
        $row=mysqli_fetch_assoc($idresult);
        $idno=$row['destination_id'];

        // File upload configuration 
        $targetDir = "../uploads/"; 
        $allowTypes = array('jpg','png','jpeg','gif','webp'); 
         
        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
        $fileNames = array_filter($_FILES['files']['name']); 
        if(!empty($fileNames)){ 
            foreach($_FILES['files']['name'] as $key=>$val){ 
                // File upload path 
                $fileName = basename($_FILES['files']['name'][$key]); 
                $targetFilePath = $targetDir . $fileName; 
                 
                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to server 
                    if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                        // Image db insert sql 
                        $insertValuesSQL .= "('".$idno."','".$fileName."', NOW()),"; 
                    }else{ 
                        $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                    } 
                }else{ 
                    $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
                } 
            } 
             
            // Error message 
            $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
            $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
            $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
             
            if(!empty($insertValuesSQL)){ 
                $insertValuesSQL = trim($insertValuesSQL, ','); 
                // Insert image file name into database 
                $insert = $conn->query("INSERT INTO destination_images (desti_id, image_name, image_createtime) VALUES $insertValuesSQL"); 
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
    }else{
        echo "<script>alert('Destination Already Exists!');</script>";
    }
}else if(isset($_POST['btnupdatedestination'])){
    $title=$_POST['txttitle'];
    $profile=$_POST['txtprofile'];
    $attraction=$_POST['txtattraction'];
    // $activities=$_POST['txtactivity'];
    $destid=$_POST['destination_id'];



    //inserting data into db

$insertdest="update destinations set destination_name=? ,destination_profile=?, destination_attraction=? where destination_id=?  ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertdest)){
	echo "Failed";
}else{
	mysqli_stmt_bind_param($stmtinsert, "ssss",$title,$profile, $attraction, $destid);
	mysqli_stmt_execute($stmtinsert);
 
}
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destination</title>
    
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

  <!--end of bootstrap-->
   <!-- ckeditor -->
   <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<script src="ckeditor/ckeditor.js"></script>
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
   <div class="top-bar">
                <button class="btn btn-primary"id="btn-add-dest">ADD DESTINATION</button>
                <button class="btn btn-primary"id="btn-cancel-dest"style="margin-top:15px">CANCEL</button>
            <h5 id="mess"></h5>
            <!--showing js results-->
            </div>
            <div id="destresult">
                <!--showing js results-->

                <!--end of showing js results-->
            </div>
            <button
        type="button"
        class="btn btn-danger btn-floating btn-lg"
        id="btn-back-to-top"
        >
  <i class="	fa fa-caret-up"></i>
</button>

<!--destinations-->
<form id="frmsearchdest">
<select name="searchdest" id="searchdest"style="margin-left:3%; width:30%;">
    <option value=""selected="true" disabled>Select Destination</option>
<?php
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
            include('connect.php');
            $selectCat="select * from destinations";
            $result=$conn->query($selectCat);
   

            while($row=mysqli_fetch_assoc($result)){?>
    
                <option value="<?php echo $row['destination_name'];?>"><?php echo$row['destination_name'];?></option>
            <?php
            }
            ?>
</select>
</form>

<div class="dest-table"id="dest-table-id">
<?php
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
            include('connect.php');
            /*$selectCat="SELECT *
FROM destinations as std LEFT JOIN
 (SELECT * FROM destination_images group by destination_id order by destination_id desc) 
ON destinations.destination_id = destination_images.destination_id";*/
            $selectCat="select * from destination_images inner join destinations where destinations.destination_id=destination_images.desti_id group by desti_id ";
            $result=$conn->query($selectCat);
            
            while($row=mysqli_fetch_assoc($result)){
                $imageURL = '../uploads/'.$row["image_name"];
                ?>
            <div class="dest-blog">
                <table>
                        <thead>
                            
                        </thead>
                        
                        <tbody>
                            <tr>
                <td><h2><?php echo $row['destination_name'];?></h2></td>
                 <td><span><i class="fa fa-edit updt btn-update-dest" aria-hidden="true" style="font-size:30px;color:black;padding-left:10px;"></i></span><span><i class="fa fa-trash del btn-delete-dest" aria-hidden="true" style="font-size:30px;color:red"></i></span></td>
            
                </span>
                

                <!--carousel-->
                <div class="img-cls">
                    
                <td><?php echo "<img src='$imageURL'alt='No image found!'width='100%'height='auto'style='padding:10px 10px 10px 10px;'>";?></td>
                </div>
                                <td hidden><?php echo $row['desti_id'];?></td>
                                <td><span><button class="btn btn-primary button-more"style="margin-left:10px;margin-bottom:15px;margin-top:15px;">More Images</button></span></td>
                            
                
                <!--end of carousel-->
                <td><h2>Profile</h2></td>
                <td><p><?php echo $row['destination_profile'];?></p></td>
                <td><h2>Attractions</h2></td>
                <td><p><?php echo $row['destination_attraction'];?></p></td>
                </tr>
                        </tbody>
                    </table>

            </div>
            <hr>
            <?php
            //end of while loop
        }
        ?>
</div>
        <!--adding destination form-->
<div id="add-dest-id">
<form action="destination.php"method="POST" enctype="multipart/form-data" id="frmupdatedest" autocomplete="off">
    <!--hidden fields-->
        <input type="hidden"name="destination_id"id="destination_id">
    <!--end of hidden fields-->
  <div class="form-group">
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control"id="txttitle" name="txttitle"placeholder="Destination title"required>
  </div>
    <label for="exampleFormControlTextarea1">Destination Profile</label>
    <textarea class="form-control" name="txtprofile"id="txtprofile" rows="3"placeholder="A small description of the place"maxlength="150"required></textarea>

    
    <label for="exampleFormControlTextarea1">Destination Attractions</label>
    <textarea class="form-control" name="txtattraction"id="txtattraction" rows="3"placeholder="What's facinating about the place?"required></textarea>

    <!-- <label for="exampleFormControlTextarea1">Destination Activities</label>
    <textarea class="form-control" name="txtactivity"id="txtactivity" rows="3"placeholder="The fun activities of the destination"required></textarea> -->

  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1"id="hidden-label">Images</label>
    <!--input type="file" class="form-control"name="files[]" multiple required /-->

    <input type="file" class="form-control"id="files" name="files[]" multiple >
  </div>
  <input type="submit"name="btndestination" class="form-control btn btn-success" id="add-dest-btn" value="Add Destination" style="margin-bottom:30px;">
  
  <input type="submit"name="btnupdatedestination" class="form-control btn btn-success" id="update-dest-btn" value="Update" style="margin-bottom:30px;">

</form>
<div id="show-image">
    
</div>
</div>
</div>

   </div>
</body>
</html>

<script>
    // editor
    CKEDITOR.replace('txtprofile')
    CKEDITOR.replace('txtattraction')
    // CKEDITOR.replace('txtactivity')
//deleting destinations
$('.btn-delete-dest').on('click',function(){
    var row=$(this).closest('tr');
    var leid=row.find('td:eq(3)').text().trim();
    var state=confirm('Delete this destination?');
    if(state==true){
        $.ajax({
            url:'deldestination.php',
            type:'POST',
            data:{leid:leid},
            success:function(data){
                //$('#destresult').html(data)
            }

        })
        location.href="destination.php"
        
    }else{
        //do nothing
    }
})
    /*BACK TO TOP*/
mybutton=document.getElementById('btn-back-to-top');
window.onscroll = function () {
    scrollFunction();
  };
  
  function scrollFunction() {
    if (
      document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20
    ) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }
  // When the user clicks on the button, scroll to the top of the document
  mybutton.addEventListener("click", backToTop);
  
  function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
      //displaying the images before upload
      document.querySelector('#files').addEventListener('change', (e)=>{
        if(window.File && window.FileReader && window.FileList && window.Blob){
            const files=e.target.files;
            const output=document.querySelector('#show-image');
            for(let i=0; i<files.length; i++){
                if(!files[i].type.match("image"))continue;
                const picReader=new FileReader();
                picReader.addEventListener("load", function(event){
                    const picFile=event.target;
                    const div=document.createElement("div") ;
                    div.innerHTML=`<img class="thumbnail" src="${picFile.result}" title="${picFile.name}"/>`;
                    output.appendChild(div);
                })
                picReader.readAsDataURL(files[i]);
            }
        }else{
            alert('Your browser does not support the File API');
        }
    })
</script>