<?php
session_start();
include("../database/dbConnect.php");
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
  $query_run = mysqli_query($conn,$query);

  if($query_run)
  {
    header("location: seller_display-product.php");
  }
  else
  {
    echo"Not Updated Successfully";
  }
}


if(isset($_POST['button_delete']))
{
  $id = $_POST['delete_id'];

  $del = "DELETE FROM product WHERE id = '$id' ";

  if($del_run)
  {
    header("location: seller_display-product.php");
  }
  else
  {
    echo"Not Deleted";
  }
}

$id = $_GET["id"];
mysqli_query($conn,"delete from product where id = $id");
?>

<script type="text/javascript">
  window.location ="seller_display-product.php";
</script>