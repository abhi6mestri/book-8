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
    $query = "SELECT * FROM `s_order` WHERE CONCAT(`id`, `m_id`, `p_id`, `p_name`, `qty`, `price`, `seller_name`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `s_order`";
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
            <h2 class="dash-title">Sub Order Details</h2>
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
                                        <th>Sub Order ID</th>
                                        <th>Main Order ID</th>
                                        <th>Product ID</th> 
                                        <th>Product Name</th>                                    
                                        <th>Quantity</th>  
                                        <th>Price (Rs.)</th> 
                                        <th>Seller Name</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                	  <?php while($row = mysqli_fetch_array($search_result)):?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['m_id']; ?></td>             
                                        <td><?php echo $row['p_id']; ?></td>
                                         <td><?php echo $row['p_name']; ?></td>
                                		<td><?php echo $row['qty']; ?></td>
                                		<td><?php echo '₹ '.$row['price']; ?></td>
                                        <td><?php echo $row['seller_name']; ?></td>
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