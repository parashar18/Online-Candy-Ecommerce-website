<?php

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_fname = $row_customer['customer_fname'];

$customer_lname = $row_customer['customer_lname'];

$customer_email = $row_customer['customer_email'];

$customer_country = $row_customer['customer_country'];

$customer_city = $row_customer['customer_city'];

$customer_contact = $row_customer['customer_contact'];

$customer_address = $row_customer['customer_address'];

$customer_pincode = $row_customer['customer_pincode'];

?>

<h1 align="center" > Edit Your Account </h1>

<form action="" method="post" enctype="multipart/form-data" ><!--- form Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label> First Name</label>

<input type="text" name="c_fname" class="form-control" required value="<?php echo $customer_fname; ?>">


</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label> Last Name</label>

<input type="text" name="c_lname" class="form-control" required value="<?php echo $customer_lname; ?>">


</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label>Email</label>

<input type="text" name="c_email" class="form-control" required value="<?php echo $customer_email; ?>" readonly>


</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label>Address</label>

<input type="text" name="c_address" class="form-control" required value="<?php echo $customer_address; ?>">


</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label>City</label>

<input type="text" name="c_city" class="form-control" required value="<?php echo $customer_city; ?>">


</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label> Pincode </label>

<input type="text" name="c_pincode" class="form-control" required value="<?php echo $customer_pincode; ?>">


</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label>Country</label>

<input type="text" name="c_country" class="form-control" required value="<?php echo $customer_country; ?>">


</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label>Contact</label>

<input type="text" name="c_contact" class="form-control" required value="<?php echo $customer_contact; ?>">


</div><!-- form-group Ends -->



<div class="text-center" ><!-- text-center Starts -->

<button name="update" class="btn btn-primary" >

<i class="fa fa-user-md" ></i> Update Now

</button>


</div><!-- text-center Ends -->


</form><!--- form Ends -->

<?php

if(isset($_POST['update'])){

$c_fname = $_POST['c_fname'];

$c_lname = $_POST['c_lname'];

$c_email = $_POST['c_email'];

$c_pincode = $_POST['c_pincode'];

$c_country = $_POST['c_country'];

$c_city = $_POST['c_city'];

$c_contact = $_POST['c_contact'];

$c_address = $_POST['c_address'];

$update_customer = "update customers set customer_fname='$c_fname', customer_lname='$c_lname', customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address', customer_pincode='$c_pincode' where customer_email='$c_email'";

$run_customer = mysqli_query($con,$update_customer);

if($run_customer){

$_SESSION['customer_fname'] = $c_fname;
echo "<script>alert('Your account has been updated successfully')</script>";
echo "<script>window.open('my_account.php?edit_account','_self')</script>";

}

}


?>