<?php

include("./database/dbConnect.php");
/*
if(isset($_POST['validate_book']))
{
  if(isset($_SESSION['username']))
  {
    header("Location: user_books.php"); 
  }
  else
  {
    header("Location: user_login.php");
  }
}
*/

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/user_nav.css">
</head>
<body>
<header>
	<nav class="navbar">
        <a href="index.php" class="logo"><img src="./images/library.png"></a>
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
          <ul>
            <li><a href="./index.php">Home</a></li>
         <!--   
         <li>
          <form action='' method='post' enctype="multipart/form-data">
            <button type="submit" name="validate_book" class="validate_book">Books</button>
          </form>
         </li>
       -->
           
          <li><a href="./user_books.php">Books</a></li> 
         <!-- <li><a href="./user_rent-books.php">Rent Books</a></li> --> 
          
            &nbsp;&nbsp;&nbsp;&nbsp;

            <?php
              
            	if(isset($_SESSION['username'])){
echo '<li><a href="user_logout.php" class = "user-header-logout">Logout</a></li>'; 
            	}
            	else
            	{
echo '<li><a href="user_login.php" class = "user-header-login">Login</a></li>'; 

            	}
               
            ?>
           
           
            
           
          </ul>
          <script type="text/javascript">
              const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})
          </script>
        </div>
      </nav><!-- navbar -->
      </header>
      
</body>
</html>