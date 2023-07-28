<?php
ini_set("display_errors", 0);
session_start();
include('sec.php');
include('connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
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
    <!--my css-->
    <link rel="stylesheet"href="namna/namna.css?v=<?php echo time();?>">
<!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--my css-->
    <link rel="stylesheet"href="namna/namna.css?v=<?php echo time();?>">
</head>
<body>
    <div id="response">
        <!--from db-->
    </div>
<button
        type="button"
        class="btn btn-danger btn-floating btn-lg"
        id="btn-back-to-top"
        >
  <i class="	fa fa-caret-up"></i>
</button>
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
   <style>
   .whole_blog{
    width:96%;
    margin-left:2%;
   }
   .blog_panel{
    margin-top:20px;
   }
   </style>
   <div class="panel"style="margin-top:20px">
   <div class="whole_blog">
    <a href="viewblog.php"><button class="btn btn-primary">ADD BLOG</button></a>
    <div class="blog_panel">
        <?php
             $selectCat="select * from blog_pics inner join blog where blog.blog_id=blog_pics.destination_id group by destination_id ";
             $result=$conn->query($selectCat);
             
             while($row=mysqli_fetch_assoc($result)){
                 $imageURL = '../uploads/blog/'.$row["pic_name"];
                 ?>
             <div class="dest-blog">
                  <span><i class="fa fa-trash del btn-delete-blog" aria-hidden="true" style="font-size:30px;color:red"></i></span>
             
                 </span>
                 
 
                 <!--carousel-->
                 <div class="img-cls">
                     
                 <?php echo "<img src='$imageURL'alt='No image found!'width='100%'height='auto'style='padding:10px 10px 10px 10px;'>";?>
                 </div>
                                 <a hidden class="blog_id"><?php echo $row['blog_id'];?></a>
                                 <span><a href="viewblogimage.php?file=<?php echo $row['blog_id']; ?>"><button class="btn btn-primary button-more"style="margin-left:10px;margin-bottom:15px;margin-top:15px;">More Images</button></a></span>
                             
                 
                 <!--end of carousel-->
                    <?php echo $row['content'];?>
             </div>
             <hr>
             <?php
             //end of while loop
         }
         ?>
    </div>
    </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function(){
        $('.btn-delete-blog').on('click', function(){
            var id=$(this).closest('.dest-blog').find('.blog_id')[0].innerText
            var state=confirm('Delete this blog?')
            if(state==true){
                $.ajax({
                url:'delblog.php',
                method:'POST',
                data:{id:id},
                success:function(data){
                    $('#response').html(data)
                }
            })
            }else{
                //do nothing
            }
            
        })
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