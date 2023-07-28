<?php
session_start();
ini_set("display_errors", 0);
include('connect.php');
/*signing into the */
if(isset($_POST['btnsign'])){
    $useremail=$_POST['signemail'];
    $username=$_POST['signuser'];
    $userpass=$_POST['signpass'];
    $userconpass=$_POST['signconpass'];
    
    $conqry="select * from log";
    $result=$conn->query($conqry);
    $row=mysqli_num_rows($result);
    if($row>=1){
        echo "<script>alert('Account Already Exists!');</script>";
    }else{
        $insqry=$conn->prepare("insert into log values(?, ?, ?) ");
        $insqry->bind_param('sss', $useremail, $username, $userpass);
        $insqry->execute();
        echo "<script>alert('Account Created');</script>";
    }
}else if(isset($_POST['btnlogin'])){
    $loguser=$_POST['loginuser'];
    $logpass=md5($_POST['loginpass']);

    $logqry="select * from log where username=? and password=? ";
    //create a statement
    $stmt=mysqli_stmt_init($conn);
    //prepare the prepared statements
    if(!mysqli_stmt_prepare($stmt,$logqry)){
        echo "Sql staments Failed";
    }else{
    //bind parameters to the place holders
        mysqli_stmt_bind_param($stmt, "ss", $loguser, $logpass);	
        //Run parameters inside db
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $row=mysqli_fetch_assoc($result);
    if($row['username']===$loguser && $row['password']===$logpass){
        $_SESSION['verification']=$row['username'];
        header('Location:home.php');
    }else{
        echo "<script>alert('Wrong Username or Password');</script>";
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
    <title>Login</title>
    <!--bootstrap links-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet"href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!--js link-->
    
    <!--css links-->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet"href="namna/login.css?v=<?php echo time();?>">
</head>
<body>
    <div class="wrapper">
        <div id="login-form">
            
            <hr>
            
            <form action="index.php"method="POST"autocomplete="off">
                <input type="text"name="loginuser"placeholder="Enter Your Username"required><br>
                <input type="password"name="loginpass"placeholder="Enter Your Password"required><br>
                <input type="submit" name="btnlogin"value="Sign in">
            </form>
                <hr>
            <ul>
                <!--li><button id="show-sign-up">Sign Up</button></li-->
                <!--li><a href="forgot.php">Forgot Password?</a></li-->
            </ul>
        </div>
        <!--sign up-->
        <div id="sign-form">
            <ul><li>Sign Up</li>
            </ul>
            <hr>
            
            <form action="index.php"method="POST">
                <input type="email"name="signemail" aria-describedby="emailHelp" placeholder="Enter Your Email"required><br>
                <input type="text"name="signuser"placeholder="Create Username"required><br>
                <input type="password"name="signpass"placeholder="Create Password"required><br>
                <input type="password" name="signconpass"placeholder="Confirm The Password"required>
                <input type="submit" name="btnsign"value="Sign up">
            </form>
                <hr>
            <ul>
                <li><button id="hide-sign-up">Sign In</button></li>
            </ul>
        </div>
    </div>
</body>
</html>
<script>
    var show=document.getElementById('show-sign-up').onclick=function(){
        var login=document.getElementById('login-form');
        var signup=document.getElementById('sign-form');
        if(login.style.display='block'){
            login.style.display='none';
        signup.style.display='block';
        }
        
    }
    var hide=document.getElementById('hide-sign-up').onclick=function(){
        var login=document.getElementById('login-form');
        var signup=document.getElementById('sign-form');
        if(signup.style.display='block'){
            
        login.style.display='block';
        signup.style.display='none';
        }
    }

</script>