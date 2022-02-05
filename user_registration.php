<?php
session_start();
include("./database/dbConnect.php");

if($_SERVER['REQUEST_METHOD']=='POST' && (!empty($_POST['register']))){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm-password'];

  $sql="SELECT * FROM user_registration WHERE username = '$username'";
  $result=mysqli_query($conn,$sql);
  $numrow= mysqli_num_rows($result);
 $email_chk="SELECT * FROM user_registration WHERE email = '$email'";
    $result2=mysqli_query($conn,$email_chk);
  $numrow2= mysqli_num_rows($result2);

  if($numrow==0 && trim($username)!=NULL){
  if($numrow2==0 && trim($email)!=NULL){
      if(trim($password)==trim($confirm_password)){
        $hash_pass=password_hash($password,PASSWORD_BCRYPT) ;
      $sql="INSERT INTO `user_registration` (`id`, `username`, `email`,`password`, `Date`) VALUES (NULL, '$username', '$email', '$hash_pass', current_timestamp())";
      $result=mysqli_query($conn,$sql);

      if($result){
        
      header("location: user_login.php");
  }
  else{
     $_SESSION['message'] =  "<center><b><span style='color:#fff'>Error!!!! Something went wrong try again later</span></b></center>";
  }
  }
   else{
    $_SESSION['message'] =  "<center><b><span style='color:#fff'>Password Combination not matching</span></b></center>";
  }
  }
  else{
    $_SESSION['message'] =  "<center><b><span style='color:#fff'>Email already exist!! Please select different Email ID</span></b></center>";
  }
  }
  else{
    $_SESSION['message'] =  "<center><b><span style='color:#fff'>Username already exist!! Please select different username.</span></b></center>";
  }
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/user-registration.css" />
   </head>
<body>
	<section>
		<div class="container">
			<div class="user signupBx">
      	
				<div class="formBx">
					<form action="" method="POST" enctype="multipart/form-data">
						<h2>Create an Account</h2>
						<input type="text" name="username" placeholder="Username" required oninvalid="this.setCustomValidity('Enter valid Username')"> 
						<input type="email" name="email" placeholder="Enter Email - abc@abc.com " required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
						<input type="password" name="password" placeholder="Password"  minlength="6" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain uppercase and Lowercase letters, 
            Must contain numbers between 0 to 9 and 
            Minimum 12 or more characters" required>
						<input type="password" name="confirm-password" placeholder="Confirm Password" required>
						<button type="submit" name="register" value="Register">Register</button>
						<p class="signup">Already have an Account ? <a href="user_login.php">Sign IN</a></p>
					 	<p class="back-to-home"><a href="index.php"><--Back to Home</a></p><br>

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
<div class="imgBx"><img src="./images/Mobile-login.jpg"></div> 
			</div>
		</div>
	</section>
	
</body>
</html>