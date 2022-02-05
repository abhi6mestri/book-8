<?php
session_start();
include("./database/dbConnect.php");
if(isset($_SESSION['admin_name'])){

} else {
  header("location: admin_login.php");
}



if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `payment` WHERE CONCAT(`id`, `username`, `orderid`, `payment_mode`, `total`, `transaction_id`, `token_id`, `b_name`, `b_email`, `b_mobile`, `b_add1`, `b_add2`, `b_landmark`, `b_city`, `b_pin`, `b_state`, `b_country`, `date_time`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `payment`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    include("./database/dbConnect.php");
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>

    <link rel="stylesheet" href="./css/user-details.css">
     <link rel="stylesheet" href="./css/search.css">

</head>
<body>
    
	<?php 
		require 'admin_nav.php';
	?>

    <div class="main-content">       
        <main>       
            <h2 class="dash-title">Payment Details</h2>
            <div class="search">
        <form method="post" class="search-form">
          <input type="text" name="valueToSearch" placeholder="Search for books">
          <input type="submit" name="search" value="Q">
        </form>
    </div>
            <section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                
                        
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Payment ID</th>
                                        <th>Username</th>
                                        <th>Main Order ID</th>                                     
                                        <th>Payment Mode</th>  
                                        <th>Order Total (Rs)</th>                                    
                                        <th>Transaction ID</th>
                                        <th>Token ID</th>  
                                        <th>Billing Name</th>                                     
                                        <th>Billing Email</th>  
                                        <th>Billing Mobile</th>   
                                        <th colspan="7">Billing Address</th> 
                                        <th>DATE</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                	   <?php while($row = mysqli_fetch_array($search_result)):?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['username']; ?></td>   
                                        <td><?php echo $row['orderid']; ?></td>
                                        <td><?php echo $row['payment_mode']; ?></td>  
                                        <td><?php echo '₹'.$row['total']; ?></td>  
                                        <td><?php echo $row['transaction_id']; ?></td>
                                        <td><?php echo $row['token_id']; ?></td>              
                                        <td><?php echo $row['b_name']; ?></td>
                                		<td><?php echo $row['b_email']; ?></td>
                                   		<td><?php echo $row['b_mobile']; ?></td>             
                                        <td><?php echo $row['b_add1']; ?></td>
                                        <td><?php echo $row['b_add2']; ?></td>
                                        <td><?php echo $row['b_landmark']; ?></td>
                                        <td><?php echo $row['b_city']; ?></td>
                                        <td><?php echo $row['b_pin']; ?></td>
                                        <td><?php echo $row['b_state']; ?></td>
                                        <td><?php echo $row['b_country']; ?></td>
                                        <td><?php echo $row['date_time']; ?></td>

                                    </tr>
                                   <?php endwhile;?>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                   
                </div>
            </section>
            
        </main>
        
    </div>



</body>
</html>