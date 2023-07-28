<?php
// ini_set("display_errors", 0);
session_start();
?>

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous">
  </script>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('connect.php');
    //updating packages
if(isset($_POST['update-pack-btn'])){
  
    $pname=$_POST['txtpname'];
    $price='0';
    $destination=$_POST['seldestination'];
    $prevname=$_POST['prevname'];
    $prevprice=$_POST['prevprice'];
    $duration=$_POST['txtduration'];
    $activity=$_POST['txtactivity'];
    ?>
        <script>
        alert('<?php echo $activity;?>')
        </script>
    <?php
    if($destination==""){
        //$insqry="update packages set package_name='$pname', package_price='$price', package_duration='$duration',activities='$activity' where package_name='$prevname' and package_price='$prevprice' ";

   //inserting data into db

   $insqry="update packages set package_name=?, package_price=?, package_duration=?,activities=? where package_name=? and id=? ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insqry)){
	echo "Failed";
}else{
	mysqli_stmt_bind_param($stmtinsert, "ssssss", $pname, $price, $duration, $activity, $prevname, $prevprice);
	mysqli_stmt_execute($stmtinsert);
    
}

   
   
   
    }else{
        /*$insqry="update packages set package_name='$pname', package_price='$price', package_duration='$duration',activities='$activity' where package_name='$prevname' and package_price='$prevprice' ";
        $insqry="update packages set package_name='$pname', package_price='$price',destination='$destination', package_duration='$duration',activities='$activity' where package_name='$prevname' and package_price='$prevprice' ";
          //inserting data into db*/

   $insqry="update packages set package_name=?, package_price=?,destination=?, package_duration=?,activities=? where package_name=? id=? ";
   $stmtinsert=mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmtinsert, $insqry)){
       echo "Failed";
   }else{
       mysqli_stmt_bind_param($stmtinsert, "sssssss", $pname, $price,$destination, $duration, $activity, $prevname, $prevprice);
       mysqli_stmt_execute($stmtinsert);
       
   }
   
    }
    //$conn->query($insqry);
    
    
    }else if(isset($_POST['selpackage'])){
        $packagename=$_POST['selpackage'];
        ?>
        <!--my js-->
    <script src="js/dtscript.js?v=<?php echo time();?>"></script>
    <script src="js/dbscript.js?v=<?php echo time();?>"></script>
    <form id="frmpackage">
<select name="selpackage" id="selpackage"class="form-control"required>
    <option value=""selected="true" disabled>Search Package by Destination</option>
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
<div id="package-holder">
            <?php
          include('connect.php');
          error_reporting(E_ERROR | E_WARNING | E_PARSE);
          $selectCat="select distinct * from packages where destination='$packagename' ";
            $result=$conn->query($selectCat);
            while($row=mysqli_fetch_assoc($result)){
                
              ?>
              <div class="card"style="width:18rem;">
  <div class="card-body">
    
  <table>
    <tr>
    <td><h5 class="card-title"><?php echo $row['package_name'];?></h5></td>
    <td><span>Duration </span></td>
    <td><p class="card-text"><?php echo $row['package_duration'];?></p></td>
    <td><span></span></td>
    <td><p class="card-text"></p></td>
    <td><span>Destination </span></td>
    <td><p class="card-text"><?php echo $row['destination'];?></p></td>
    <td hidden><span>Activities</span></td>
    <td hidden><p class="card-text"><?php echo $row['activities'];?></p></td>
    <td hidden><?php echo $row['id'];?></td>
    <td><span><i class="fa fa-edit updt btn-update-package" aria-hidden="true" style="font-size:30px;color:black"></i></span><span><i class="fa fa-trash del btn-delete-package" aria-hidden="true" style="font-size:30px;color:red"></i></span><span><i class="fa fa-eye del btn-view-package" aria-hidden="true" style="font-size:30px;color:black"></i></span><span><button class="btn btn-primary btn-pack-img"style="margin-top:15px">View Images</button></span></td>
    </tr>
    
</table>
  </div>
</div>
<?php

    }
    ?>
</div>
<?php
}else if(isset($_POST['btnpackage'])){
  $pname=nl2br($_POST['txtpname']);
  $price=nl2br($_POST['txtpprice']);
  $destination=nl2br($_POST['seldestination']);
  $duration=nl2br($_POST['txtduration']);
  $activity=$_POST['txtactivity'];

  $conqry="select * from packages where package_name='$pname' ";
  $conresult=$conn->query($conqry);
  $rows=mysqli_fetch_assoc($conresult);
  if($rows['package_name']!=$pname && $rows['package_price']!=$price){
      $getid="select * from destinations where destination_name='$destination' ";
  $res=$conn->query($getid);
  $resrow=mysqli_fetch_assoc($res);
  $destid=$resrow['destination_id'];

      $insqry="insert into packages(dest_id, package_name, package_duration, package_price, destination, activities) values('$destid','$pname', '$duration', '$price', '$destination', '$activity') ";
      $conn->query($insqry);

       // File upload configuration 
       $targetDir = "../uploads/package/"; 
       $allowTypes = array('jpg','png','jpeg','gif','webp'); 
        
       $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
       $fileNames = array_filter($_FILES['packageimage']['name']); 
       if(!empty($fileNames)){ 
           foreach($_FILES['packageimage']['name'] as $key=>$val){ 
               // File upload path 
               $fileName = basename($_FILES['packageimage']['name'][$key]); 
               $targetFilePath = $targetDir . $fileName; 
                
               // Check whether file type is valid 
               $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
               if(in_array($fileType, $allowTypes)){ 
                   // Upload file to server 
                   if(move_uploaded_file($_FILES["packageimage"]["tmp_name"][$key], $targetFilePath)){ 
                       // Image db insert sql 
                       $insertValuesSQL .= "('".$idno."','".$fileName."', NOW()),"; 
                   }else{ 
                       $errorUpload .= $_FILES['packageimage']['name'][$key].' | '; 
                   } 
               }else{ 
                   $errorUploadType .= $_FILES['packageimage']['name'][$key].' | '; 
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

      echo "<script>alert('Package Added');</script> ";
  }else{
      echo "<script>alert('Package Already Exists!');</script> ";
  }
  //finding packages for a destination
}else {
    ?><script>
    </script><?php
    $selected=$_POST['sel_product_update'];
    $qry="select * from packages where dest_id='$selected' ";
    $result=mysqli_query($conn, $qry);
    if($result->num_rows>0){
        while($rows=mysqli_fetch_assoc($result)){
            echo '<option value='.$rows['id'].'>'.$rows['package_name'].'</option>';
        }
    }else{
        echo '<option selected="true"disabled>No Packages Found!</option>';
    }
}
?>
<script>
    //deleting package
$('.btn-delete-package').on('click',function(){
    var row=$(this).closest('tr');
    var pname=row.find('td:eq(0)').text().trim();
    var pprice=row.find('td:eq(4)').text().trim();
    var packageid=row.find('td:eq(9)').text().trim()

    var state=confirm('Delete this package?');
    if(state==true){
        $.ajax({
            url:'delpack.php',
            type:'POST',
            data:{
                pname:pname,
                pprice:pprice,
                packageid:packageid
            },
            success:function(data){
                location.href='package.php';
                //$('#mess').html(data)
            }

        })
        
    }else{
        //do nothing
    }
})
</script>