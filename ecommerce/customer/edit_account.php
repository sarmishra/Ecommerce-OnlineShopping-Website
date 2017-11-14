<!DOCTYPE>


                                  <?php

                                  include("includes/db.php");

                                  $user=$_SESSION['customer_email'];

                                  $get_customer="select * from customers where customer_email='$user'";

                                  $run_customer=mysqli_query($con,$get_customer);

                                  $row_customer=mysqli_fetch_array($run_customer);

                                  $c_id=$row_customer['customer_id'];
                                  $name=$row_customer['customer_name'];
                                  $email=$row_customer['customer_email'];
                                  $pass=$row_customer['customer_pass'];
                                  $country=$row_customer['customer_country'];
                                  $city=$row_customer['customer_city'];
                                  $image=$row_customer['customer_image'];
                                  $contact=$row_customer['customer_contact'];
                                  $address=$row_customer['customer_address'];

                                  

                                  ?>



                                    <form action="" method="post" enctype="multipart/form-data">


                                      <table align="center" width="395" height="380" bgcolor="skyblue">

                                        <tr align="center">

                                          <td colspan="8"><h2 style="color:green;">Update Your Account</h2></td>

                                        </tr>

                                        <tr>

                                          <td align="right"><p style="color:green">Customer Name:</p></td>
                                          <td><input type="text" name="c_name" value="<?php echo $name; ?>" required/></td>

                                        </tr> 

                                        <tr>

                                          <td align="right"><p style="color:green">Customer Email:</p></td>
                                          <td><input type="text" name="c_email" value="<?php echo $email; ?>"required/></td>

                                        </tr> 

                                        <tr>

                                          <td align="right"><p style="color:green">Customer Password:</p></td>
                                          <td> <input type="password" name="c_pass" value="<?php echo $pass; ?>"required /></td>

                                        </tr> 

                                         <tr>

                                          <td align="right"><p style="color:green">Customer Image:</p></td>
                                          <td> <input type="file" name="c_image" /> <!--<img src="customer_images/<?php echo $image; ?>" width="50" height="50" />--></td>

                                        </tr> 


                                        <tr>

                                          <td align="right"><p style="color:green">Customer Country:</p></td>
                                          <td>

                                            <select name="c_country" disabled >

                                              <option>  <?php echo $country; ?> </option>
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
                                          <td><input type="text" name="c_city" value="<?php echo $city; ?>" required/></td>

                                        </tr> 

                                         <tr>

                                          <td align="right"><p style="color:green">Customer Contact:</p></td>
                                          <td><input type="text" name="c_contact" value="<?php echo $contact; ?>" required/></td>

                                        </tr> 

                                         <tr>

                                          <td align="right"><p style="color:green">Customer Address:</p></td>
                                          <td><input type="text" name="c_address" value="<?php echo $address; ?>" required/></td>

                                        </tr>  

                                        <tr align="center">

                                        <td colspan="8"><input type="submit" name="update" value="Update Account"/></td>


                                        </tr>


                                     </table>

                                    </form>
 

       


<?php

global $con;

if(isset($_POST['update'])){

  $ip=getIp();

  $customer_id=$c_id;
  $c_name=$_POST['c_name'];
   $c_email=$_POST['c_email'];
    $c_pass=$_POST['c_pass'];
     $c_image=$_FILES['c_image']['name'];
     $c_image_tmp=$_FILES['c_image']['tmp_name'];
       $c_city=$_POST['c_city'];
        $c_contact=$_POST['c_contact'];
         $c_address=$_POST['c_address']; 
          


         move_uploaded_file($c_image_tmp, "customer_images/$c_image");

        $update_c = " update customers set 
        customer_name='$c_name', customer_email='$c_email', customer_pass='$c_pass', customer_city='$c_city',
        customer_contact='$c_contact', customer_address='$c_address',customer_image='$c_image' where customer_id='$customer_id' ";
          

            $run_update=mysqli_query($con,$update_c);

            
           if($run_update){

            echo "<script>alert('Your account successfully Updated') </script>";
            echo "<script>window.open('my_account.php','_self')</script>";

           }
 }
 

?>