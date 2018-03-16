<?php
	
	include 'connect.php';
	if (isset($_POST['productadd'])) {
	$RegCode = $_POST['regcode'];
	$SkuNumber = $_POST['skunumber'];
	$Description = $_POST['description'];
	$Quantity = $_POST['quantity'];
	
	$sql = "INSERT INTO CUSTOMERPRODUCTS (REGCODE, SKUNUMBER, DESCRIPTION, QUANTITY) VALUES ('$RegCode', '$SkuNumber', '$Description', '$Quantity')";
	if(!mysqli_query($con, $sql))
	{
		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Sorry, Data was not saved to the Database!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	}
	else
	{
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data Successfully Saved to the Database!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	}
	
	}
?>