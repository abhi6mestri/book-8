<?php
session_start();
include("./database/dbConnect.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

 <link rel="stylesheet" href="./css/checkout.css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){ 
     $('#check-address').click(function(){ 
     if ($('#check-address').is(":checked")) {
      $('#b_name').val($('#s_name').val());
      $('#b_email').val($('#s_email').val());
      $('#b_mobile').val($('#s_mobile').val());
      $('#b_pin').val($('#s_pin').val());
      $('#b_add1').val($('#s_add1').val());
      $('#b_add2').val($('#s_add2').val());
      $('#b_landmark').val($('#s_landmark').val());
      $('#b_city').val($('#s_city').val());
      $('#b_state').val($('#s_state').val());
 
     } else { //Clear on uncheck
      $('#b_name').val("");
      $('#b_email').val("");
      $('#b_mobile').val("");
      $('#b_pin').val("");
      $('#b_add1g').val("");
      $('#b_add2').val("");
      $('#b_landmark').val("");
      $('#b_city').val("");
      $('#b_state').val("");

     };
    });
 
   });
</script>

</head>
<body>
<form action="insert-order.php" method="post" enctype="multipart/form-data">
	<div class="flex-container">
    
    <div class="shipping">
      <div class="wrapper">
    <div class="title">
      Delivery Address
    </div>
    
    <div class="form">
       <div class="inputfield">
    
    <label><input type="hidden"></label></b></p>
       </div> 
         <div class="inputfield">
          <label>Country</label>
           <select name="s_country" value="select Country" id="s_country" class="input" required>
                <option value="india">India</option>
            </select>
          </div> 
        
       <div class="inputfield">
          <label>Name</label>
          <input type="text" class="input" name="s_name" id="s_name" placeholder="Enter Name" required oninvalid="this.setCustomValidity('Enter valid Username')">
       </div>  
        <div class="inputfield">
          <label>Email</label>
          <input type="text" class="input" name="s_email" id="s_email" placeholder="Enter Email - abc@abc.com " required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
       </div>     
       <div class="inputfield">
          <label>Mobile</label>
          <input type="text" class="input" name="s_mobile" id="s_mobile" placeholder="Enter Mobile Number" maxlength="10" pattern="\d{10}" autofocus required title="Please enter 10 digit number" required />
         </div>
      <div class="inputfield">
          <label>Pin Code</label>
           <input type="text" class="input" name="s_pin" id="s_pin" placeholder="Enter Pin Code" maxlength="6" pattern="\d{6}" autofocus required title="Please enter 6 digit pin code" required />
       </div> 
          
      <div class="inputfield">
          <label>House / Building </label>
          <input type="text" class="input" name="s_add1" id="s_add1" placeholder="Enter Building name" required>
       </div> 
       <div class="inputfield">
          <label>Area, Street, Sector</label>
           <input type="text" class="input" name="s_add2" id="s_add2" placeholder="Enter Area / Street" required>
       </div> 
       <div class="inputfield">
          <label>Landmark</label>
           <input type="text" class="input" name="s_landmark" id="s_landmark" placeholder="Enter Nearest Landmark" required>
       </div> 
       <div class="inputfield">
          <label>Town/City</label>
           <input type="text" class="input" name="s_city" id="s_city" placeholder="Enter City Name" required>
       </div> 
       <div class="inputfield">
          <label>State / Region</label>
           <input type="text" class="input" name="s_state" id="s_state" placeholder="Enter State" required>
       </div> 
    </div>

</div>  


    </div>  <!-- shipping -->


     <div class="billing">
 <div class="wrapper">
    <div class="title">
      Billing Address
    </div>
   
    <div class="form">
        <div class="inputfield">
    
    <label><input type="checkbox" value="" id="check-address">&nbsp;&nbsp;&nbsp;Same as billing?</label></b></p>
       </div> 
         <div class="inputfield">
          <label>Country</label>
           <select name="b_country" value="select Country" id="b_country" class="input" required>
                <option value="india">India</option>
            </select>
          </div> 
        
       <div class="inputfield">
          <label>Name</label>
          <input type="text" class="input" name="b_name" id="b_name" placeholder="Enter Name" required oninvalid="this.setCustomValidity('Enter valid Username')">
       </div>  
        <div class="inputfield">
          <label>Email</label>
          <input type="text" class="input" name="b_email" id="b_email" placeholder="Enter Email - abc@abc.com " required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
       </div>     
       <div class="inputfield">
          <label>Mobile</label>
          <input type="text" class="input" name="b_mobile" id="b_mobile" placeholder="Enter Mobile Number" maxlength="10" pattern="\d{10}" autofocus required title="Please enter 10 digit number" required />
         </div>
      <div class="inputfield">
          <label>Pin Code</label>
           <input type="text" class="input" name="b_pin" id="b_pin" placeholder="Enter Pin Code" maxlength="6" pattern="\d{6}" autofocus required title="Please enter 6 digit pin code" required />
       </div> 
          
      <div class="inputfield">
          <label>House / Building </label>
          <input type="text" class="input" name="b_add1" id="b_add1" placeholder="Enter Building name" required>
       </div> 
       <div class="inputfield">
          <label>Area, Street, Sector</label>
           <input type="text" class="input" name="b_add2" id="b_add2" placeholder="Enter Area / Street" required>
       </div> 
       <div class="inputfield">
          <label>Landmark</label>
           <input type="text" class="input" name="b_landmark" id="b_landmark" placeholder="Enter Nearest Landmark" required>
       </div> 
       <div class="inputfield">
          <label>Town/City</label>
           <input type="text" class="input" name="b_city" id="b_city" placeholder="Enter City Name" required>
       </div> 
       <div class="inputfield">
          <label>State / Region</label> 
           <input type="text" class="input" name="b_state" id="b_state" placeholder="Enter State" required>
       </div> 
    </div>

</div>  
    </div>  <!-- billing-->
<p class="heading"> * Incase of Cash On Delivery, make sure Delivery Address and Billing Address are same </p>
      <div class="confirm-order">
         <button type="submit" class="confirm-order-btn" name="m_order">Place your Order</button>
      </div>

</div><!-- flex-container-->
    
      </form>  
      <script type="text/javascript">

$(function(){

  $("#cb").click(function(){

if($("#cb").prop("checked")){

  $("#s_name").val($("#b_name").val());
  $("#s_email").val($("#b_email").val());
  $("#s_mobile").val($("#b_mobile").val());
  $("#s_pin").val($("#b_pin").val());
  $("#s_add1").val($("#b_add1").val());
  $("#s_add2").val($("#b_add2").val());
  $("#s_landmark").val($("#b_landmark").val());
  $("#s_city").val($("#b_city").val());
  $("#s_state").val($("#b_state").val());

}
else{
  $("#s_name").val("");
  $("#s_email").val("");
  $("#s_mobile").val("");
  $("#s_pin").val("");
  $("#s_add1").val("");
  $("#s_add2").val("");
  $("#s_landmark").val("");
  $("#s_city").val("");
  $("#s_state").val("");
}



  });


});
      </script>
</body>
</html>