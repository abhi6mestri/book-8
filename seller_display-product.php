<?php
session_start();
include("./database/dbConnect.php");
if(isset($_SESSION['username'])){

} else {
  header("location: seller_login.php");
}


if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `product` WHERE CONCAT(`id`, `pname`, `pprice`, `image`, `isbn`, `author`, `genre`, `seller_name`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `product` WHERE seller_name = '".$_SESSION['username']."'";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    include("./database/dbConnect.php");
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}


if(isset($_GET["delete"]))  {
  $qry = mysqli_query($conn,"delete from product where id='".$_GET["delete"]."'");

  $message="Product Deleted Successfully.";

      header("location: seller_display-product.php");   
}

?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
      <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/display-product.css" />
     <link rel="stylesheet" href="./css/seller_table.css" />
</head>
<body>
   <?php
    include('seller_nav.php');
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
                
              <table class="content-table">
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
                                        <th>Update</th>
                                        <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_array($search_result)):?>
    <tr>
<td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['pname']; ?></td>
                                        <td><?php echo $row['pprice']; ?></td>    
                                         <td class="td-team">
             <?php echo "<img src='data:image/png;base64,".base64_encode($row['image'])."'  width = '150px' height = '150px'>"; ?>
           </td> 
                                        <td><?php echo $row['isbn']; ?></td>
                                        <td><?php echo $row['author']; ?></td>
                                        <td><?php echo $row['genre']; ?></td>
                                        <td><?php echo $row['seller_name']; ?></td>
                                        <td>
                                          <form action="seller_edit-product.php" method="post" enctype="multipart/form-data">
                                          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                          <button type="submit" value="" name="button_edit" class="edit">EDIT</button>
                                          </form>  
                                        </td>
                                         <td>

                                         <form action="edit_product.php" method="post" enctype="multipart/form-data">
                                          <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                          <input type="hidden" name="del_pimg" value="">                                       
                                          </form>

                       <?php echo'<a href="?delete='.$row["id"].'" class="delete"> Delete </td>'; ?>
                                         </td>
                                    </tr>
                                    
                                   <?php endwhile;?>

  </tbody>
</table>