<?php
session_start();
include("./database/dbConnect.php");



$p_id=$_POST['p_id'];
$p_name=$_POST['p_name'];
$price=$_POST['price'];
$qty=$_POST['qty'];
$seller_name=$_POST['seller_name'];
$username=$_SESSION['username'];

$sel="SELECT * FROM cart WHERE p_id='$p_id' AND username='$username'";
$rs=$conn->query($sel);
if($rs->num_rows>0){

while($row=$rs->fetch_assoc()){
	$fqty=$row['qty']+$qty;
	$cart_id=$row['id'];
	$upd="UPDATE cart SET qty='$fqty' WHERE id='$cart_id'";
	$conn->query($upd);
}

}
else{
$ins="INSERT INTO cart SET p_id='$p_id',p_name='$p_name', username='$username',qty='$qty',price='$price' ,seller_name='$seller_name'";
$conn->query($ins);
}

header("location:user_books.php");

?>