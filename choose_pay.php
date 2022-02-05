<?php
session_start();
include("./database/dbConnect.php");
require('config.php');



$total = 0;


$sel="SELECT * FROM cart WHERE username = '".$_SESSION['username']."'";
      $rs=$conn->query($sel);
      while($row=$rs->fetch_assoc()){

        $p_id=$row['p_id'];
        $qty=$row['qty'];
        $price=$row['price'];
        $total=$total+($row['price']*$row['qty']);
}

$order="SELECT id FROM m_order ORDER BY id DESC LIMIT 1";
$ord=$conn->query($order);
      while($row=$ord->fetch_assoc()){

        $orderid=$row['id'];
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>

    <link rel="stylesheet" href="./css/choose-pay.css">


</head>
<body>

		<div class="content">
			<h1> Choose Payment Option </h1>
			<div class="parents">
				<div class="child">
				<form action="insert-cash.php" method="post" enctype="multipart/form-data">
					<input type="radio" name="browser" onclick="myFunction()"> &nbsp;&nbsp;&nbsp;Pay on Deivery		
						<button id="showBtn" class="place-order" style="display:none;">Place Order</button>
				</form>
				</div>
				<div class="child">
			<form action="insert-card.php" method="post" enctype="multipart/form-data">
					<script 
		src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $publishableKey ?>" 
		data-amount="<?php echo $total * 100; ?>"
		data-name="Book Store"
		data-description="order ID - .<?php echo $orderid ?>"
		data-image=""
		data-currency="inr"
	>	
	</script>
				</form>
				</div>

			</div>
		</div>
<script>
function myFunction() {
  var x = document.getElementById("showBtn");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
</body>
</html>