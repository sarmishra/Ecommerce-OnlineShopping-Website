<!DOCTYPE>

<?php

if(!isset($_SESSION['user_email'])){

echo "<script> window.open('login.php?not_admin=You are not an Admin!','_self')</script>";

}

else{

?>



<?php

include("includes/db.php");

if(isset($_GET['edit_pro'])){

$get_id=$_GET['edit_pro'];

$get_pro= "select * from products where product_id='$get_id'"; 

$run_pro=mysqli_query($con,$get_pro);



$row_pro=mysqli_fetch_array($run_pro);

	$pro_id=$row_pro['product_id'];
	$pro_title=$row_pro['product_title'];
	$pro_image=$row_pro['product_image'];
	$pro_price=$row_pro['product_price'];
	$pro_desc=$row_pro['product_desc'];
	$pro_keywords=$row_pro['product_keywords'];
	$pro_cat=$row_pro['product_cat'];
	$pro_brand=$row_pro['product_brand'];


	$get_cat="select * from categories where cat_id='$pro_cat'";
	$run_cat=mysqli_query($con,$get_cat);
	$row_cat=mysqli_fetch_array($run_cat);
	$category_title=$row_cat['cat_title'];

	

    $get_brand="select * from brands where brand_id='$pro_brand'";
	$run_brand=mysqli_query($con,$get_brand);
	$row_brand=mysqli_fetch_array($run_brand);
	$brand_title=$row_brand['brand_title'];


}

?>

<?php }  ?>



<html>
	
	<head>

		<title> Update Product </title>

		 
		
	</head>
	
<body bgcolor="white">

<form action="" method="post" enctype="multipart/form-data">

	<table align="center" width="795" border="2" bgcolor="#3faba4">

		<tr align="center">
			<td colspan="7"> <h2> Edit & Update Product </h2></td>
		</tr>

		<tr>
			<td align="right"> <b>Product Title: </b></td>
			<td> <input type="text" name="product_title" size="60" value="<?php echo $pro_title; ?>"/></td>
		</tr>

		<tr>
			<td align="right"><b>Product Categories:</b></td>
			<td>
			 <select name="product_cat" required>
			 	<option><?php echo $category_title; ?></option>

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
			 	<option><?php echo $brand_title; ?></option>

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
			<td> <input type="text" name="product_price" value="<?php echo $pro_price; ?>"/></td>
		</tr>

		<tr>
			<td align="right"> <b>Product Description:</b</td>
			<td> 

					<textarea name="product_desc"  cols="20" rows="8" ><?php echo $pro_desc; ?></textarea>

			</td>
		</tr>

		<tr>
			<td align="right"><b>Product Keywords:</b</td>
			<td> <input type="text" name="product_keywords" size="50" value="<?php echo $pro_keywords; ?>"/></td>
		</tr>

		<tr align="center">
		
			<td colspan="7"> <input type="submit" name="update_product" value="Update Product "/></td>
		</tr>


  	</table>

</form>

</body>

</html>		


<?php

if(isset($_POST['update_product'])){

//getting the text data frome the fields 

$update_id=$pro_id;
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


 $update_product= "update products set product_title='$product_title',product_cat='$product_cat',product_brand='$product_brand',product_price='$product_price',
 product_desc='$product_desc',product_keywords='$product_keywords',product_image='$product_image' where product_id='$update_id' ";

$run_product= mysqli_query($con, $update_product);

if($run_product){

	echo "<script>alert('Product Has been Updated!') </script>";
	echo "<script> window.open('index.php?view_products', '_self') </script>";
  }
 

}
  


?>

