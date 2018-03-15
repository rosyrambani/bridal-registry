<?php
session_start();
if(!isset($_SESSION["sess_user"])){
    header("location:storelogin.php");
} else {

?>

<?php
	
	$host="localhost";
			$user="root";
			$password="";
			$db="bridalregistry";
			$con = mysqli_connect($host,$user,$password);
			if(!$con)
			{
			echo 'Not Connected To Server';
			}
			if(!mysqli_select_db($con,'bridalregistry'))
			{
			echo 'Database Not Selected';
			}
			mysqli_select_db($con,"bridalregistry");
	if (isset($_POST['update'])) {
	$NewBride = $_POST['newbride'];
	$NewGroom = $_POST['newgroom'];
	$NewPhone = $_POST['newphone'];
	$NewEmail = $_POST['newemail'];
	$NewWeddingDate = $_POST['newweddingdate'];
	$NewShowersDate = $_POST['newshowersdate'];
	$NewRegistryDate = $_POST['newregistrydate'];
	$NewStore = $_POST['newstore'];
	$NewEmployeeName = $_POST['newemployeename'];
	$RegistryCode = $_POST['newregistrycode'];

	//select query
	$sqldb = "UPDATE CUSTOMERINFO SET (BRIDE='$NewBride', GROOM='$NewGroom', PHONE='$NewPhone', EMAIL='$NewEmail', WEDDINGDATE='$NewWeddingDate', SHOWERSDATE='$NewShowersDate', REGISTRYDATE='$NewRegistryDate', STORE='$NewStore', EMPLOYEENAME='$NewEmployeeName') WHERE REGISTRYCODE='$RegistryCode'";
	echo "$sqldb";

	if(!mysqli_query($con, $sqldb))
	{
		echo 'not connected';
	}
	else
	{
			echo 'connected';
	}
	header("url=searchregistry.php");
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
				<button class="btn btn-danger" type="button"><a href="storelogout.php">Logout</a></button>
				
			</div>
		</nav>
		
		<div class="text-center">
			<form name="search" class="card form-search" method="post" action="">
				<h2 class="form-title">Search By Registry Code</h2>
				<div class="form-group row">
					<input class="form-control col-sm-7" type="text" name="searchcode" placeholder="Enter the Registry Code">
					<button class="btn btn-warning col-sm-4 offset-1" name="submitted" type="submit">Search</button>
				</div>
			</form>
			
			<form name="updateform" id="updateform" class="card form-registry" method="post" action="searchregistry.php">
				<h2 class="form-title">Search Results</h2>
				
				<div class="form-group row">
					<label for="newregistrycode" class="col-sm-4 col-form-label">Registry Code:</label>
					<div class="col-sm-8">
						<input type="text" name="newregistrycode" id="newregistrycode" class="form-control" placeholder="Registry Code" required readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="bride" class="col-sm-4 col-form-label">Bride Name:</label>
					<div class="col-sm-8">
						<input type="text" name="newbride" class="form-control" id="newbride" placeholder="Name of Bride" required autofocus>
					</div>
				</div>
				<div class="form-group row">
					<label for="groom" class="col-sm-4 col-form-label">Groom Name:</label>
					<div class="col-sm-8">
						<input type="text" name="newgroom" id="newgroom" class="form-control" placeholder="Name of Groom" value="<?php echo $GroomDb;?>" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="phone" class="col-sm-4 col-form-label">Contact Number:</label>
					<div class="col-sm-8">
						<input type="text" name="newphone" id="newphone" class="form-control" placeholder="Enter Phone Number" value="<?php echo $PhoneDb;?>" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-4 col-form-label">Contact Email:</label>
					<div class="col-sm-8">
						<input type="email" name="newemail" id="newemail" class="form-control" placeholder="Enter Contact Email" value="<?php echo $EmailDb;?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="weddingdate" class="col-sm-4 col-form-label">Date of Wedding:</label>
					<div class="col-sm-8">
						<input type="Date" name="newweddingdate" id="newweddingdate" class="form-control" placeholder="Enter Wedding Date" value="<?php echo $WeddingDb;?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="showersdate" class="col-sm-4 col-form-label">Date of Showers:</label>
					<div class="col-sm-8">
						<input type="Date" name="newshowersdate" id="newshowersdate" class="form-control" placeholder="Enter Showers Date" value="<?php echo $ShowersDb;?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="registrydate" class="col-sm-4 col-form-label">Date of Registry:</label>
					<div class="col-sm-8">
						<input type="Date" name="newregistrydate" id="newregistrydate" class="form-control" placeholder="Enter Today Date" value="<?php echo $RegistryDb;?>" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="store" class="col-sm-4 col-form-label">Store of Registry:</label>
					<div class="col-sm-8">
						<input type="text" name="newstore" id="newstore" class="form-control" placeholder="Enter Your Store Number" value="<?php echo $StoreDb;?>" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="employeename" class="col-sm-4 col-form-label">Registry Taken By:</label>
					<div class="col-sm-8">
						<input type="text" name="newemployeename" id="newemployeename" class="form-control" placeholder="Enter Employee Name" value="<?php echo $EmployeeDb;?>" required>
					</div>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit" id="update" name="update" value="update"><a>Update Registry</a></button>
				
			</form>

			<?php
			//connect to the database
			include('connect.php');
			if (isset($_POST['submitted'])) {

				$SearchCode = $_POST['searchcode'];
				$BrideDb = "";
				$GroomDb = "";
				$PhoneDb = "";
				$EmailDb = "";
				$WeddingDb = "";
				$ShowersDb = "";
				$RegistryDb = "";
				$StoreDb = "";
				$EmployeeDb = "";

				$query = "SELECT * FROM CUSTOMERINFO WHERE REGISTRYCODE = '$SearchCode'";
				$result = mysqli_query($con, $query) or die('error getting data');

				if(mysqli_num_rows($result) > 0) {

					while($row = mysqli_fetch_assoc($result)) {
						$SearchCode = $row['REGISTRYCODE'];
						$BrideDb = $row['BRIDE'];
						$GroomDb = $row['GROOM'];
						$PhoneDb = $row['PHONE'];
						$EmailDb = $row['EMAIL'];
						$WeddingDb = $row['WEDDINGDATE'];
						$ShowersDb = $row['SHOWERSDATE'];
						$RegistryDb = $row['REGISTRYDATE'];
						$StoreDb = $row['STORE'];
						$EmployeeDb = $row['EMPLOYEENAME'];						
						
						?>

						<script type="text/javascript">

			function searchResult() {
				// document.getElementById("updateform").style.display = "block";
				// alert('searchResult called');
				// var regcode = "";
				document.getElementById("newregistrycode").value = "<?php echo $SearchCode;?>";
				document.getElementById("newbride").value = "<?php echo $BrideDb;?>";
				
			}
		</script>

						<?php

						echo'<script> 
							searchResult();
						</script>';

					}
				}
				else {
    				echo "0 results";
				}

			}
?>
			
			
		</div>
		
		

		<!-- Bootstrap jquery and js files -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
	</body>
</html>
<?php
}
?>