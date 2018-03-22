<?php 
include 'connect.php';
if(isset($_POST['productadd'])) {
	$item_regcode = $_POST["item_regcode"];
	$item_sku = $_POST["item_sku"];
	$item_description = $_POST["item_description"];
	$item_quantity = $_POST["item_quantity"];
	$query = '';
	for($count = 0; $count<count($item_sku); $count++)
	{
		$item_regcode_clean = mysqli_real_escape_string($con, $item_regcode[$count]);
		$item_sku_clean = mysqli_real_escape_string($con, $item_sku[$count]);
		$item_description_clean = mysqli_real_escape_string($con, $item_description[$count]);
		$item_quantity_clean = mysqli_real_escape_string($con, $item_quantity[$count]);
	if($item_regcode_clean != '' && $item_sku_clean != '' && $item_description_clean != '' && $item_quantity_clean != '')
	{
		$query .= '
		INSERT INTO CUSTOMERPRODUCTS (REGISTRYCODE, SKUNUMBER, DESCRIPTION, QUANTITY) VALUES ("'.$item_regcode_clean.'", "'.$item_sku_clean.'", "'.$item_description_clean.'", "'.$item_quantity_clean.'");
		';
	}
	}

	if($query != '')

	{
		if(mysqli_multi_query($con, $query))
		{
			echo 'all values inserted';
		}
		else
		{
			echo 'error inserting data';
		}
	}
	else
	{
		echo 'All fields are required';
	}
	}
?>


