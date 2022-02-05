<?php
session_start();
include("./database/dbConnect.php");

$total = 0;

$payment_mode = 'CARD';

$username=$_SESSION['username'];

$emails="SELECT email FROM user_registration WHERE username = '".$_SESSION['username']."'";
$e_mail=$conn->query($emails);
      while($row=$e_mail->fetch_assoc()){

        $email=$row['email'];
}

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

$txn="SELECT transaction_id FROM payment ORDER BY orderid DESC LIMIT 1";
$txn_no=$conn->query($txn);
      while($row=$txn_no->fetch_assoc()){

      	$transaction=$row['transaction_id'];
}




$del="DELETE FROM cart WHERE username = '".$_SESSION['username']."'";
        $conn->query($del);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>

    <link rel="stylesheet" href="./css/success_card.css">

</head>
<body>
	<div class="container">
		<div class="left-div left-text">
			<form>
			<p class="heading">PAYMENT SUCCESSFULL !!!</p>
		 <p>Thank You for Shopping with US</p>
      		<p>Name : - <?php echo "$username"; ?></p>
      		<p>Email : - <?php echo "$email"; ?></p>
      		<p> Order ID : - <?php echo "$orderid"; ?></p>
      		<p> Order Total :- ₹ <?php echo "$total"; ?></p>
          <p> Payment Type :- CARD</p>
          <p> Transaction ID :-<?php echo "$transaction"; ?></p>

      		<a href="index.php" class="back-to-home">Go to Home Page</a>
      	
      		</form>
		</div>


	
	    <div class="right-div right-text"> <img src="./images/4060173.jpg" style="width: 100%; height: 100%;"></div>
	</div>


</body>
</html>