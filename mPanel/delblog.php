<?php
ini_set("display_errors", 0);
include('connect.php');

$leid=$_POST['id'];
$delqry="delete from blog where blog_id='$leid' ";
if($conn->query($delqry)){
    $query ="SELECT * FROM blog_pics where destination_id='$leid' ";
    $gotton=$conn->query($query);
    while($row = mysqli_fetch_assoc($gotton)){
            $imageURL = '../uploads/blog/'.$row["pic_name"];
      //check if image exists
        
      if(file_exists($imageURL)){
    
        //delete the image
        unlink($imageURL);
      }
        //after deleting image you can delete the record
        $result = "delete from blog_pics where destination_id='$leid' ";
        mysqli_query($conn,$result);
        ?><script>alert('Deleted')
        setTimeout(function(){
            location.href='blog.php'
        }, 1500)
        
    </script><?php
      }
}else{
    ?><script>alert('Failed')</script><?php
}

?>