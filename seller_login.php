<?php
session_start();
include("./database/dbConnect.php");
$flag=0;
// session_start();

/*
if(isset($_SESSION['username'])){
    echo ($_SESSION['username']);
    echo ' You are already logged in';
    exit();
} 
*/ 

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM seller_registration WHERE username = '$username'";

  $result=mysqli_query($conn,$sql);
  $row= mysqli_fetch_assoc($result);


  if(password_verify($password,$row['password']) && $password!=NULL && $username==$row['username']){
    $flag=1;
      $_SESSION['username'] = $username;
  $_SESSION['password'] =$password;
    header("Location: seller_dashboard.php"); 
    
    
 
  exit;
  
}
else{
    $_SESSION['message'] =  "<center><b><span style='color:#fff'>Username/Passoword not matching !!!! Try again....... </span></b></center>";
}

}
if($flag==1){
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<link rel="stylesheet" type="text/css" href="./css/seller-reg-login.css">

	<title></title>
</head>
<body>
	<div class="container">
		<form action='seller_login.php' method='post' class="login-email">
  <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
    <input type="text" name='username' placeholder="Username">
    
  </div>
  <div class="input-group">
    
    <input type="password" name='password'placeholder="Password">
  </div>
  <div class="input-group">
  <button type="submit" name="submit" class="btn">LOGIN</button>
</div>
<p class="login-register-text"> <a href="seller_registration.php">Register Account</a></p>
<a href="index.php" class="back-to-home"><--Back to Home</a>
<br>

<?php
  if (isset($_SESSION['message'])) {
    echo "<div id='alert'><span class='closebtn'>&times;</span>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
  }

?>

<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>

</form>
	</div>
</body>
</html>