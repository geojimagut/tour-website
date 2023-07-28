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
    ?>
    <script>
        alert('Update successful!')
        location.href='package.php'
    </script>
    <?php
    
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
       ?>
       <script>
        alert('Update successful!')
        location.href='package.php'
    </script>
    <?php 
   }
   
    }
    //$conn->query($insqry);

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