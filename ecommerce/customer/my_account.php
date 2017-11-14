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

          	<a href="../index.php"><img id="logo" src="images/logo.png" ></a>
           
            </div>

              <!-- Header end here-->

              <!--Navigation bar Start here-->

                    <div class="menu_bar" >
                    
                      <ul id="menu">
                    
                    <li> <a href="../index.php"> Home</a>  </li>
                     <li> <a href="../all_products.php"> All Products</a>  </li>
                      <li> <a href="my_account.php"> My Accounts</a>  </li>
                       <li> <a href="../customer_register.php"> Sign Up</a>  </li>
                        <li> <a href="../cart.php"> Shopping Cart</a>  </li>
                         <li> <a href="../#"> Contact Us</a>  </li>
                    
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

                                <div id="sidebar_title">My Account</div>

                                <ul id="cats">

                                  <?php
                                  if (isset($_SESSION['customer_email'])) {
                                    

                                  $user=$_SESSION['customer_email'];

                                  $get_img="select * from customers where customer_email='$user'";

                                  $run_img=mysqli_query($con,$get_img);

                                  $row_img=mysqli_fetch_array($run_img);

                                  $c_image=$row_img['customer_image'];
                                  $c_name=$row_img['customer_name'];

                                  echo "<p style='align:center;'><img src='customer_images/$c_image' width='130' height='130'/></p> ";
                                }
                                  ?>

                                  <li><a href="my_account.php?my_orders">My Orders</a></li>
                                  <li><a href="my_account.php?edit_account">Edit Account</a></li>
                                  <li><a href="my_account.php?change_pass">Change Password</a></li>
                                  <li><a href="my_account.php?delete_account">Delete Account</a></li>
                                   <li><a href="logout.php">Logout</a></li>

                                </ul>

                              </div>
                               

          	                   <div id="content_area" >

                                      <?php cart(); ?>

                                       <div id="shopping_cart">

                                        <span style="float:right; font-size:16px; padding:5px; line-hight:40px;">


                                          <?php


                                          if(isset($_SESSION['customer_email'])){

                                            echo "<b>Welcome: </b>"  .  $_SESSION['customer_email'] ;

                                          }

                                      
                                          ?>

                                        
                                        <?php

                                          if(!isset($_SESSION['customer_email'])){

                                            echo "<a href='../checkout.php' style='color:yellow;'>Login</a>";

                                          }

                                          else{

                                            echo "<a href='../logout.php' style='color:yellow'>Logout</a> ";

                                          }


                                          ?>


                                        </span>

                                       </div>

                                    <div id="product_box">


                                     
                                      <?php

                                      global $con;

                                      if(!isset($_GET['my_orders'])){
                                         if(!isset($_GET['edit_account'])){
                                           if(!isset($_GET['change_pass'])){
                                             if(!isset($_GET['delete_account'])){



                                        if (isset($c_name)) {
                                        echo "<h2 style='padding:15px; color:orange;'> Welcome: $c_name </h2>";
                                         
                                        }


                                      echo "<p style='margin-left:100px;'><b> You can see your orders progress by clicking this <a href='my_account.php?my_orders'>Link</a></b></p>";

                                      
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



          	         <div id="footer"> 

                      <h2 style="text-align:center; padding-top:30px;"> <!-- put here footer note --></h2>

                      </div>

</div>


    </body>


</html>