<?php
ini_set("display_errors", 0);
include('connect.php');

$id=$_POST['rowone'];

$query ="SELECT * FROM home_slide where image_id='$id' ";
$gotton=$conn->query($query);
$row = mysqli_fetch_assoc($gotton);
        $imageURL = '../uploads/homeslider/'.$row["image_name"];
  //check if image exists
  
  if(file_exists($imageURL)){

    //delete the image
    unlink($imageURL);

    //after deleting image you can delete the record
    $result = "delete from home_slide where image_id='$id' ";
    if(mysqli_query($conn,$result)){
        echo "<script>alert('Image Deleted');</script>";
    }else{
        echo "Image Not Found";
    }
}
?>