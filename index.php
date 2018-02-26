<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
?>
<html>
   <head>
    
	   <link rel="stylesheet" href="styles/style.css" />
	</head>
	<body>
	    <div class="main_wrapper">
			<div class="header_wrapper">
			  <img id="logo" src="images/1.png">
			  <img id="banner" src="images/2.jpg">
			</div>
			<div class="menubar">
			  <ul id="menu">
			  <li><a href="index.php">Home</a></li>
			  <li><a href="all_product.php">All Product</a></li>
			  <li><a href="customer/my_account.php">My account</a></li>
			  <li><a href="#">Sign up</a></li>
			  <li><a href="cart.php">Shooping cart</a></li>
			  <li><a href="#">Contact us</a></li>
			  </ul>
			   <div id="form">
			   <form method="get" action="results.php" enctype="multipart/form-data">
			    <input type="text" name="user_query" placeholder="search a product"/>
				<input type="submit" name="search" value="Search"/>
			   </form>
			  </div>
			</div>
	        <div class="content_wrapper"> 
			   <div id="sidebar"> 
			     <div id="sidebar_tittle">Categories</div>
			     <ul id="cats">
				  <?php getCats();?>
				 </ul>
				  <div id="sidebar_tittle">Brands</div>
			     <ul id="cats">
				 <?php getBrands();?>
				 
				 </ul>
			   </div>
			    <div id="content_area">
				<?php cart();?>
				<div id="shopping_cart">
				 <span style="float:right; font-size:18px; padding:5px;height-lenght:40px">
				<?php 
					if(isset($_SESSION['customer_name'])){
					 
					echo "<b>Welcome:</b>" . $_SESSION['customer_name'] . "<b style='color:yellow;'>Your</b>" ;
					}
					else {
					echo "<b>Welcome Guest:</b>";
					}
					?>
					
					<b style="color:yellow">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?> <a href="cart.php" style="color:yellow">Go to Cart</a>
					<?php
				 if(!isset($_SESSION['customer_email']))
				 {
					 echo "<a href='checkout.php'>Login</a>";
				 }
				 else
				 {
					echo "<a href='logout.php'>Logout</a>";
				 } 
				
				 
				 ?>
				 </span>
				</div>
				<div id="products_box">
				<?php getPro();?>
				<?php getCatPro();?>
				<?php getBrandPro();?>
				</div>
	       </div>
	      <div id="footer">
		  <h2 style="text-align:center;padding-top:30px;">$copy; 2017 by Shweta Jacker</h2>
		  </div>
	  </div>
	</body>
</html>
	   