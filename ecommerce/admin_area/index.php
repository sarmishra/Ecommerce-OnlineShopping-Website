<?php

session_start();

if(!isset($_SESSION['user_email'])){

echo "<script> window.open('login.php?not_admin=You are not an Admin!','_self')</script>";

}

else{

?>



<!DOCTYPE>

<html>

 <head>

 	<title>This is Admin Panel</title>

 	<link rel="stylesheet"  href="styles/style.css" media="all" />

 </head>


<body> 

<div class="main_wrapper">

	<div id="header"><br> <!--<p style="margin-left:300; font-size:30;color:#d05454; ">This is Admin Pannel <br> Manage Your Content </p>--> </div>

		<div id="right">

			<h2 style="text-align:center;">Manage Content</h2>

			<a href="index.php?insert_product">Insert Product</a>
			<a href="index.php?view_products">View All Products</a>
			<a href="index.php?insert_cat">Insert New Category</a>
			<a href="index.php?view_cats">View All Categories</a>
			<a href="index.php?insert_brand">Insert New Brand</a>
			<a href="index.php?view_brands">View All Brands</a>
			<a href="index.php?view_customers">View Customers</a>
			<a href="index.php?view_orders">View Orders</a>
			<a href="index.php?view_payments">View Payments</a>
			<a href="logout.php">Admin Logout</a>

		</div>
         <div id="left">

         	
                <?php

                    global $con;

                    if(!isset($_GET['insert_product'])){
                    	if(!isset($_GET['view_products'])){
                    		if(!isset($_GET['edit_pro'])){
                    			if(!isset($_GET['insert_cat'])){
                    		    	if(!isset($_GET['view_cats'])){
                    		    		if(!isset($_GET['edit_cat'])){
                    		    			if(!isset($_GET['insert_brand'])){
                    		    				if(!isset($_GET['view_brands'])){
                    		    					if(!isset($_GET['edit_brand'])){
                    		    						if(!isset($_GET['view_customers'])){
                    		    							if(!isset($_GET['view_orders'])){






	

                           echo "<h1 style=' align:center; color:orange; padding:15px;'> <p style='margin-left:320px;'>WELCOME  <p style='margin-left:380px;'>TO </p> <p style='margin-left:300px;'>ADMIN AREA:</h1>";
                           echo "<h2 style=' align:center; color:orange; padding:10px; margin-left:200px;'> You Can Manage Your Content Here</h2>";

                          } 
      
      					  }
                         }
                        }
                       }
                   }
               }
           }
       }

   }

}
                ?>


			<?php

			if(isset($_GET['insert_product'])){

				include("insert_product.php");

			}


			if(isset($_GET['view_products'])){

				include("view_products.php");

			}

			if(isset($_GET['edit_pro'])){

				include("edit_pro.php");

			}


			if(isset($_GET['insert_cat'])){

				include("insert_cat.php");

			}


			if(isset($_GET['view_cats'])){

				include("view_cats.php");

			}


			if(isset($_GET['edit_cat'])){

				include("edit_cat.php");

			}

			if(isset($_GET['insert_brand'])){

				include("insert_brand.php");

			}


			if(isset($_GET['view_brands'])){

				include("view_brands.php");

			}


			if(isset($_GET['edit_brand'])){

				include("edit_brand.php");

			}


			if(isset($_GET['view_customers'])){

				include("view_customers.php");

			}

			


			if(isset($_GET['view_orders'])){

				include("view_orders.php");

			}
  
  

			?>


		</div>






</div>


</body>

</html>

<?php } ?>