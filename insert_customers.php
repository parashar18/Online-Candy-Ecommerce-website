<?php

session_start();

include("includes/db.php");

  $c_fname = trim($_POST['fname']);

  $c_lname = trim($_POST['lname']);

  $c_email = trim($_POST['email']);

  $c_pass = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

  $c_address = trim($_POST['address']);

  $c_city = trim($_POST['city']);

  $c_pincode = trim($_POST['pin']);

  $c_country = trim($_POST['country']);
 
  $c_contact = trim($_POST['contact_no']);

  if($mysqli->query("insert into customers (customer_fname,customer_lname,customer_email,customer_pass,customer_country,customer_city,customer_contact, customer_address,customer_pincode,status) values ('$c_fname','$c_lname','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_pincode','a' )"))
  {

      $sql = "select * from customers where customer_email = '$c_email'";
      $result = mysqli_query($con, $sql); 
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $customer_id = $row['customer_id'];
      $_SESSION['customer_id']=$customer_id;
      $_SESSION['customer_email']=$c_email;
      $_SESSION['customer_fname']=$c_fname;
      

      echo 'Success';
    
  }
  else
  {
      echo 'Error';
  }


?>