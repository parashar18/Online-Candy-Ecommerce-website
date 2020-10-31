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

if(isset($_GET['delete_p_cat'])){

$delete_p_cat_id = $_GET['delete_p_cat'];

$delete_p_cat = "update product_categories set status='d' where p_cat_id='$delete_p_cat_id'";

$run_delete = mysqli_query($con,$delete_p_cat);

if($run_delete){

echo "<script>alert('One Product Category Has been Deleted')</script>";

echo "<script>window.open('admin_view_p_cats.php','_self')</script>";

}

}



?>



<?php } ?>