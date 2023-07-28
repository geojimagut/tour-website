<?php
ini_set("display_errors", 0);
include('connect.php');

$pname=$_POST['pname'];
$price=$_POST['pprice'];
$packageid=$_POST['packageid'];

$delqry="delete from packages where id='$packageid' ";
if($conn->query($delqry)){

    $query ="SELECT * FROM package_images where package_id='$packageid' ";
    $gotton=$conn->query($query);
    while($row = mysqli_fetch_assoc($gotton)){
            $imageURL = '../uploads/package/'.$row["pack_image"];
      //check if image exists
        
      if(file_exists($imageURL)){
    
        //delete the image
        unlink($imageURL);
      }
        //after deleting image you can delete the record
        $result = "delete from package_images where package_id='$packageid' ";
        mysqli_query($conn,$result);
        //deleting activities
        $delquery="delete from activity where pack_id='$packageid' ";
        mysqli_query($conn, $delquery);
    ?><script>alert('Deleted')</script><?php
      }
}else{
    ?><script>alert('Failed')</script><?php
}

?>
