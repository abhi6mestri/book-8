<?php
session_start();
include("./database/dbConnect.php");

if($_SERVER['REQUEST_METHOD']=='POST' && (!empty($_POST['register']))){
    $admin_name=$_POST['admin_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm-password'];

  $sql="SELECT * FROM admin_login WHERE admin_name = '$admin_name'";
  $result=mysqli_query($conn,$sql);
  $numrow= mysqli_num_rows($result);
 $email_chk="SELECT * FROM admin_login WHERE email = '$email'";
    $result2=mysqli_query($conn,$email_chk);
  $numrow2= mysqli_num_rows($result2);

  if($numrow==0 && trim($admin_name)!=NULL){
  if($numrow2==0 && trim($email)!=NULL){
      if(trim($password)==trim($confirm_password)){
        $hash_pass=password_hash($password,PASSWORD_BCRYPT) ;
      $sql="INSERT INTO `admin_login` (`id`, `admin_name`, `email`,`password`) VALUES (NULL, '$admin_name', '$email', '$hash_pass')";
      $result=mysqli_query($conn,$sql);

      if($result){
        
      header("location: ../user/index.php");
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
    $_SESSION['message'] =  "<center><b><span style='color:#fff'>Name already exist!! Please select different username.</span></b></center>";
  }
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/insert_admin.css" />

   </head>
<body>
  <h1>ADMIN REGISTRATION</h1>
<form action="" method="POST" enctype="multipart/form-data">

                <?php
    if (isset($_SESSION['message'])) {
        echo "<div id='alert'><span class='closebtn'>&times;</span>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }

?>
  <div class="row">
    <label>Name</label>
    <input type="text" name="admin_name" placeholder="Name">
  </div>
  <div class="row">
    <label>Email</label>
    <input type="email" name="email"  placeholder="email">
  </div>
  <div class="row">
    <label>Password</label>
    <input type="password" name="password" placeholder="password">
  </div>
    <div class="row">
    <label>Confirm  Password</label>
    <input type="password" name="confirm-password" placeholder="Confirm Password">
  </div>
  <button type="submit" name="register" value="Register">Register</button>
  <!-- admin password - admin123 -->

</form>
</body>
</html>