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
    <!--end of links-->




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
            $id=$_POST['packageid'];

            $selectCat="select * from packages where id='$id' ";
            $result=$conn->query($selectCat);
            while($row=mysqli_fetch_assoc($result)){?>
        <div class="card"style="width: 100%;margin:20px;">
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
    <td><span>Overview</span></td>
    <td><p class="card-text"><?php echo $row['activities'];?></p></td>
    <td hidden><?php echo $row['id'];?></td>
    <td style="background-color:rgb(150,150,150);padding:10px;border-radius:5px"><span><i class="fa fa-edit updt btn-update-package" aria-hidden="true" style="font-size:30px;color:black"></i></span><span><i class="fa fa-trash del btn-delete-package" aria-hidden="true" style="font-size:30px;color:red;"></i></span><span><i class="fa fa-eye del btn-view-package" aria-hidden="true" style="font-size:30px;color:black"></i></span><span><button class="btn btn-primary btn-pack-img"style="margin-top:15px;margin-left:30px;">View Images</button></span></td>
    </tr>
    
</table>
  </div>
  <div class="activities">
        <?php
        $selectCat="select * from activity where pack_id=? ";
            //create a statement
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $selectCat)){
  echo "Failed";
}else{
  //bind parameters to the place holders
  mysqli_stmt_bind_param($stmt, 'i', $id);
  //rund parameters inside db
  mysqli_stmt_execute($stmt);
  $result=mysqli_stmt_get_result($stmt);
            while($row=mysqli_fetch_assoc($result)){?>
            <div class="activity-holder">
        <h5 class="card-title "style="color:green;"><span><?php echo $row['activity_title'];?></span></h5>
        <p class="card-text"><?php echo $row['activity_text'];?></p>
        </div>
<?php
  }
}
  ?>
  </div>
</div>
<?php
}
?>
      
      
        </div>