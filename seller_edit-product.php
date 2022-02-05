<?php
session_start();
include("./database/dbConnect.php");
if(isset($_SESSION['username'])){

} else {
  header("location: seller_login.php");
}



if(isset($_POST['button_edit']))
{
  $edit_id = $_POST['edit_id'];
  $edit_pname = $_POST['edit_pname'];
  $edit_price = $_POST['edit_price'];
  $edit_isbn = $_POST['edit_isbn'];
  $edit_author = $_POST['edit_author'];
  $edit_genre = $_POST['edit_genre'];

   $query = "UPDATE product SET pname='$edit_pname', pprice='$edit_price',isbn='$edit_isbn' , author='$edit_author', genre='$edit_genre' WHERE id = '$edit_id' ";
    $query_run = $conn->query($query); 
    if($query_run==true)
    {
      $message="Product Updated Successfully.";
      echo "<script type='text/javascript'>alert('$message');</script>";  
      header("location: seller_display-product.php");

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
    <style type="text/css">
    .wrapper .form .inputfield .update{
  width: 50%;
   padding: 8px 10px;
  font-size: 15px; 
  border: 0px;
  background: #008CBA;
  color: #fff;
  cursor: pointer;
  border-radius: 3px;
  outline: none;
}
    .wrapper .form .inputfield .cancel
    {    width: 50%;
   padding: 8px 10px;
  font-size: 15px; 
  border: 0px;
  background: #f44336;
  color: #fff;
  cursor: pointer;
  border-radius: 3px;
  outline: none;
  text-align: center;
}

    </style>
</head>
<body>
   <?php
    include('seller_nav.php');
  ?>

  

    <div class="wrapper">
    <div class="title">
      Update Product Details
    </div>

    <?php 
      if(isset($_POST['button_edit']))
      {
        $id = $_POST['edit_id'];
        $query = "SELECT * FROM product WHERE id = '$id'";
        $query_run = mysqli_query($conn,$query);

        foreach ($query_run as $row) 
        {
    ?>

    <form action="seller_edit-product.php" method="post" enctype="multipart/form-data">
    <div class="form">
      <div class="inputfield">
          <input type="hidden" class="input" name="edit_id" value="<?php echo $row['id']; ?>">
       </div> 
       <div class="inputfield">
          <label>Product Name</label>
         <input type="text" class="input" name="edit_pname" value="<?php echo $row['pname']; ?>">
       </div>  
        <div class="inputfield">
          <label>Product Price</label>
        <input type="text" class="input" name="edit_price"  value="<?php echo $row['pprice']; ?>">
       </div>     
       <div class="inputfield">
          <label>Product Images</label>
         <input type="file" class="input" name="edit_pimg"  value="<?php echo $row['image_name']; ?>" disabled>
       </div>     
      <div class="inputfield">
          <label>ISBN No.</label>
         <input type="text" class="input" name="edit_isbn"  value="<?php echo $row['isbn']; ?>">
       </div> 
      <div class="inputfield">
          <label>Author</label>
       <input type="text" class="input" name="edit_author"  value="<?php echo $row['author']; ?>">
       </div> 
       <div class="inputfield">
          <label>Category / Genre</label>
           <input type="text" class="input" name="edit_genre"  
           value="<?php echo $row['genre']; ?>">
       </div> 
       <div class="inputfield">
          <label>Seller</label>
          <input readonly type="text" class="input" name="seller_name" value ="<?php echo $_SESSION['username']; ?>">  
       </div>  
      <div class="inputfield">
        <input type="submit" value="UPDATE" name="button_edit" class="update">
        <a href="seller_display-product.php" class="cancel">CANCEL</a>
      </div>
    </div>
    </form>




    <?php 
        }
      }

    ?>



    
</div>  

    
</body>
</html>