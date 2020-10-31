<?php

session_start();
include("includes/db.php");
//$con = mysqli_connect("localhost","root","root","ecom_store");

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}

else {


	if(isset($_GET['delete_product'])){

		$delete_id = $_GET['delete_product'];

		//echo $delete_id;

		$delete_pro = "update products set status='d' where product_id='$delete_id'";

		$run_delete = mysqli_query($con,$delete_pro);

		if($run_delete){

			echo "<script>alert('Product Has been deleted')</script>";

			echo "<script>window.open('shop.php','_self')</script>";

		}

	}
}

?>

