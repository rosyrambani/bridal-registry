<?php
	
	$con = mysqli_connect('localhost','root','');

	if(!$con)
	{
		echo 'Not Connected To Server';
	}

	if(!mysqli_select_db($con,'bridalregistry'))
	{
		echo 'Database Not Selected';
	}
	if (isset($_POST['submit'])) {

	$Bride = $_POST['bride'];
	$Groom = $_POST['groom'];
	$Phone = $_POST['phone'];
	$Email = $_POST['email'];
	$WeddingDate = $_POST['weddingdate'];
	$ShowersDate = $_POST['showersdate'];
	$RegistryDate = $_POST['registrydate'];
	$Store = $_POST['store'];
	$EmployeeName = $_POST['employeename'];
	$RegistryCode = uniqid();

	$sql = "INSERT INTO CUSTOMERINFO (BRIDE, GROOM, PHONE, EMAIL, WEDDINGDATE, SHOWERSDATE, REGISTRYDATE, STORE, EMPLOYEENAME, REGISTRYCODE) VALUES ('$Bride', '$Groom', '$Phone', '$Email', '$WeddingDate', '$ShowersDate', '$RegistryDate', '$Store', '$EmployeeName', '$RegistryCode')";

	if(!mysqli_query($con, $sql))
	{
		echo 'Data Not Inserted';
	}

	else
	{
		echo 'Data Inserted';
	}

	header("refresh:1; url=customerdata.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Bridal Registry Website">
		<meta name="author" content="Rosy Rambani">
		<!-- Bootstrap CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Bowring Bridal Registry</title>
	</head>
	<body>
		<div class="text-center">
			
			<!-- <div class="form-group form-registry">
				<label for="registrycode">Please Give This Registry Code To The Customer</label>
				
				<textarea class="form-control" name="registrycode" id="registrycode" rows="1" readonly></textarea>
				
			</div> -->
			
		</div>

		<!-- <script type="text/javascript">
			function registrynumber(){
				
				alert("code");
				
				document.getElementById("registrycode").value = "demo";
			}
		</script> -->

		<!-- Bootstrap jquery and js files -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
	</body>
</html>
