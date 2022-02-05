<?php
session_start();
include("./database/dbConnect.php");


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="./css/home.css">

	<title></title>
</head>
<body>
		
	<?php
    include('user_nav.php');
  ?>

   <!-- SECTION 1 -->

      <section class="first">
      	<div class="circle"></div>
      	<div class="content">
	<div class="textBox">
		<h2>When you <span>READ</span>,<br>Someone else get inspired.</h2>
		<a href="#">Start Exploring Now</a>
	</div>
	<div class="imgBox">
		<img src="./images/ClipartKey_50145.png" class="starbucks">
	</div>
	</div>
      </section>



   <!-- SECTION 2 -->
   
  <div class="section-2">
     <h2 class="section-2-heading">POPULAR BOOKS</h2>   
  <!-- conatiner for all images -->
  <div class="gallery-container">


    <!-- creating galeery card -->
    <div class="gallery-card">
      <div class="gallery-iamge">
      <img src="./images/home/One-Hundred-Years-of-Solitude.jpg" class="image">
     
    </div>
    <div class="gallery-text">
       <h1 class="text">One Hundred Years of Solitude</h1>
    </div>
    </div>
    <!-- Ending Gallery Card -->

      <!-- creating galeery card -->
    <div class="gallery-card">
      <div class="gallery-iamge">
      <img src="./images/home/Hamlet.jpg" class="image">
    </div>
    <div class="gallery-text">
      <h1 class="text">Hamlet</h1>

    </div>
    </div>
    <!-- Ending Gallery Card -->

      <!-- creating galeery card -->
    <div class="gallery-card">
      <div class="gallery-iamge">
      <img src="./images/home/War-Peace.jpg" class="image">
    </div>
    <div class="gallery-text">
      <h1 class="text">War & Peace</h1>
    </div>
    </div>
    <!-- Ending Gallery Card -->

          <!-- creating galeery card -->
    <div class="gallery-card">
      <div class="gallery-iamge">
      <img src="./images/home/HarryPotter-and-the-Philosophers-Stone.jpg" class="image">
    </div>
    <div class="gallery-text">
      <h1 class="text">Harry Potter and the Philosopher's Stone</h1>
    </div>
    </div>
    <!-- Ending Gallery Card -->

          <!-- creating galeery card -->
    <div class="gallery-card">
      <div class="gallery-iamge">
      <img src="./images/home/Don-Quixote.jpg" class="image">
    </div>
    <div class="gallery-text">
      <h1 class="text">Don Quixote</h1>
    </div>
    </div>
    <!-- Ending Gallery Card -->

          <!-- creating galeery card -->
    <div class="gallery-card">
      <div class="gallery-iamge">
      <img src="./images/home/HarryPotter-and-the-Sorcerers-Stone.jpg" class="image">
    </div>
    <div class="gallery-text">
      <h1 class="text">Harry Potter and the Sorcerer's Stone </h1>
    </div>
    </div>
    <!-- Ending Gallery Card -->

     <!-- creating galeery card -->
    <div class="gallery-card">
      <div class="gallery-iamge">
      <img src="./images/home/Lord-of-the-Rings.jpg" class="image">
    </div>
    <div class="gallery-text">
      <h1 class="text">Lord of the Rings</h1>
    </div>
    </div>
    <!-- Ending Gallery Card -->

     <!-- creating galeery card -->
    <div class="gallery-card">
      <div class="gallery-iamge">
      <img src="./images/home/In-Search-of-Lost-Time_Proust.jpg" class="image">
    </div>
    <div class="gallery-text">
      <h1 class="text">In Search of Lost Time</h1>
    </div>
    </div>
    <!-- Ending Gallery Card -->
  </div>

</div> <!-- section-2 end -->

<!-- section-3 start -->

<div class="section-3">
  <div class="section-3-container">
    
    <h2><span class="section-3-des">
      <img src="./images/PngItem_5614405.png" style="width: 80px;" "height:80px;">
    Don't Want to buy Books , Here's another option just</span></h2>
            <input type="submit" name="validate_book" class="section-3-btn" onclick="location.href='user_rent-books.php';" value="RENT ITTTT !!!!!!!!!">
    
  </div>
</div>
  <!-- section-3 end -->

<!-- FOOTER START -->
<div class="footer">
    <p class="footer-left"> </p>
  <div class="footer-right">
  <a href="seller_login.php">SELLER</a>
  <a href="admin_login.php">ADMIN</a>

</div>
</div>


<!-- END OF FOOTER -->
		
</body>
</html>