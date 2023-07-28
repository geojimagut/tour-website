<?php
ini_set("display_errors", 0);
session_start();
?>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

<!--bootsrap-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
     <!--my js-->
 <script src="js/dtscript.js?v=<?php echo time();?>"></script>
    <script src="js/dbscript.js?v=<?php echo time();?>"></script>
    <!--end of links-->
    
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('connect.php');
include('sec.php');
if(isset($_POST['addimages'])){
    

// File upload configuration 
$targetDir = "../uploads/"; 
$allowTypes = array('jpg','png','jpeg','gif','webp'); 
 
$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
$fileNames = array_filter($_FILES['destimages']['name']); 
$fileNames;
if(!empty($fileNames)){ 
    foreach($_FILES['destimages']['name'] as $key=>$val){ 
        // File upload path 
        $fileName = basename($_FILES['destimages']['name'][$key]); 
        $targetFilePath = $targetDir . $fileName; 
         
        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to server 
            if(move_uploaded_file($_FILES["destimages"]["tmp_name"][$key], $targetFilePath)){ 
                // Image db insert sql 
                $insertValuesSQL .= "('".$_SESSION['imageid']."','".$fileName."', NOW()),"; 
            }else{ 
                $errorUpload .= $_FILES['destimages']['name'][$key].' | '; 
            } 
        }else{ 
            $errorUploadType .= $_FILES['destimages']['name'][$key].' | '; 
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
?><script>alert('Image(s) Added')</script><?php
header('location:destination.php');
}



else{
$id=$_POST['data'];
$_SESSION['imageid']=$id;
?>
<button class="btn btn-primary btn-add-img"style="margin-bottom:15px">ADD IMAGES</button>
<div class="dest-image">
    
    <div id="dest-img">

    
<?php

// Get images from the database
$query = $conn->query("SELECT * FROM destination_images where desti_id='$id' ");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = '../uploads/'.$row["image_name"];
?>
    <div class="image-card">
        <table>
            <thead>

            </thead>
            <tbody>
        <tr>
        <td class="image-id"hidden><?php echo $row['img_id'];?></td>
    <td><img src="<?php echo $imageURL; ?>" alt="" /></td>
    <div class="del-image">
    <td><span><i class="fa fa-trash updt btn-del-dest-img" aria-hidden="true" style="font-size:30px;color:red"></i></span></td>
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
<div id="add-img-div">
<form action="view.php"method="POST"enctype="multipart/form-data" autocomplete="off">
  <div class="form-group">
    <label for="exampleFormControlFile1">Add Images</label>
    <input type="file" class="form-control-file" id="destimages" name="destimages[]" multiple />
    <input type="submit" class="btn btn-primary"name="addimages"id="addimages"value="Add">
  </div>
</form>
<div id="shown-image">

</div>
</div>
    </div>

<?php
}
?>
<script>
    $(document).ready(function(){

//adding images to destinations
$('.btn-add-img').on('click',function () {
    var hidden=document.getElementById('dest-img')
    var shown=document.getElementById('add-img-div')
    if(hidden.style.display='block'){
        hidden.style.display='none';
        shown.style.display='block';
    }
})
    })


//displaying slide images before download
document.querySelector('#destimages').addEventListener('change', (e)=>{
    if(window.File && window.FileReader && window.FileList && window.Blob){
        const files=e.target.files;
        const output=document.querySelector('#shown-image');
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