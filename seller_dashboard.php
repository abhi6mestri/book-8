<?php
session_start();
include("./database/dbConnect.php");
if(isset($_SESSION['username'])){
   
    
} else {
  header("location: seller_login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>

    <link rel="stylesheet" href="./css/seller-dashboard.css">

</head>
<body>
  <?php
    include('seller_nav.php');
  ?>
    
    <header>
        <p>Welcome, <span class="username"> <?php
        if(isset($_SESSION['username'])){ 
        echo $_SESSION['username'];  
      }
        ?>
       </span> </p>
    </header>

    
    <div class="main-content">                 
       <main>
            
            <h2 class="dash-title">Seller Dashboard</h2>
            
            <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">

                    <?php  if(isset($_SESSION['username'])){

                            $username=$_SESSION['username'];                            
                            $sel="SELECT m_id FROM s_order WHERE seller_name = '".$_SESSION['username']."'";
                            $rs=$conn->query($sel);      
                        ?>

                        <span class="ti-briefcase"></span>
                        <div>
                            <h5>No. of Orders</h5>
                            <h4><?php echo $rs->num_rows; ?> <?php 
        } 
    ?></h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="seller_orderDetails.php">View Order Details</a>
                    </div>
                </div> <!-- card-single -->
                
                
            
            
           
                  
            </div> <!-- dash-cards -->
            </section>
            
        </main>
        
    </div> <!-- main-content -->
    
</body>
</html>