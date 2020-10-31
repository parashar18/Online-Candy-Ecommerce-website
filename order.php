<?php


include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");

?>

<?php

if(isset($_GET['c_id'])){

$customer_id = $_GET['c_id'];

}



$invoice_no = mt_rand();

$select_cart = "select * from cart where customer_id='$customer_id'";

$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$pro_id = $row_cart['p_id'];

$pro_qty = $row_cart['qty'];

$get_product = "select * from products where product_id='$pro_id'";
$run_product = mysqli_query($con,$get_product);
$row_product = mysqli_fetch_array($run_product);
$pro_quantity = $row_product['product_quantity'];
$pro_price= $row_product['product_price'];
$rem_qty= (int)$pro_quantity-(int)$pro_qty;
//echo $pro_quantity;
//echo $rem_qty;
$update_product = "update products set product_quantity='$rem_qty' where product_id='$pro_id'";
$run_cart = mysqli_query($con,$update_product);
$product_title = $row_product['product_title'];

$total_price=(int)$pro_qty*(int)$pro_price;
$insert_customer_order = "insert into customer_orders (customer_id, product_title,invoice_no,qty,order_date,total_amount) values ('$customer_id','$product_title','$invoice_no','$pro_qty',NOW(),'$total_price')";

$run_customer_order = mysqli_query($con,$insert_customer_order);


$delete_cart = "delete from cart where customer_id='$customer_id' and p_id='$pro_id'";

$run_delete = mysqli_query($con,$delete_cart);
//$insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,order_status) values ('$customer_id','$invoice_no','$pro_id','$pro_qty','$status')";

//$run_pending_order = mysqli_query($con,$insert_pending_order);


}



echo "<script>alert('Your order has been submitted,Thanks ')</script>";

echo "<script>window.open('my_account.php?my_orders','_self')</script>";

?>
