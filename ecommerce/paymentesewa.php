<!DOCTYPE>

<?php

session_start();

include ("functions/functions.php");

?>

<html>
    <head>

             <title> Online Home Appliances</title>


                 <link rel="stylesheet" href="styles/style.css" media="all" />

    </head>

     <body>
      
      <!-- main continer start here-->

     	<div class="main_wrapper">

             <!-- Header start here -->     

            <div class="header_wrapper"> 

          	<a href="index.php"><img id="logo" src="images/logo.png" ></a>
           
            </div>

              <!-- Header end here-->

              <!--Navigation bar Start here-->

                    <div class="menu_bar" >
                    
                      <ul id="menu">
                    
                    <li> <a href="index.php"> Home</a>  </li>
                     <li> <a href="all_products.php"> All Products</a>  </li>
                      <li> <a href="customer/my_account.php"> My Accounts</a>  </li>
                       <li> <a href="customer_register.php"> Sign Up</a>  </li>
                        <li> <a href="cart.php"> Shopping Cart</a>  </li>
                         <li> <a href="contacts.php"> Contact Us</a>  </li>
                    
                    </ul>

                    <div id="form">

                    <form method="get"  action="results.php" enctype="multipart/form-data">
                      <input type="text" name="user_query" placeholder="Search a Product"/>
                      <input type="submit" name="search" value="search"/>
                    </form>

                    </div>

   		             </div>

                         <!--Navigation bar closed here-->
 
                       <div class="content_wrapper">

          	                   <div id="sidebar" >

                                <div id="sidebar_title">Categories</div>

                                <ul id="cats">

                                    <?php  getCats();   ?>

                                </ul>

                                <div id="sidebar_title">Brands</div>

                                <ul id="cats">

                                  <?php getBrands(); ?> 

                                </ul>

                               </div>

          	                   <div id="content_area" >

                                      <?php cart(); ?>

                                       <div id="shopping_cart">

                                        <span style="float:right; font-size:16px; padding:5px; line-hight:40px;">


                                          <?php

                                          if(isset($_SESSION['customer_email'])){

                                            echo "<b>Welcome: </b>"  .  $_SESSION['customer_email'] . "<b style='color:yellow;'> Your</b>";

                                          }

                                          else{

                                            echo "<b>Welcome Guest!</b>";

                                          }

                                          ?>


                                          <b style="color:yellow"> Shooping Cart -</b> Total Item: <?php total_items(); ?>  Total Price:  <?php total_price(); ?> <a href="cart.php" style="color:yellow">Go to Cart</a>


                                          <?php

                                          if(!isset($_SESSION['customer_email'])){

                                            echo "<a href='checkout.php' style='color:yellow;'>Login</a>";

                                          }

                                          else{

                                            echo "<a href='logout.php' style='color:yellow'>Logout</a> ";

                                          }


                                          ?>


                                        </span>

                                       </div>

                                    <div id="product_box">




                                     <h2 style="text-align:center;">Sign In Your esewa Account</h2>

<form action="" method="post">

  <table align="center" width="400" height="130" bgcolor="pink">

<tr>

<td align="right"><b>Enter UserID:</b></td>
<td><input type="text" name="user_id" required ><br></td>
</tr>

<tr>
<td align="right"><b>Enter Password:</b></td>
<td><input type="password" name="pass" required><br></td>
</tr>



<tr align="right">
<td colspan="3"><input type="submit" name="pay_now" value="Pay Now"/></td>
</tr>


</table>


</form>




<?php



include("includes/db.php");
 
if(isset($_POST['pay_now'])){

  
$user=$_SESSION['customer_email'];
$email_id=$_POST['user_id'];
$pass=$_POST['pass'];



$sel_payment="select * from payment where email_id='$email_id' AND password='$pass' ";

$run_payment=mysqli_query($con,$sel_payment);

 $check_payment=mysqli_num_rows($run_payment);

 if($check_payment==0){

  echo "<script>alert('Password or Email is incorrect, plz try again!')</script>";
exit();

 }



 else{

  
  echo  "<script>alert('Your payment updated successfully!')</script> ";
  echo "<script>window.open('paysucess.php','_self')</script>";



 }

}



 ?>
<br><br><br>


                                    </div>


                               </div>
                       </div>



          	         <div id="footer"> 

                      <h2 style="text-align:center; padding-top:30px;"> <!-- put here footer note --></h2>

                      </div>

</div>


    </body>


</html>