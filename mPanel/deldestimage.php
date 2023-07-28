<?php
ini_set("display_errors", 0);
include('connect.php');

$id=$_POST['id'];

$query ="SELECT * FROM destination_images where img_id='$id' ";
$gotton=$conn->query($query);
$row = mysqli_fetch_assoc($gotton);
        $imageURL = '../uploads/'.$row["image_name"];
  //check if image exists
  
  if(file_exists($imageURL)){

    //delete the image
    unlink($imageURL);

    //after deleting image you can delete the record
    $result = "delete from destination_images where img_id='$id' ";
    if(mysqli_query($conn,$result)){
        echo "<script>alert('Image Deleted');</script>";
    }else{
        echo "<script>alert('Image Not Found')</script> ";
    }
}
?>