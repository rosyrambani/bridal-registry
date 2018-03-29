<?php

include ('connect.php');
if(isset($_POST['flag'])) {
	$RegCode = $_POST['newregistrycode'];
	$SkuNumber = "";
	$Description = "";
	$Quantity = "";
	$Notes = "";

	$query = "SELECT * FROM CUSTOMERPRODUCTS WHERE REGISTRYCODE = '$RegCode'";
	$result = mysqli_query($con, $query) or die('error getting data');

	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
	}
	
	echo json_encode($rows);
}


?>