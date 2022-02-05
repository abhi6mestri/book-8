<?php
session_start();
include("./database/dbConnect.php");
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


<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/add-product.css" />
</head>
<body>
	 <?php
    include('seller_nav.php');
  ?>

	

    <div class="wrapper">
    <div class="title">
      Add Product
    </div>
    <form action="seller_add-product.php" method="post" enctype="multipart/form-data">
    <div class="form">
       <div class="inputfield">
          <label>Product Name</label>
          <input type="text" class="input" name="pname">
       </div>  
        <div class="inputfield">
          <label>Product Price</label>
          <input type="text" class="input" name="price">
       </div>     
       <div class="inputfield">
          <label>Product Images</label>
          <input type="file" class="input" name="insertpic">
       </div>     
      <div class="inputfield">
          <label>ISBN No.</label>
          <input type="text" class="input" name="isbn">
       </div> 
      <div class="inputfield">
          <label>Author</label>
          <input type="text" class="input" name="author">
       </div> 
       <div class="inputfield">
          <label>Category / Genre</label>
           <input type="text" class="input" name="genre">
       </div> 
       <div class="inputfield">
          <label>Seller</label>
          <input readonly type="text" class="input" name="seller_name" value ="<?php echo $_SESSION['username']; ?>">  
       </div>  
      <div class="inputfield">
        <input type="submit" value="Add Product" name="button_add" class="btn">
      </div>
    </div>
    </form>
</div>	

    
</body>
</html>