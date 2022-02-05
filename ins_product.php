<?php
session_start();
include("../database/dbConnect.php");
if(isset($_SESSION['username'])){

} else {
  header("location: seller_login.php");
}

if(isset($_POST['button_add'])){

		$pname=$_POST['pname'];
		$price=$_POST['price'];
		$isbn=$_POST['isbn'];
		$author=$_POST['author'];
		$genre=$_POST['genre'];
		$seller_name=$_POST['seller_name'];
		$ins_picture=addslashes(file_get_contents($_FILES['insertpic']['tmp_name']));
		$ins_picture_name=$_FILES['insertpic']['name'];
		$insert_picture = "INSERT INTO product(pname,pprice,image, image_name, isbn, author, genre, seller_name) VALUES ('$pname','$price','$ins_picture', '$ins_picture_name','$isbn','$author','$genre','$seller_name')";
		$result_insert_picture = $conn->query($insert_picture); 
		if($result_insert_picture==true)
		{
			$message="Product Added Successfully.";
			echo "<script type='text/javascript'>alert('$message');</script>";	
			header("location: seller_add-product.php");		
		}
		else
		{
			$message="Fail to insert image . Please try again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}

?>