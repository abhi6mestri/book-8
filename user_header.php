<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
		    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="./css/user/user_header.css" />  
    <style type="text/css">
      /* header 2 start */


.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 70px;
  padding: 15px;
}

.header__left {
  display: flex;
  align-items: center;
}

.header .header__left p {
  font-size: 1rem;
}

/* search bar start */

.search
{
  width: 50%;
  border: 2px solid #CF5C3F;
  overflow: auto;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
}

.search input[type="text"]
{
  border: 0px;
  width: 67%;
  padding: 10px 10px;
}

.search input[type="text"]:focus
{
  outline: 0;
}

.search input[type="submit"]
{
  border: 0px;
  background: none;
  background-color: #CF5C3F;
  color: #000;
  float: right;
  padding: 10px;
  border-radius-top-right: 5px;
 
  border-radius-bottom-right: 5px;
 
        cursor:pointer;
}
.cart-logo
{
      width: 40px;
    height: 40px;
}
    .numberCircle {
    border-radius: 50%;
    width: 25px;
    height: 25px;
    padding: 6px;

    background: red;
    border: 0.5px solid #666;
    color: #fff;
    text-align: center;
float: right;
    font: 24px Arial, sans-serif;
}
/* ===========================
   ====== Medua Query for Search Box ====== 
   =========================== */

@media only screen and (min-width : 150px) and (max-width : 780px)
{
  {}
  .search
  {
    width: 100%;
    margin: 0 auto;
  }
  .search input[type="text"]
  {
    width: 80%;

  }
  .search input[type="submit"]
  {
    width: 20px;
  }

}


@media (max-width: 425px) {


  .header__left
  {
    display: none;
  }
   .numberCircle
   {
        width: 18px;
    height: 18px;
    font-size: 16px;
    margin-top: 0;
   }

}
    </style>
</head>
<body>
    <!-- Header Starts -->
    <div class="header">
      <div class="header__left">
          <p>Hello cccccccccccccccccccccccccccccc</p>
        
      </div>

     
                <div class="search">
        <form class="search-form">
          <input type="text" placeholder="Search for books">
          <input type="submit" value="Q">
        </form>
      </div>


   

      <div class="header__icons">
        <span class="numberCircle">30<a href="cart.html"><img src="../images/shopping-cart.png" class="cart-logo"></a> </span>
      </div>
    </div>
    <!-- Header Ends -->
</body>
</html>