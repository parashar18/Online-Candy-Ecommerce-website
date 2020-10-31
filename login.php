<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

if(isset($_SESSION["c_email"]) && isset($_SESSION["c_fname"])){
	header("location: index.php");
	exit;
}

if(isset($_POST['login_btn']))
{
	
	if(empty(trim($_POST["c_email"]))){
		$c_email_error = "Please enter email.";
	} else{
		$c_email_error="";
		$email = trim($_POST["c_email"]);

	}

	console.log($_POST["$c_password"]);

	if(empty(trim($_POST["c_password"]))){
		$c_password_error = "Please enter password.";
	} else{
		$c_password_error = "";
		$password = trim($_POST["c_password"]);
	} 
	//echo $password; 
	//echo $email;  	
	$sql= "select * from admins where admin_email= '$email' and admin_pass='$password'";
	$result = mysqli_query($con, $sql);	
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);
	if($count > 0){
		$_SESSION['admin_email']=$email;
		$_SESSION['admin_name']= $row['admin_name'];
		header("location:index.php");
	}
	else{
		$sql = "select * from customers where customer_email = '$email'";
		$result = mysqli_query($con, $sql);	
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$hashed_password = $row['customer_pass'];
		$status = $row['status'];
		$count = mysqli_num_rows($result);
	//console.log('$row');

	//echo $count;
	//echo $status;

		$fname = $row['customer_fname'];
	//echo $fname;
		if($count > 0){
			if (password_verify($password, $hashed_password) && $status == 'a') {
				echo 'index page loop';
				$fname = $row['customer_fname'];
				$c_id = $row['customer_id'];
				$_SESSION['customer_id']=$c_id;
				$_SESSION['customer_email']=$email;
				$_SESSION['customer_fname']=$fname;
				header("location:index.php");

  			// echo "<script>window.open('index.php','_self')</script>";

			} else {
				$errormsg= "Email or password incorrect";
			}
		}
	}

	
	
}


?>


<div id="content" ><!-- content Starts -->
	<div class="container" ><!-- container Starts -->
		<div class="col-md-12" ><!-- col-md-12 Starts -->
			<div class="box" ><!-- box Starts -->
				<div class="box-header" ><!-- box-header Starts -->
					<center>
						<h1>Login</h1>
						<p class="lead"><?php echo $errormsg; ?></p>
					</center>
				</div>	

				<form action="" method="post"><!--form Starts -->

					<div class="form-group" ><!-- form-group Starts -->

						<label>Email</label>

						<input type="text" class="form-control" name="c_email" id="c_email" value="<?php echo $email; ?>">
						<?php echo $c_email_error; ?>

					</div><!-- form-group Ends -->

					<div class="form-group" ><!-- form-group Starts -->

						<label>Password</label>

						<input type="password" class="form-control" name="c_password" id="c_password">
						<?php echo $c_password_error; ?>
					<!--	<h4 align="center">

							<a href="forgot_pass.php"> Forgot Password </a>

						</h4>-->

					</div><!-- form-group Ends -->

					<div class="text-center" ><!-- text-center Starts -->

						<input type="submit" class="btn btn-primary btn-lg" name="login_btn" id="login_btn" value="Login">

					</div><!-- text-center Ends -->


				</form><!--form Ends -->

				<center>

					<a href="customer_register.php" >

						<h3>New ? Register Here</h3>

					</a>


				</center>


			</div><!-- box Ends -->
		</div><!-- col-md-12 Ends -->
	</div><!-- container Ends -->
</div><!-- content Ends -->


<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
