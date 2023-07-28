<?php
ini_set("display_errors", 0);
session_start();
include('connect.php');
include('sec.php');
if(isset($_POST['btnpackage'])){
    $pname=$_POST['txtpname'];
    $price='0';
    $destination=$_POST['seldestination'];
    $duration=$_POST['txtduration'];
    $type=$_POST['seltype'];
    $activity=$_POST['txtactivity'];

      
$confirmqry="select * from packages where package_name=? ";
//create a statement
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $confirmqry)){
echo "Failed";
}else{
//bind parameters to the place holders
mysqli_stmt_bind_param($stmt, 's', $pname );
//rund parameters inside db
mysqli_stmt_execute($stmt);
$conresult=mysqli_stmt_get_result($stmt);
$rows=mysqli_fetch_assoc($conresult);
if($rows['package_name']!=$pname && $rows['package_price']!=$price){
  $getid="select * from destinations where destination_name='$destination' ";
  $res=$conn->query($getid);
  $resrow=mysqli_fetch_assoc($res);
  $destid=$resrow['destination_id'];

//inserting data into db
$insertqry="insert into packages(dest_id, type_id, package_name, package_duration, package_price, destination, activities) values(?,?,?,?,?,?,?) ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertqry)){
echo "Failed";
}else{
mysqli_stmt_bind_param($stmtinsert, "sssssss", $destid,$type,$pname, $duration, $price, $destination, $activity );
mysqli_stmt_execute($stmtinsert);
?>
<script>
    location.href="packimage.php"
  
</script>
<?php
// header("Location:packimage.php");
}

}else{
?>
<script>alert('Package Already Exists!')</script>
<?php
}  
}
}
?>
<!--html-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>
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
   <button
        type="button"
        class="btn btn-danger btn-floating btn-lg"
        id="btn-back-to-top-package"
        >
  <i class="	fa fa-caret-up"></i>
</button>
   <div class="panel">
            
            <div class="top-bar">
                <button class="btn btn-primary"id="btn-add-package">ADD PACKAGE</button>
                <button class="btn btn-primary"id="btn-cancel-package">CANCEL</button>
                
            <h5 id="mess"></h5>
            </div>
        <div class="package-table"id="pack-table-id">
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
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
            include('connect.php');
            $selectCat="select * from packages";
            $result=$conn->query($selectCat);
            while($row=mysqli_fetch_assoc($result)){?>
        <div class="card"style="width: 18rem;margin:10px;">
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
    <td hidden><span>Overview</span></td>
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
        </div>
<!--adding package form-->
<div id="add-package-id">
<form action="package.php"method="POST"id=frmupdatepack autocomplete="off">
    <!--hidden fields-->
        <input type="hidden"name="prevname"id="prevname">
        <input type="hidden"name="prevprice"id="prevprice">
    <!--end of hidden fields-->
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Package Title</label>
    <textarea class="form-control" name="txtpname"id="txtpname" rows="3"placeholder="3 days Mombasa"maxlength=""required></textarea>

  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Duration (Days)</label>
    <input type="number" class="form-control"id="txtduration" name="txtduration"placeholder="No. of Days"style="width:100%"required>
  </div>
  <!-- <div class="form-group">
    <label for="exampleFormControlInput1">Pricing</label>
    <input type="number" class="form-control"id="txtpprice" name="txtpprice"placeholder="From 10,000"style="width:100%"required>
  </div> -->
  <div class="form-group"id="dduration">
  <label for="">Destination</label>
  <select name="seldestination" id=""class="form-control"required>
    <option value=""selected="true" disabled>Select Destination</option>
<?php
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
            include('connect.php');
            $selectCat="select * from destinations";
            $result=$conn->query($selectCat);
   

            while($row=mysqli_fetch_assoc($result)){?>
    
                <option value="<?php echo $row['destination_name'];?>"><?php echo $row['destination_name'];?></option>
            <?php
            }
            ?>
</select>
        </div>
        <div class="form-group"id="ttype">
        <label for="">Tour Type</label>
        <select name="seltype" id=""class="form-control"required>
    <option value=""selected="true" disabled>Select Tour Type</option>
<?php
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
            include('connect.php');
            $selectCat="select * from type";
            $result=$conn->query($selectCat);
   

            while($row=mysqli_fetch_assoc($result)){?>
    
                <option value="<?php echo $row['type_id'];?>"><?php echo $row['type'];?></option>
            <?php
            }
            ?>
</select>
        </div>
        <div class="form-group">
    <label for="exampleFormControlTextarea1">Tour Overview</label>
    <textarea class="form-control" name="txtactivity"id="txtactivity" rows="3"placeholder="Tour Activities"style="height:300px;"></textarea>

    
  </div>
 


  <input type="submit"name="btnpackage" class="form-control btn btn-success" id="add-pack-btn" value="Add package">
  
  <input type="button"name="btnupdatepackage" class="form-control btn btn-success" id="update-pack-btn" value="Update">

</form>

</div>

   </div>
</body>
</html>
<script>
  CKEDITOR.replace('txtactivity')
  //updating packages
$('#update-pack-btn').on('click', function(){
    var name=$('#txtpname').val()
    var price=$('#txtpprice').val();
    var activity = CKEDITOR.instances['txtactivity'].getData();

    if(name==''){
        alert('All fields required!')
    }else if(price==''){
        alert('All fields required!');
    }else{
        var data=$('#frmupdatepack').serialize()+ '&txtactivity='+activity+'&update-pack-btn=update-pack-btn';
        $.ajax({
            url:'updatepackage.php',
            type:'POST',
            data:data,
            success:function(data){
        // location.href='package.php';
                $('#mess').html(data)
            }
        })
        //alert('Updated successfully')
    }
})
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
    /*BACK TO TOP*/
mybutton=document.getElementById('btn-back-to-top-package');
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
</script>