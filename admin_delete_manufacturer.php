<?php

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

if(isset($_GET['delete_manufacturer'])){

$delete_id = $_GET['delete_manufacturer'];

$delete_manufacturer = "update manufacturers set status='d' where manufacturer_id='$delete_id'";

$run_manufacturer = mysqli_query($con,$delete_manufacturer);

if($run_manufacturer){

echo "<script>alert('One Manufacturer Has Been Deleted')</script>";
echo "<script>window.open('admin_view_manufacturers.php','_self')</script>";

}

}


?>


<?php } ?>