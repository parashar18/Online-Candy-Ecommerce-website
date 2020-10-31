<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>

<?php


$customer_id= $_SESSION['customer_id'];

if(isset($_POST['id'])){

$id = $_POST['id'];

$qty = $_POST['quantity'];

$change_qty = "update cart set qty='$qty' where p_id='$id' AND customer_id='$customer_id'";

$run_qty = mysqli_query($con,$change_qty);


}





?>