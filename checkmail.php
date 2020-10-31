<?php

include("includes/db.php");

$email = $_GET['c_email'];


if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


$sql = "select * from customers where customer_email='$email' and status='a'";

$result = mysqli_query($con,$sql);
if($result)
{ 
 if(mysqli_num_rows($result)>0)
 {
  echo "Email ID Already Exists";
 }
 else
 {
  echo "Available";
 }
}
mysqli_close($con);
exit();

?>