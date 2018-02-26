<!DOCTYPE>
<?php
session_start();
include("../functions/functions.php");
include("dp.php");
?>
<html>
   <head>
    
	   <link rel="stylesheet" href="style.css" />
	</head>
	<body>
	    <div class="main_wrapper">
			<div class="header_wrapper">
			  <img id="logo" src="../images/1.png">
			  <img id="banner" src="../images/2.jpg">
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
		<!--Content wrapper starts-->
		<div class="content_wrapper">
		
			<div id="sidebar">
			
				<div id="sidebar_title">My Account:</div>
				
				<ul id="cats">
				<?php 
				$user = $_SESSION['customer_email'];
				
				$get_img = "select * from customers where customer_email='$user'";
				
				$run_img = mysqli_query($con, $get_img); 
				
				$row_img = mysqli_fetch_array($run_img); 
				
				$c_image = $row_img['customer_image'];
				
				$c_name = $row_img['customer_name'];
				
				echo "<p style='text-align:center;'><img src='customer_image/$c_image' width='150' height='150'/></p>";
				
				?>
				<li><a href="my_account.php?my_orders">My Orders</a></li>
				<li><a href="my_account.php?edit_account">Edit Account</a></li>
				<li><a href="my_account.php?change_pass">Change Password</a></li>
				<li><a href="my_account.php?delete_account">Delete Account</a></li>
				<li><a href="logout.php">Logout</a></li>
				
				<ul>
				
				</div>
					
		
			<div id="content_area">
			
			<?php cart(); ?>
			
			<div id="shopping_cart"> 
					
					<span style="float:right; font-size:17px; padding:5px; line-height:40px;">
					
					<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'] ;
					
					}
					?>
					
					
					<?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='checkout.php' style='color:orange;'>Login</a>";
					
					}
					else {
					echo "<a href='logout.php' style='color:orange;'>Logout</a>";
					}
					
					
					
					?>
					
					
					
					</span>
			</div>
			
				<div id="products_box">
				
				
				
				<?php 
				if(!isset($_GET['my_orders'])){
					if(!isset($_GET['edit_account'])){
						if(!isset($_GET['change_pass'])){
							if(!isset($_GET['delete_account'])){
							
				echo "
				<h2 style='padding:20px;'>Welcome:  $c_name </h2>
				<b>You can see your orders progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
				}
				}
				}
				}
				?>
				
				<?php 
				if(isset($_GET['edit_account'])){
				include("edit_account.php");
				}
				if(isset($_GET['change_pass'])){
				include("change_pass.php");
				}
				if(isset($_GET['delete_account'])){
				include("delete_account.php");
				}
				
				
				?>
				
				</div>
			
			</div>
		</div>
		<!--Content wrapper ends-->
		
		
		
		<div id="footer">
		  <h2 style="text-align:center;padding-top:30px;">$copy; 2017 by Shweta Jacker</h2>
		  </div>
	  </div>
	</body>
</html>
	   