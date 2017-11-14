
<?php


include("includes/db.php");




?>


<div>


<form method="post" action="" >

<table width="275" height="260" align="center" bgcolor="pink">

<tr align="center">

<td colspan="3"> <h2 style="color:green;"> Login or Register to Buy! </h2> </td>

</tr>

<tr>

<td align="right"><b><p style="color:green;">Email:</p></b></td>
<td><input type="text" name="email" placeholder="enter email" required/> </td>

</tr>

<tr>

<td align="right"><b> <p style="color:green;">Password:</p></b></td>
<td> <input type="password" name="pass" placeholder="enter password" required/> </td>

</tr>

<tr align="center">

<td colspan="3"><a href="checkout.php?forgot_pass" style="color:green;">Forgot Password?</a></td>

</tr>

<tr align="center">
<td colspan="3"> <input type="submit" name="login" value="Login" /></td>

</tr>

</table>

 <h3 style=" float:right; padding-right:315px;"><a href="customer_register.php" style="text-decoration:none; color:#578ebe">New? Register Here</a><h3>

</form>



<?php

if(isset($_POST['login'])){

$c_email= $_POST['email'];
$c_pass= $_POST['pass'];


$sel_c= "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";

$run_c= mysqli_query($con,$sel_c);

$check_customer= mysqli_num_rows($run_c);


if($check_customer==0){

echo "<script>alert('Password or Email is incorrect, plz try again!')</script>";
exit();

}

$ip=getIp();

  $sel_cart= "select * from cart where ip_add='$ip' ";

  $run_cart=mysqli_query($con,$sel_cart);

  $check_cart=mysqli_num_rows($run_cart);



if($check_customer>0 AND $check_cart==0){

   $_SESSION['customer_email']=$c_email;

   echo "<script>alert('You are logged in successfully,Thanks!')</script>";
   echo "<script>window.open('customer/my_account.php','_self')</script>";


}

else{

	$_SESSION['customer_email']=$c_email;

   echo "<script>alert('You are logged in successfully,Thanks!')</script>";
   echo "<script>window.open('checkout.php','_self')</script>";



}



}


?>



</div>