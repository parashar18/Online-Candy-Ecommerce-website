<?php
session_start();
include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}

else {


	?>


	<div class="row"><!-- 2 row Starts -->

		<div class="col-lg-12"><!-- col-lg-12 Starts -->

			<div class="panel panel-default"><!-- panel panel-default Starts -->

				<div class="panel-heading"><!-- panel-heading Starts -->

					<h3 class="panel-title"><!-- panel-title Starts -->

						<i class="fa fa-money fa-fw"></i> View Orders

					</h3><!-- panel-title Ends -->

				</div><!-- panel-heading Ends -->

				<div class="panel-body"><!-- panel-body Starts -->

					<div class="table-responsive"><!-- table-responsive Starts -->

						<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

							<thead><!-- thead Starts -->

								<tr>

									<th>Order No:</th>
									<th>Customer Email:</th>
									<th>Invoice No:</th>
									<th>Product Title:</th>
									<th>Product Qty:</th>
									<th>Order Date:</th>
									<th>Total Amount:</th>



								</tr>

							</thead><!-- thead Ends -->


							<tbody><!-- tbody Starts -->

								<?php

								$i = 0;

								$get_orders = "select * from customer_orders";

								$run_orders = mysqli_query($con,$get_orders);

								while ($row_orders = mysqli_fetch_array($run_orders)) {

									$order_id = $row_orders['order_id'];

									$c_id = $row_orders['customer_id'];

									$invoice_no = $row_orders['invoice_no'];

									$product_id = $row_orders['product_id'];

									$product_title = $row_orders['product_title'];

									$qty = $row_orders['qty'];

									$total_amount= $row_orders['total_amount'];

									$get_products = "select * from products where product_id='$product_id'";

									$run_products = mysqli_query($con,$get_products);

									$row_products = mysqli_fetch_array($run_products);


									$i++;

									?>

									<tr>

										<td><?php echo $i; ?></td>

										<td>
											<?php 

											$get_customer = "select * from customers where customer_id='$c_id'";

											$run_customer = mysqli_query($con,$get_customer);

											$row_customer = mysqli_fetch_array($run_customer);

											$customer_email = $row_customer['customer_email'];

											echo $customer_email;

											?>
										</td>

										<td bgcolor="yellow" ><?php echo $invoice_no; ?></td>

										<td><?php echo $product_title; ?></td>

										<td><?php echo $qty; ?></td>

										<td>
											<?php

											$get_customer_order = "select * from customer_orders where order_id='$order_id'";

											$run_customer_order = mysqli_query($con,$get_customer_order);

											$row_customer_order = mysqli_fetch_array($run_customer_order);

											$order_date = $row_customer_order['order_date'];

											echo $order_date;
?>

									</td>
									<td>
										<?php echo $total_amount;?>
									</td>
								<?php }?>
								</tbody><!-- tbody Ends -->

							</table><!-- table table-bordered table-hover table-striped Ends -->

						</div><!-- table-responsive Ends -->

					</div><!-- panel-body Ends -->

				</div><!-- panel panel-default Ends -->

			</div><!-- col-lg-12 Ends -->

		</div><!-- 2 row Ends -->


		<?php } ?>