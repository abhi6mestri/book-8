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
    $query = "SELECT * FROM `user_registration` WHERE CONCAT(`id`, `username`, `email`, `Date`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `user_registration`";
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
            <h2 class="dash-title">User Details</h2>
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
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Email ID</th>                                     
                                        <th>DATE</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                	    <?php while($row = mysqli_fetch_array($search_result)):?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['username']; ?></td>             
                                        <td><?php echo $row['email']; ?></td>
                                		<td><?php echo $row['Date']; ?></td>
                                       
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