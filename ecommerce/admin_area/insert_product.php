<!DOCTYPE>

<?php


include("includes/db.php");

if(!isset($_SESSION['user_email'])){

echo "<script> window.open('login.php?not_admin=You are not an Admin!','_self')</script>";

}

else
{


?>


<html>
	
	<head>

		<title> Inserting Products </title>

			
	</head>
	
<body bgcolor="white">

<form action="" method="post" enctype="multipart/form-data">

	<table align="center" width="795" border="2" bgcolor="#3faba4">

		<tr align="center">
			<td colspan="7"> <h2> Insert New Post Here </h2></td>
		</tr>

		<tr>
			<td align="right"> <b>Product Title: </b></td>
			<td> <input type="text" name="product_title" size="60" required/></td>
		</tr>

		<tr>
			<td align="right"><b>Product Categories:</b></td>
			<td>
			 <select name="product_cat" required>
			 	<option>Select a Category</option>

			 	<?php

			 		$get_cats= "select * from categories"; 

					$run_cats=mysqli_query($con,$get_cats);

					while ($raw_cats=mysqli_fetch_array($run_cats)) 
					{

					$cat_id=$raw_cats['cat_id'];
					$cat_title=$raw_cats['cat_title'];

    				echo "<option value='$cat_id'>$cat_title</option> ";
	
					}

			 	?>
 

			 </select>

			</td>
		</tr>

		<tr>
			<td align="right"> <b>Product Brand:</b</td>
			<td> 

 				<select name="product_brand" required>
			 	<option>Select a Brand</option>

			 	<?php

			 		$get_brands= "select * from brands"; 

					$run_brands=mysqli_query($con,$get_brands);

					while ($raw_brands=mysqli_fetch_array($run_brands)) {


					$brand_id=$raw_brands['brand_id'];
					$brand_title=$raw_brands['brand_title'];

    				echo "<option value='$brand_id'>$brand_title</option> ";
	
					}

			 	?>

			 </select>

			</td>
		</tr>

		<tr>
			<td align="right"><b>Product Image:</b</td>
			<td> <input type="file" name="product_image" required/></td>
		</tr>

		<tr>
			<td align="right"> <b>Product Price:</b</td>
			<td> <input type="text" name="product_price" required/></td>
		</tr>

		<tr>
			<td align="right"> <b>Product Description:</b</td>
			<td> 

					<textarea name="product_desc" cols="20" rows="8" ></textarea>

			</td>
		</tr>

		<tr>
			<td align="right"><b>Product Keywords:</b</td>
			<td> <input type="text" name="product_keywords" size="50" required/></td>
		</tr>

		<tr align="center">
		
			<td colspan="7"> <input type="submit" name="insert_post" value="Insert Product Now"/></td>
		</tr>


  	</table>

</form>

</body>

</html>		

<?php } ?>

<?php

if(isset($_POST['insert_post'])){

//getting the text data frome the fields 

$product_title= $_POST['product_title'];
$product_cat= $_POST['product_cat'];
$product_brand= $_POST['product_brand'];
$product_price= $_POST['product_price'];
$product_desc= $_POST['product_desc'];
$product_keywords =$_POST['product_keywords'];

//getting image from the fields

$product_image= $_FILES['product_image']['name'];
$product_image_tmp= $_FILES['product_image']['tmp_name'];
move_uploaded_file($product_image_tmp,"product_images/$product_image"); 


 $insert_product= "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values 
('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";

$insert_pro= mysqli_query($con, $insert_product);

if($insert_pro){

	echo "<script>alert('Product Has been Inserted!') </script>";
	echo "<script> window.open('index.php?view_products', '_self') </script>";
  }
 

}
  
?>

