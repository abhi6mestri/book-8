<?php
session_start();

include("./database/dbConnect.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm-password'];

  $sql="SELECT * FROM seller_registration WHERE username = '$username'";
 
  $result=mysqli_query($conn,$sql);
  $numrow= mysqli_num_rows($result);

   $email_chk="SELECT * FROM seller_registration WHERE email = '$email'";
    $result2=mysqli_query($conn,$email_chk);
  $numrow2= mysqli_num_rows($result2);

   $mobile_chk="SELECT * FROM seller_registration WHERE mobile = '$mobile'";
    $result3=mysqli_query($conn,$mobile_chk);
  $numrow3= mysqli_num_rows($result3);

  if($numrow==0 && trim($username)!=NULL){
    if($numrow2==0 && trim($email)!=NULL){
      if($numrow3==0 && trim($mobile)!=NULL){
        if(trim($password)==trim($confirm_password)){
        $hash_pass=password_hash($password,PASSWORD_BCRYPT) ;
      $sql="INSERT INTO `seller_registration` (`id`, `username`, `email`, `mobile`, `address`,`password`, `Date`) VALUES (NULL, '$username', '$email', '$mobile', '$address', '$hash_pass', current_timestamp())";
      $result=mysqli_query($conn,$sql);

      if($result){
        
      header("location: seller_login.php");
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
    $_SESSION['message'] =  "<center><b><span style='color:#fff'>Mobile Number already exist!! Please select different Number</span></b></center>";
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
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link rel="stylesheet" type="text/css" href="./css/seller-reg-login.css">

    <title></title>
</head>
<body>
    <div class="container">

        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required oninvalid="this.setCustomValidity('Enter valid Username')">
            </div>
            <div class="input-group">
                <input type="email" name="email" placeholder="Enter Email - abc@abc.com " required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            </div>
     
            <div class="input-group">
                <input type="text" placeholder="Mobile Number" name="mobile" maxlength="10" pattern="\d{10}" autofocus required title="Please enter 10 digit number" required />
            </div>
            <div class="input-group">
                <input type="text" placeholder="Address" name="address" required>
            </div>
     
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" minlength="6" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain uppercase and Lowercase letters, 
            Must contain numbers between 0 to 9 and 
            Minimum 12 or more characters" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="confirm-password" required>
            </div>
            <div class="input-group">
                <button type=submit name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Have an account? <a href="seller_login.php">Login Here</a>    </p>
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
