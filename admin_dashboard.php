<?php
session_start();
include("./database/dbConnect.php");
 if(isset($_SESSION['admin_name']))
  {
  }
  else
  {
    header("Location: admin_login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>

    <link rel="stylesheet" href="./css/admin_nav.css">
     <link rel="stylesheet" href="./css/admin-dashboard.css">

</head>
<body>
    
	<?php
		require 'admin_nav.php';
	?>
    
    <div class="main-content">                 
       <main>
            
            <h2 class="dash-title">Admin Dashboard</h2>
            
            <div class="dash-cards">
              

                <div class="card-single">
                    <div class="card-body">
                         <?php                              
                            $sel="SELECT * FROM user_registration";
                            $rs=$conn->query($sel);      
                        ?>
                        <span class="ti-briefcase"></span>
                        <div>
                            <h5>No. of Users</h5>
                            <h4><?php echo $rs->num_rows; ?></h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="admin_userDetails.php">View User Details</a>
                    </div>
                </div> <!-- card-single -->


                <div class="card-single">
                    <div class="card-body">
                         <?php                              
                            $sel="SELECT * FROM product";
                            $rs=$conn->query($sel);      
                        ?>
                        <span class="ti-briefcase"></span>
                        <div>
                            <h5>No. of Products</h5>
                            <h4><?php echo $rs->num_rows; ?></h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="admin_productDetails.php">View Seller Details</a>
                    </div>
                </div> <!-- card-single -->


                <div class="card-single">
                    <div class="card-body">
                         <?php                              
                            $sel="SELECT * FROM seller_registration";
                            $rs=$conn->query($sel);      
                        ?>
                        <span class="ti-briefcase"></span>
                        <div>
                            <h5>No. of Sellers</h5>
                            <h4><?php echo $rs->num_rows; ?></h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="admin_sellerDetails.php">View Seller Details</a>
                    </div>
                </div> <!-- card-single -->


                                 
            </div> <!-- dash-cards -->
            
        </main>
        
    </div> <!-- main-content -->
    
</body>
</html>