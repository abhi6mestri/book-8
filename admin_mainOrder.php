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
    $query = "SELECT * FROM `m_order` WHERE CONCAT(`id`, `username`, `s_name`, `s_email`, `s_mobile`, `s_add1`, `s_add2`, `s_landmark`, `s_city`, `s_pin`, `s_state`, `s_country`, `date_time`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT id, username, s_country, s_name, s_email, s_mobile, s_pin, s_add1, s_add2, s_add2 s_landmark, s_city, s_state, date_time FROM `m_order`";
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
            <h2 class="dash-title">User Delivery Details</h2>
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
                                        <th>Main Order ID</th>
                                        <th>Username</th>
                                        <th>Shipping Name</th>                                     
                                        <th>Shipping Email</th>  
                                        <th>Shipping Mobile</th>                                       
                                        <th colspan="7">Shipping Address</th>   
                                        <th>DATE</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                	  <?php while($row = mysqli_fetch_array($search_result)):?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['username']; ?></td>             
                                        <td><?php echo $row['s_name']; ?></td>
                                		<td><?php echo $row['s_email']; ?></td>
                                   		<td><?php echo $row['s_mobile']; ?></td>             
                                        <td><?php echo $row['s_add1']; ?></td>
                                        <td><?php echo $row['s_add2']; ?></td>
                                        <td><?php echo $row['s_landmark']; ?></td>
                                        <td><?php echo $row['s_city']; ?></td>
                                        <td><?php echo $row['s_pin']; ?></td>
                                        <td><?php echo $row['s_state']; ?></td>
                                        <td><?php echo $row['s_country']; ?></td>
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