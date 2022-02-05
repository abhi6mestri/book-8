<?php
session_start();
include("./database/dbConnect.php");

$flag=0;


if($_SERVER['REQUEST_METHOD']=='POST' && (!empty($_POST['login']))){
    $admin_name=$_POST['admin_name'];
    $password=$_POST['password'];

    $sql="SELECT * FROM admin_login WHERE admin_name = '$admin_name'";

  $result=mysqli_query($conn,$sql);
  $row= mysqli_fetch_assoc($result);


  if(password_verify($password,$row['password']) && $password!=NULL && $admin_name==$row['admin_name']){
    $flag=1;
      $_SESSION['admin_name'] = $admin_name;
  $_SESSION['password'] =$password;
    header("Location: admin_dashboard.php"); 
    
    
 
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


  <link rel="stylesheet" type="text/css" href="./css/admin_login.css">

  <title></title>
</head>
<body>
  <div class="container">
    <form action='admin_login.php' method='post' class="login-email">
  <p class="login-text" style="font-size: 2rem; font-weight: 800;">ADMIN LOGIN </p>
      <div class="input-group">
    <input type="text" name='admin_name' placeholder="Username">
    
  </div>
  <div class="input-group">
    
    <input type="password" name='password'placeholder="Password">
  </div>
  <div class="input-group">
  <button type="submit"  name="login" value="Login" class="btn">LOGIN</button>
</div>

<a href="index.php" class="back-to-home"><--BACK</a>
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