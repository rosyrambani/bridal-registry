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
	$RegistryCode = $_POST['registrycode'];
	$sql = "INSERT INTO CUSTOMERINFO (BRIDE, GROOM, PHONE, EMAIL, WEDDINGDATE, SHOWERSDATE, REGISTRYDATE, STORE, EMPLOYEENAME, REGISTRYCODE) VALUES ('$Bride', '$Groom', '$Phone', '$Email', '$WeddingDate', '$ShowersDate', '$RegistryDate', '$Store', '$EmployeeName', '$RegistryCode')";
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
	header("url=customerdata.php");
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
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Bowring Bridal Registry</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="registryhome.php">Create New Registry</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="searchregistry.php">Search Registry</a>
          </li>
        </ul>
          <a class="btn btn-outline-success my-2 my-sm-0" type="button" href="storelogout.php">Logout</a>
      </div>
    </nav>
		<!-- <nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    Bootstrap
  </a>
</nav> -->
		<div class="card border-success mb-3 cxdata">
			<div class="card-header">Registry Account Details</div>
			<div class="card-body text-success">
				<div class="row">
					<h5 class="card-title col-sm-4">Registry Code:</h5>
					<p class="card-text col-sm-8 text-uppercase"><?php echo $RegistryCode;?></p>
				</div>
				<div class="row">
					<h5 class="card-title col-sm-4">Bride's Name:</h5>
					<p class="card-text col-sm-8"><?php echo $Bride;?></p>
				</div>
				<div class="row">
					<h5 class="card-title col-sm-4">Groom's Name:</h5>
					<p class="card-text col-sm-8"><?php echo $Groom;?></p>
				</div>
				<div class="row">
					<h5 class="card-title col-sm-4">Contact Number:</h5>
					<p class="card-text col-sm-8"><?php echo $Phone;?></p>
				</div>
				<div class="row">
					<h5 class="card-title col-sm-4">Contact Email:</h5>
					<p class="card-text col-sm-8"><?php echo $Email;?></p>
				</div>
				<div class="row">
					<h5 class="card-title col-sm-4">Date of Wedding:</h5>
					<p class="card-text col-sm-8"><?php echo $WeddingDate;?></p>
				</div>
				<div class="row">
					<h5 class="card-title col-sm-4">Date of Showers:</h5>
					<p class="card-text col-sm-8"><?php echo $ShowersDate;?></p>
				</div>
				<div class="row">
					<h5 class="card-title col-sm-4">Date of Registry:</h5>
					<p class="card-text col-sm-8"><?php echo $RegistryDate;?></p>
				</div>
				<div class="row">
					<h5 class="card-title col-sm-4">Store of Registry:</h5>
					<p class="card-text col-sm-8"><?php echo $Store;?></p>
				</div>
				<div class="row">
					<h5 class="card-title col-sm-4">Registry Taken By:</h5>
					<p class="card-text col-sm-8"><?php echo $EmployeeName;?></p>
				</div>
				<p class="card-text">Please confirm with the customer that all the details above are correct.</p>
			</div>
		</div>
		
		<!-- <div class="form-group form-registry">
				<label for="registrycode">Please Give This Registry Code To The Customer</label>
				
				<textarea class="form-control" name="registrycode" id="registrycode" rows="1" readonly></textarea>
				
		</div> -->
		
		
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