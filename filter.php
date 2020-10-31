 
<?php
session_start();
include("functions/functions.php");
$db = mysqli_connect("localhost","root","root","ecom_store");
$output = '';
if(isset($_POST["query"]))
{
	$per_page=6;

	if(isset($_GET['page'])){

		$page = $_GET['page'];

	}else {

		$page=1;

	}
	$start_from = ($page-1) * $per_page ;
	$sLimit = " order by 1 Desc LIMIT $start_from,$per_page";
	$search = mysqli_real_escape_string($db, $_POST["query"]);

	$query = "
	SELECT * FROM products 
	WHERE product_title LIKE '%".$search."%'
	or product_label LIKE '%".$search."%'" .$sLimit
	;
}
else
{	include("shop.php");
	//getproducts();
}
$run_products = mysqli_query($db, $query);

if(mysqli_num_rows($run_products) > 0)
{
	
	while($row_products=mysqli_fetch_array($run_products)){
		if($row_products['status']=='a'){

		$pro_id = $row_products['product_id'];

		$pro_title = $row_products['product_title'];

		$pro_price = $row_products['product_price'];

		$pro_img1 = $row_products['product_img1'];

		$pro_label = $row_products['product_label'];

		$manufacturer_id = $row_products['manufacturer_id'];

		$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

		$run_manufacturer = mysqli_query($db,$get_manufacturer);

		$row_manufacturer = mysqli_fetch_array($run_manufacturer);

		$manufacturer_name = $row_manufacturer['manufacturer_title'];

		$pro_psp_price = $row_products['product_psp_price'];

		$pro_url = $row_products['product_url'];


		if($pro_label == "Sale" or $pro_label == "Gift"){

			$product_price = "<del> $$pro_price </del>";

			$product_psp_price = "| $$pro_psp_price";

		}
		else{

			$product_psp_price = "";

			$product_price = "$$pro_price";

		}


		if($pro_label == ""){


		}
		else{

			$product_label = "

			<a class='label sale' href='#' style='color:black;'>

			<div class='thelabel'>$pro_label</div>

			<div class='label-background'> </div>

			</a>

			";

		}


		echo "

		<div class='col-md-4 col-sm-6 center-responsive' >

		<div class='product' >

		<a href='$pro_url' >

		<img src='admin_area/product_images/$pro_img1' class='img-responsive' style='width:250px; height:250px;' >

		</a>

		<div class='text' >

		<center>

		<p class='btn btn-primary'> $manufacturer_name </p>

		</center>

		<hr>

		<h3><a href='$pro_url' >$pro_title</a></h3>

		<p class='price' > $product_price $product_psp_price </p>

		<p class='buttons' >

		";
		if(isset($_SESSION['admin_email'])){
			echo "
			<a href='admin_delete_product.php?delete_product=$pro_id' class='btn btn-default'>Delete Product</a>
			<a href='admin_edit_product.php?edit_product=$pro_id' class='btn btn-primary'>

				<i class='fa fa-shopping-cart' data-price=$pro_price></i> Edit Product

			</a>
			";
		}
		else{
			echo"
			<a href='$pro_url' class='btn btn-default'>View details</a>
			<a href='$pro_url' class='btn btn-primary'>

				<i class='fa fa-shopping-cart' data-price=$pro_price></i> Add to cart

			</a>";
		}


		echo "</p>

		</div>

		$product_label


		</div>

		</div>

		";
	}
	}
}
else
{
	echo 'Data Not Found';
}
?>
