<!DOCTYPE>

<?php

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

                                       <div id="shopping_cart">

                                        <span style="float:right; font-size:15px; padding:5px; line-hight:40px;">

                                          Welcome Guest! <b style="color:yellow"> Shooping Cart -</b> Total Item: Total Price:  <a href="cart.php" style="color:yellow">Go to Cart</a>

                                        </span>

                                       </div>

                                    <div id="product_box">

                                      <?php

                                      if(isset($_GET['search'])){

                                        $search_query=$_GET['user_query'];


                                     
                                     $get_pro=" select * from products where product_keywords like '%$search_query%'";

                                       $run_pro= mysqli_query($con,$get_pro);

                                       $count_cats=mysqli_num_rows($run_pro);

                                    if($count_cats==0){

                                                     echo " <h2 style='padding:20px'> No Products were Found!</h2>";
                                                        }

                                       while($row_pro=mysqli_fetch_array($run_pro)){

                                          $pro_id=$row_pro['product_id'];
                                          $pro_cat=$row_pro['product_cat'];
                                          $pro_brand=$row_pro['product_brand'];
                                          $pro_title=$row_pro['product_title'];
                                          $pro_price=$row_pro['product_price'];
                                          $pro_image=$row_pro['product_image'];

                                            echo "

                                              <div id='single_product'>
                                              
                                              <h3>$pro_title</h3>
                                              <img src='admin_area/product_images/$pro_image' width='180' hight='180'/>

                                              <p><b> Rs.$pro_price </b></p>

                                              <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>

                                              <a href='index.php?pro_id=$pro_id'> <button style='float:right;'>Add to Cart</button></a>


                                              </div>

                                            ";
                                          }

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