<!DOCTYPE html>
<html>
<head>
  <title></title>
   <link rel="stylesheet" href="./css/seller_nav.css">
</head>
<body>
 
    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="seller_dashboard.php">Dashboard</a>
  <a href="seller_add-product.php">Add Product</a>
  <!--<input type="button" onclick="location.href='seller-dashboard.html';" value="dashboard" />
  <input type="button" onclick="location.href='add-product.html';" value="product" /> -->
  <a href="seller_display-product.php">Display Product</a>
  <a href="seller_orderDetails.php">Sub Order Details</a>
  <a href="seller_logout.php">LogOut</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<header>
        <p>Hello, <span class="username"> <?php
        if(isset($_SESSION['username'])){ 
        echo $_SESSION['username'];  
      }
        ?>
       </span> </p>
    </header>
</body>
</html>