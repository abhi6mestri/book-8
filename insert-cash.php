<?php
session_start();
include("./database/dbConnect.php");



$total = 0;

$payment_mode = 'CASH';

$username=$_SESSION['username'];

$sel="SELECT * FROM cart WHERE username = '".$_SESSION['username']."'";
      $rs=$conn->query($sel);
      while($row=$rs->fetch_assoc()){

      	$p_id=$row['p_id'];
      	$qty=$row['qty'];
      	$price=$row['price'];
      	$total=$total+($row['price']*$row['qty']);
}

$order="SELECT id, b_country, b_name, b_email, b_mobile, b_pin, b_add1, b_add2, b_landmark, 	b_city, b_state FROM m_order ORDER BY id DESC LIMIT 1";
$ord=$conn->query($order);
      while($row=$ord->fetch_assoc()){

      	$orderid=$row['id'];
      	$b_country=$row['b_country'];
      	$b_name=$row['b_name'];
      	$b_email=$row['b_email'];
      	$b_mobile=$row['b_mobile'];
      	$b_pin=$row['b_pin'];
      	$b_add1=$row['b_add1'];
      	$b_add2=$row['b_add2'];
      	$b_landmark=$row['b_landmark'];
      	$b_city=$row['b_city'];
      	$b_state=$row['b_state'];
}

//echo "$total";
//echo $orderid;
//echo $b_country;

$ins="INSERT INTO payment SET username='$username',orderid='$orderid',payment_mode='$payment_mode',total='$total',b_name='$b_name',b_email='$b_email',b_mobile='$b_mobile',b_pin='$b_pin',b_add1='$b_add1',b_add2='$b_add2',b_landmark='$b_landmark',b_city='$b_city',b_state='$b_state',b_country='$b_country',transaction_id='', date_time=current_timestamp()";
$conn->query($ins);


?>

<form method="post" action="success_cash.php" id="frm1" style="display: none;">

</form>



	<script>
		document.getElementById("frm1").submit();
	</script>