
<h1 align="center">Change Password </h1>

<form action="" method="post"><!-- form Starts -->

	<div class="form-group"><!-- form-group Starts -->

		<label>Enter Your Current Password</label>

		<input type="password" name="old_pass" class="form-control" required>

	</div><!-- form-group Ends -->


	<div class="form-group"><!-- form-group Starts -->

		<label>Enter Your New Password</label>

		<input type="password" name="new_pass" class="form-control" required>

	</div><!-- form-group Ends -->


	<div class="form-group"><!-- form-group Starts -->

		<label>Enter Your New Password Again</label>

		<input type="password" name="new_pass_again" class="form-control" required>

	</div><!-- form-group Ends -->

	<div class="text-center"><!-- text-center Starts -->

		<button type="submit" name="submit" class="btn btn-primary">

			<i class="fa fa-user-md"> </i> Change Password

		</button>

	</div><!-- text-center Ends -->

</form><!-- form Ends -->
<?php

if(isset($_POST['submit'])){

	$c_email = $_SESSION['customer_email'];

	$old_pass = $_POST['old_pass'];

	$new_pass = $_POST['new_pass'];

	$new_pass_again = $_POST['new_pass_again'];

	$sel_old_pass = "select * from customers where customer_email='$c_email'";

	$result = mysqli_query($con,$sel_old_pass);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$hashed_password = $row['customer_pass'];
	
	if(password_verify($old_pass, $hashed_password)){

		echo 'pasword correct';
		
		if($new_pass!=$new_pass_again){

			echo "<script>alert('Your New Password dose not match')</script>";

			exit();

		}

		$hashed_password= password_hash(trim($new_pass), PASSWORD_DEFAULT);

		$update_pass = "update customers set customer_pass='$hashed_password' where customer_email='$c_email'";

		$run_pass = mysqli_query($con,$update_pass);

		if($run_pass){

			echo "<script>alert('your Password Has been Changed Successfully')</script>";

			echo "<script>window.open('my_account.php?my_orders','_self')</script>";


		}
	}

	if($check_old_pass==0){

		echo "<script>alert('Your Current Password is not valid try again')</script>";

		exit();

	}






}



?>







