<?php
session_start();
include("./database/dbConnect.php");

$s_country=$_POST['s_country'];
$s_name=$_POST['s_name'];
$s_email=$_POST['s_email'];
$s_mobile=$_POST['s_mobile'];
$s_pin=$_POST['s_pin'];
$s_add1=$_POST['s_add1'];
$s_add2=$_POST['s_add2'];
$s_landmark=$_POST['s_landmark'];
$s_city=$_POST['s_city'];
$s_state=$_POST['s_state'];

$b_country=$_POST['b_country'];
$b_name=$_POST['b_name'];
$b_email=$_POST['b_email'];
$b_mobile=$_POST['b_mobile'];
$b_pin=$_POST['b_pin'];
$b_add1=$_POST['b_add1'];
$b_add2=$_POST['b_add2'];
$b_landmark=$_POST['b_landmark'];
$b_city=$_POST['b_city'];
$b_state=$_POST['b_state'];



$username=$_SESSION['username'];

$ins="INSERT INTO m_order SET s_country='$s_country',s_name='$s_name',s_email='$s_email',s_mobile='$s_mobile',s_pin='$s_pin',s_add1='$s_add1',s_add2='$s_add2',s_landmark='$s_landmark',s_city='$s_city',s_state='$s_state',b_country='$b_country',b_name='$b_name',b_email='$b_email',b_mobile='$b_mobile',b_pin='$b_pin',b_add1='$b_add1',b_add2='$b_add2',b_landmark='$b_landmark',b_city='$b_city',b_state='$b_state',username='$username', date_time=current_timestamp()";

$conn->query($ins);
 $m_id = $conn->insert_id;

$_SESSION['m_id']=$m_id;

$sel="SELECT * FROM cart WHERE username='$username'";
      $rs=$conn->query($sel);
      while($row=$rs->fetch_assoc()){

      	$p_id=$row['p_id'];
        $p_name=$row['p_name'];
      	$qty=$row['qty'];
      	$price=$row['price'];
        $seller_name=$row['seller_name'];
      	//$total=$total+($row['price']*$row['qty']);


     $icart="INSERT INTO s_order SET m_id='$m_id',p_id='$p_id',p_name='$p_name',qty='$qty',price='$price' ,seller_name='$seller_name'";
     $conn->query($icart);

      	}


?>

<form method="post" action="choose_pay.php" id="frm" style="display: none;">

</form>



	<script>
		document.getElementById("frm").submit();
	</script>