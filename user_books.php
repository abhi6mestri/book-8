<?php
session_start();
include("./database/dbConnect.php");

/*
if(isset($_SESSION['username'])){

} else {
  header("location: user_login.php");
}

*/

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `product` WHERE CONCAT(`id`, `pname`, `pprice`, `image`, `isbn`, `author`, `genre`, `seller_name`) LIKE '%".$valueToSearch."%'";
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
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/books.css">
  <link rel="stylesheet" type="text/css" href="./css/user_header.css">
  <link rel="stylesheet" type="text/css" href="./css/user_books.css">

<!--  
  <script type="text/javascript">
    const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})
  </script>
-->
  <title></title>
</head>
<body>

   <?php
    include('user_nav.php');
     //include('user_header.php');
  ?>
     <!-- Header Starts -->
    <div class="header">
      <div class="header__left">
        <?php 
        if(isset($_SESSION['username'])){

        echo '<p class="username"> Hello, &nbsp;' .$_SESSION['username']. '</p>';  
      
    }
    else
    {

    } 
 

     ?>    
        
      </div>
    
      <div class="search">
        <form method="post" class="search-form">
          <input type="text" name="valueToSearch" placeholder="Search books by (Name, Author, Category, ISBN no.)">
          <input type="submit" name="search" value="Q">
        </form>
      </div>


<?php  if(isset($_SESSION['username'])){

     $username=$_SESSION['username'];
      $sel="SELECT * FROM cart WHERE username='$username'";
      $rs=$conn->query($sel);
      

  ?>

         <div class="header__icons">
        <span class="numberCircle"><?php echo $rs->num_rows; ?> <?php 
      } 
    ?><a href="cart.php"><img src="./images/shopping-cart.png" class="cart-logo"></a> </span>
      </div>
    </div>
   
    <!-- Header Ends -->

<div class="wrapper">
<?php while($row = mysqli_fetch_array($search_result)):?>
    <div class="box">
      <center>
    <!--  <img src="https://picsum.photos/100/200">-->
      <?php echo "<img src='data:image/png;base64,".base64_encode($row['image'])."' class='product_image'>"; ?>
     <h2><p><?php echo $row['pname']; ?></p></h2>
     <h3><p>₹ <?php echo $row['pprice']; ?></p></h3>
     <details>
      <summary>View More</summary>
     <h3><p style="font-size: 16px;">ISBN NO. :<?php echo $row['isbn']; ?></h3></p>
     <h3><p style="font-size: 16px;">Author : <?php echo $row['author']; ?></p>
     <h3><p style="font-size: 16px;">Genre / Category: <?php echo $row['genre']; ?></p>
     <h3><p style="font-size: 16px;">Sold By : <?php echo $row['seller_name']; ?></p></h3>
     </details>

     <?php
      if(isset($_SESSION['username']))
      {
     ?>
    <form action="insert-cart.php" method="post">
     <p><input type="number" name="qty" value="1" class="quantity" min="1"></p>
     <input type="hidden" name="p_id" value="<?php echo $row['id']; ?>">
     <input type="hidden" name="p_name" value="<?php echo $row['pname']; ?>">
     <input type="hidden" name="price" value="<?php echo $row['pprice']; ?>">
     <input type="hidden" name="seller_name" value="<?php echo $row['seller_name']; ?>">
     <button type="submit" name="add_cart" value="Add to Cart" class="add-to-cart">Add to Cart</button>
  </form>
  <?php 
    } 
    else 
    {
    ?>
 <p><a class="login-to-buy" href="user_login">Login to Buy Product</a></p>
      <?php
      }
      ?>
    </center>
    </div> <!-- box end -->
  <?php endwhile;?>
  </div> <!-- wrapper end -->

</body>
</html>