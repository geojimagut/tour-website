<?php
ini_set("display_errors", 0);
session_start();
?>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<!--my js-->
    <script src="js/dtscript.js?v=<?php echo time();?>"></script>
    <script src="js/dbscript.js?v=<?php echo time();?>"></script>

    
<?php
include('connect.php');
error_reporting(E_ERROR |E_WARNING |E_PARSE);

?>
<?php
?>
 <button
        type="button"
        class="btn btn-danger btn-floating btn-lg"
        id="btn-back-to-top"
        >
  <i class="	fa fa-caret-up"></i>
</button>


<?php
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
            include('connect.php');
            /*$selectCat="SELECT *
FROM destinations as std LEFT JOIN
 (SELECT * FROM destination_images group by destination_id order by destination_id desc) 
ON destinations.destination_id = destination_images.destination_id";*/

            $destination=$_POST['searchdest'];
            $_SESSION["destination"]=$destination;
            //select * from destinations where destination_name='$destination' limit 1
            $selectCat="select * from destination_images inner join destinations where destination_name='$destination' and destinations.destination_id=destination_images.desti_id group by desti_id ";
            $result=$conn->query($selectCat);
            
            while($row=mysqli_fetch_assoc($result)){
                $imageURL = '../uploads/'.$row["image_name"];
                ?>
            <div class="dest-blog">
            <table>
                        <thead>
                            
                        </thead>
                        
                        <tbody>
                            <tr>
                <td><h2><?php echo $row['destination_name'];?></h2></td>
                 <td><span><i class="fa fa-edit updt btn-update-dest" aria-hidden="true" style="font-size:30px;color:black"></i></span><span><i class="fa fa-trash del btn-delete-dest" aria-hidden="true" style="font-size:30px;color:red"></i></span></td>
            
                </span>
                

                <!--carousel-->
                <div class="img-cls">
                    
                <td><?php echo "<img src='$imageURL'alt='No image found!'width='100%'height='400px'style='padding:10px 10px 10px 10px;'>";?></td>
                </div>
                                <td hidden><?php echo $row['desti_id'];?></td>
                                <td><span><button class="btn btn-primary button-more"style="margin-left:10px;margin-bottom:15px;margin-top:15px;">More Images</button></span></td>
                            
                
                <!--end of carousel-->
                <td><h2>Profile</h2></td>
                <td><p><?php echo nl2br($row['destination_profile']);?></p></td>
                <td><h2>Attractions</h2></td>
                <td><p><?php echo nl2br($row['destination_attraction']);?></p></td>
                <td><h2>Activities</h2></td>
                <td><p><?php echo nl2br($row['destination_activities']);?></p></td>
                </tr>
                        </tbody>
                    </table>

            </div>
            <hr>
            <?php
            //end of while loop
        }
        ?>

<script>
    //deleting destinations
$('.btn-delete-dest').on('click',function(){
    var row=$(this).closest('tr');
    var leid=row.find('td:eq(3)').text().trim();
    var state=confirm('Delete this destination?');
    if(state==true){
        $.ajax({
            url:'deldestination.php',
            type:'POST',
            data:{leid:leid},
            success:function(data){
                $('#destresult').html(data)
            }

        })
        location.href="destination.php"
        
    }else{
        //do nothing
    }
})
    $('.btn-update-dest').on('click',function(){
    var packtable=document.getElementById('dest-table-id');
    var package=document.getElementById('add-dest-id');
    var btn=document.getElementById('add-dest-btn');
    var btnupdate=document.getElementById('update-dest-btn')
    var files=document.getElementById('files')
    var label=document.getElementById('hidden-label')
    var btncancel=document.getElementById('btn-cancel-dest');
    //displaying the data to be updated
    var row=$(this).closest('tr')
    var name=row.find('td:eq(0)').text().trim()
    var id=row.find('td:eq(3)').text().trim()
    var profile=row.find('td:eq(6)').text().trim()
    var attraction=row.find('td:eq(8)').text().trim()
    var activity=row.find('td:eq(10)').text().trim()
    
    $('#destination_id').val(id)
    $('#txttitle').val(name)
    $('#txtprofile').val(profile)
    $('#txtattraction').val(attraction)
    $('#txtactivity').val(activity)
    
    if(packtable.style.display='block'){
        packtable.style.display='none';
        package.style.display='block';
        btn.style.display='none';
        btncancel.style.display='block';
        files.style.display='none'
        label.style.display='none'
        btnupdate.style.display='block'
    }
})
</script>