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
    $query = "SELECT * FROM `product` WHERE CONCAT(`id`, `pname`, `pprice`, `pimg`, `isbn`, `author`, `genre`, `seller_name`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `product`";
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
            <h2 class="dash-title">Product Details</h2>
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
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Images</th>
                                        <th>ISBN No.</th>
                                        <th>Author</th>
                                        <th>Category / Genre</th>
                                        <th>Seller</th>                              
                                    </tr>
                                </thead>
                                <tbody>
                                	 <?php while($row = mysqli_fetch_array($search_result)):?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['pname']; ?></td>
                                        <td><?php echo $row['pprice']; ?></td>    
                                        <td class="td-team">
                                          
                                        </td>
                                        <td><?php echo $row['isbn']; ?></td>
                                        <td><?php echo $row['author']; ?></td>
                                        <td><?php echo $row['genre']; ?></td>
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