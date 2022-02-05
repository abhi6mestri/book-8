<?php
session_start();
include("./database/dbConnect.php");

if(isset($_GET["delete"]))  {
  $del = mysqli_query($conn,"delete from cart_rent where id='".$_GET["delete"]."'");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/cart.css">
  <script src="./javascript/index.js" defer></script>
	<title></title>
</head>
<body>
		<?php
    include('user_nav.php');
  ?>


  <!-- body start -->

 <table>

  <caption><h1>Your Shopping Bag</h1></caption>
  <thead>

    <tr class="heading">
      <th colspan="3" scope="col">Items</th>
      <th scope="col">Rent Price / day</th>
      <th scope="col">No. of Days</th>
      <th scope="col">Sub Total</th>
    </tr>
  </thead>
  <tbody>
     <?php
      $st=0;
      $username=$_SESSION['username'];
      $sel="SELECT * FROM cart_rent WHERE username='$username'";
      $rs=$conn->query($sel);
      while($row=$rs->fetch_assoc()){

        $p_id=$row['p_id'];
         $sel_product="SELECT * FROM product WHERE id='$p_id'";
      $rsp=$conn->query($sel_product);
      while($rowp=$rsp->fetch_assoc())
      {

        $st=$st+($row['rent_price']*$row['nod']);

      ?>
    <tr class="row">
      <td data-label=""><img class="pimg" src="../product_img/<?php echo $rowp['image']; ?>" ></td>
      <td data-label="">
      <p class="pname"> <?php echo $rowp['pname']; ?></p> 
        <p class="seller_name">Sold By : <?php echo $row['seller_name']; ?></p>

         <?php
        $del = mysqli_query($conn,"select * from cart_rent");
        while($delete=mysqli_fetch_array($del)){ 
           } 
      echo '<p><a href="cart_rent.php?delete='.$row["id"].'" class="remove-product"> X Remove </p>';
      
       ?> 
      </td>
      <td></td>
      <td data-label="Price"><p class="price"><?php echo $row['rent_price']; ?> </p> </td>
      <td data-label="Quantity"><input type="text" class="qty" name="qty" value="<?php echo $row['nod']; ?>" disabled></td>
      <td data-label="Sub Total"><p class="sub-total"><?php echo $row['rent_price']*$row['nod']; ?></p></td>
    </tr>
    

  <?php  } } ?>

  <hr>
   <tr class="total-row">
        <td data-label="Total" colspan="5" class="total" style="text-align: right;"><p class = "none"> TOTAL: </p></td>
        <td class="total">Rs.<?php  echo $st;?> </td>
      </tr>
      <tr class="button-group">
        <td colspan="5" style="text-align: left;">
          <p>
          <a href="user_rent-books.php" class="continue-shop">Continue Shopping</a>
          </p>
        </td>
        

           <td style="text-align: right;">
          <p>
          <a href="checkout_rent.php" class="checkout">Checkout</a>
          </p>
        </td>
       
      </tr>
  </tbody>
</table>


</body>
</html>