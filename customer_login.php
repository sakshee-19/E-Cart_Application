<?php
session_start();
include("include/dp.php");

?>
          <div>
					  <form method="post" action="">
						 <table width="1000" align="center" bgcolour="grey">
						 
						 <tr>
							<td align="right"><b> Name:</b></td>
							<td><input  type="text" name="name" placeholder="enter name"/></td>
						 </tr>
						 <tr>
							<td align="right"><b> Email:</b></td>
							<td><input  type="text" name="email" placeholder="enter email"/></td>
						 </tr>
						 <tr>
							<td align="right"><b> Password:</b></td>
							<td><input  type="password" name="pass" placeholder="enter password"/></td>
						 </tr>
						 <td><a href="checkout.php?forget_pass"> Forget Password</a></td>
						 <tr>
						 </tr>
						 <tr align="center">
							
							<td><input  type="submit" name="login" placeholder="Login"/></td>
						 </tr>
						 </table>
						 <h2 style="float:left;"><a href="customer_register.php"> New Register</a></td>
						 </form>
               </div>
			   <?php
			
			     if(isset($_POST['login']))
				 {  
			         $c_name=$_POST['name'];
					 $c_email=$_POST['email'];
					 $c_pass=$_POST['pass'];
					 
					 $sel_c="select * from customers where customer_pass='$c_pass' AND customer_email='$c_email' AND customer_name='$c_name'";
					 $run_c=mysqli_query($con,$sel_c);
					 $check_customer=mysqli_num_rows($run_c);
					 
					 if($check_customer==0)
					 {
						 echo "<script> alert('password or email is not correct')</script>";
					 }
					 $ip=getIp();
					 $sel_cart="select * from cart where ip_add='$ip'";
					  $run_cart=mysqli_query($con,$sel_cart);
					  $check_cart=mysqli_num_rows($run_cart);
				      if($check_customer>0 AND $check_cart==0)
					  {
						 $_SESSION['customer_email']=$c_email; 
						 $_SESSION['customer_name']=$c_name; 
						
						echo "<script>alert('You logged in successfully, Thanks!')</script>";
						echo "<script>window.open('customer/my_account.php','_self')</script>";
						
					  }
					else if($check_customer>0 AND $check_cart>0) {
						  $_SESSION['customer_email']=$c_email;
                          $_SESSION['customer_name']=$c_name; 						  
						  echo "<script>alert('You logged in successfully, Thanks!')</script>";
						  echo "<script>window.open('payment.php','_self')</script>";
						
						}
					else{
						echo "<script>alert('Please try again')</script>";
						echo "<script>window.open('checkout.php','_self')</script>";
					}
				 }
			   ?>