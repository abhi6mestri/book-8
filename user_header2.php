<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
		    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/user/user_header.css" />
    <style type="text/css">
      .header {
  flex-basis: 100%;
}

@media screen and (min-width: 400px) {
  .row {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
  }
  .header {
    flex: 1;
  }
  ._icons {
    flex: 2.5;
  }
  ._searchbar {
    flex: 5;
  }
  ._logo
  {
    display: none;
  }
  .numberCircle
  {
     width: 15px;
    height: 15px;
  }
  .numberCircle a img
  {
    float: right;
    width: 40px;
  }
}
/* Style */

body {
  font-family: 'Lato', sans-serif;
  font-size: 1.3em;
  margin-bottom: 20px;
}

.header {
  padding: 15px;
  border: 1px solid #666;
  margin: 5px 0;
  
}

main {
  max-width: 1200px;
  margin: 0 auto;
}
    .numberCircle {
    border-radius: 50%;
    width: 30px;
    height: 30px;
    padding: 6px;

    background: red;
    border: 0.5px solid #666;
    color: #fff;
    text-align: center;
float: right;
    font: 28px Arial, sans-serif;
}
.numberCircle a img
{
  float: right;
}


    </style>
</head>
<body>
     <!-- Header Starts -->
     <!--
    <div class="header">
      <div class="header__left">
          <p>Hello, </style> <span class="username" style="font-size: 2rem;"> 
       </span> </p>
        
      </div>

     
                <div class="search">
        <form class="search-form">
          <input type="text" placeholder="Search for books">
          <input type="submit" value="Q">
        </form>
      </div>


   
      
      <div class="header__icons">
        <div class="numberCircle">30</div>
   <a href="cart.html"><img src="../images/shopping-cart.png" style="height: 40px; width: 100px;">
    <span></span>
  </a>
      </div>
    </div>
    -->
    <!-- Header Ends -->


    <main>
  <div class="row">
    <div class="header _logo">
     <p>Hello, </style> <span class="username" style="font-size: 2rem;"> 
       </span> </p>
    </div>
    <div class="header _searchbar">
       <form class="search-form">
          <input type="text" placeholder="Search for books">
          <input type="submit" value="Q">
        </form>
    </div>
    <div class="header _icons">
        <span class="numberCircle">30
        <a href="cart.html"><img src="../images/shopping-cart.png" style="height: 40px; width: 70px;"> </a>
       </span>
   
    </div>
  </div>
</main>
</body>
</html>