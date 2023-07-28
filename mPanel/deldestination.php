<?php
ini_set("display_errors", 0);
include('connect.php');

$leid=$_POST['leid'];
$delqry="delete from destinations where destination_id='$leid' ";
if($conn->query($delqry)){
    $query ="SELECT * FROM destination_images where desti_id='$leid' ";
    $gotton=$conn->query($query);
    while($row = mysqli_fetch_assoc($gotton)){
            $imageURL = '../uploads/'.$row["image_name"];
      //check if image exists
        
      if(file_exists($imageURL)){
    
        //delete the image
        unlink($imageURL);
      }
        //after deleting image you can delete the record
        $result = "delete from destination_images where desti_id='$leid' ";
        mysqli_query($conn,$result);
    
      }
}else{
    ?><script>alert('Failed')</script><?php
}

?>