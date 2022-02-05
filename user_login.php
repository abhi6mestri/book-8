<?php
session_start();
include("./database/dbConnect.php");

$flag=0;


if($_SERVER['REQUEST_METHOD']=='POST' && (!empty($_POST['login']))){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM user_registration WHERE username = '$username'";

  $result=mysqli_query($conn,$sql);
  $row= mysqli_fetch_assoc($result);


  if(password_verify($password,$row['password']) && $password!=NULL && $username==$row['username']){
    $flag=1;
      $_SESSION['username'] = $username;
  $_SESSION['password'] =$password;
    header("Location: index.php"); 
    
    
 
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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/user-login.css" />
   </head>
<body>
	<section>
		<div class="container">
			<div class="user signinBx">
				<div class="imgBx"><img src="./images/undraw_Access_account_re_8spm.jpg"></div>
				<div class="formBx">
					<form action="" method="POST" enctype="multipart/form-data">
						<h2>Sign in</h2>
						<input type="text" name="username" placeholder="Username" required />
					<input type="password" name="password" placeholder="Password" required />
						<button type="submit" name="login" value="Login">Login</button>
						<p class="signup">Don't Have an Account ? <a href="user_registration.php">Sign UP</a></p>
						<p class="back-to-home"><a href="index.php"><--Back to Home</a></p>
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
			</div>

		</div>
	</section>

</body>
</html>