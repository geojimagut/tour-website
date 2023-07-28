<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--my css-->
    <link rel="stylesheet"href="namna/login.css?v=<?php echo time();?>">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>
    <div class="content-wrap">
<form action="forgot.php"method="POST"autocomplete="off">
  <div class="form-group">
    <label for="exampleInputEmail1"class="black">Enter Your Email Address</label>
    <input type="email" class="form-control"name="txtemail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"required>
    
  </div>
  <input type="submit" class="btn btn-primary"value="Submit"name="btnemail">
</form>
</div>
</body>
</html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('connect.php');
if(isset($_POST['btnemail'])){
    $email=$_POST['txtemail'];
    $qry="select * from log where email='$email' ";
    $result=$conn->query($qry);
    $row=mysqli_fetch_assoc($result);
    if($row['email']!=$email){
        ?><script>alert('Invalid email address!');</script><?php

    }else{
        $emailaddress=$row['email'];
        $message=$row['password'];
        echo "<input type='text'id='emailaddress' hidden value=".$emailaddress.">";
        echo "<input type='text'id='message' hidden value=".$message.">";
        echo json_encode(["Name"=>$name, "Email"=>$email, "Tel"=>$phone, "People"=>$people, "From"=>$from, "Comment"=>$comment, "Package"=>$packname, "Price"=>$packprice, "Destination"=>$packdestination, "Duration"=>$packduration]);
        ?><script>
        var state=confirm('Get password via email?');
        console.log(state)
        if(state==true){
            var email=$('#emailaddress').val()
            var message=$('#message').val()
            alert(message);
            alert(email);
            $.ajax({
        url: `https://formsubmit.co/ajax/${email}`,
        //pulmertours@gmail.com
    method: "POST",
    data: {
       password:message
    },
    dataType: "json"
    })
    alert('Check your email');
           
        }        </script>
        <?php
    }
}

?>
