<!DOCTYPE>

<?php
session_start();

include ("functions/functions.php");
include("includes/db.php");

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

                                    <form action="customer_register.php" method="post" enctype="multipart/form-data">


                                      <table align="center" width="400" height="430" bgcolor="skyblue">

                                        <tr align="center">

                                          <td colspan="8"><h2 style="color:green;">Create an Account</h2></td>

                                        </tr>

                                        <tr>

                                          <td align="right"><p style="color:green">Customer Name:</p></td>
                                          <td><input type="text" name="c_name" required/></td>

                                        </tr> 

                                        <tr>

                                          <td align="right"><p style="color:green">Customer Email:</p></td>
                                          <td><input type="text" name="c_email" required/></td>

                                        </tr> 

                                        <tr>

                                          <td align="right"><p style="color:green">Customer Password:</p></td>
                                          <td> <input type="password" name="c_pass" required /></td>

                                        </tr> 

                                         <tr>

                                          <td align="right"><p style="color:green">Customer Image:</p></td>
                                          <td> <input type="file" name="c_image" required /></td>

                                        </tr> 


                                        <tr>

                                          <td align="right"><p style="color:green">Customer Country:</p></td>
                                          <td>

                                            <select name="c_country">

                                               <option>Select a Country</option>
                                              <option>Nepal</option>
                                              <option>Japan</option>
                                              <option>Canada</option>
                                              <option>Pakistan</option>
                                              <option>Israel</option>
                                              <option>India</option>
                                              <option>UAE</option>
                                              <option>US</option>
                                             
                                            </select>

                                          </td>

                                        </tr> 

                                        <tr>

                                          <td align="right"><p style="color:green">Customer City:</p></td>
                                          <td><input type="text" name="c_city" required/></td>

                                        </tr> 

                                         <tr>

                                          <td align="right"><p style="color:green">Customer Contact:</p></td>
                                          <td><input type="text" name="c_contact" required/></td>

                                        </tr> 

                                         <tr>

                                          <td align="right"><p style="color:green">Customer Address:</p></td>
                                          <td><input type="text" name="c_address" required/></td>

                                        </tr> 

                                        <tr align="center">

                                        <td colspan="8"><input type="submit" name="register" value="Create Account"/></td>


                                        </tr>


                                     </table>

                                    </form>
 

                               </div>
                       </div>



          	         <div id="footer"> 

                      <h2 style="text-align:center; padding-top:30px;"> <!-- put here footer note --></h2>

                      </div>

</div>


    </body>


</html>




<?php

global $con;

if(isset($_POST['register'])){

  $ip=getIp();

  $c_name=$_POST['c_name'];
   $c_email=$_POST['c_email'];
    $c_pass=$_POST['c_pass'];
     $c_image=$_FILES['c_image']['name'];
     $c_image_tmp=$_FILES['c_image']['tmp_name'];
      $c_country=$_POST['c_country'];
       $c_city=$_POST['c_city'];
        $c_contact=$_POST['c_contact'];
         $c_address=$_POST['c_address']; 
          


         move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

        $insert_c = "insert into customers
        (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values
          ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";

            $run_c=mysqli_query($con,$insert_c);

            
            $sel_cart= "select * from cart where ip_add='$ip' ";

            $run_cart=mysqli_query($con,$sel_cart);

            $check_cart=mysqli_num_rows($run_cart);

            
                

  
            if($check_cart==0){

              $_SESSION['customer_email']=$c_email;

              echo "<script>alert('Account has been created successfully,Thanks!')</script>";
              echo "<script>window.open('customer/my_account.php','_self')</script>";

            }
 
            else{


              $_SESSION['customer_email']=$c_email;

              echo "<script>alert('Account has been created successfully,Thanks!')</script>";
              echo "<script>window.open('checkout.php','_self')</script>";


            }
        }
 

?>