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
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('connect.php');
$id=$_POST['data'];
$_SESSION['imageid']=$id;
    // Get images from the database
$query = $conn->query("SELECT * FROM package_images where package_id='$id' ");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = '../uploads/package/'.$row["pack_image"];
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
    <!--td><span><i class="fa fa-trash updt btn-del-dest-img" aria-hidden="true" style="font-size:30px;color:red"></i></span></td-->
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