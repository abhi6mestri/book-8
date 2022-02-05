<?php

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>

    <link rel="stylesheet" href="./css/seller_nav.css">

</head>
<body>
    
   <div class="header">
    <span class="menu-icon" onclick="openMenu()">&#9776;</span>
    
  </div>

  <div class="menu-list" id="navbar">
    <span class="closebtn" onclick="closeMenu()">&times;</span>
    <div class="menu-content">
      <a href="admin_dashboard.php">Dashboard</a>
      <a href="admin_productDetails.php">Product Details</a>
      <a href="admin_orderDetails.php">Sub Order Details</a>
      <a href="admin_orderRentDetails.php">Rented Books Sub Order Details</a>
      <a href="admin_mainOrder.php">Main Order Details</a>
      <a href="admin_mainRentOrder.php">Rented Books Main Order Details</a>
      <a href="admin_paymentDetails.php">Payment Details</a>
      <a href="admin_userDetails.php">User Details</a>
      <a href="admin_sellerDetails.php">Seller Details</a>


       <a href="admin_logout">LogOut</a>
    </div>
  </div>

<script type="text/javascript">
  function closeMenu(){
  document.getElementById("navbar").style.height = "0%";
}
function openMenu(){
  document.getElementById("navbar").style.height = "100%";
}

</script>

    
    <header>
               <p>Hello, <span class="admin_name"> <?php
        if(isset($_SESSION['admin_name'])){ 
        echo $_SESSION['admin_name'];  
      }
        ?>
       </span> </p>
    </header>

    
</body>
</html>