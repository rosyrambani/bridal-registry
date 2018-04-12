<?php
session_start();
if(!isset($_SESSION["sess_user"])){
header("location:storelogin.php");
} else {
?>
<?php
	include ('connect.php');
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
	$sqldb = "UPDATE CUSTOMERINFO SET BRIDE = '$NewBride', GROOM = '$NewGroom', PHONE = '$NewPhone', EMAIL = '$NewEmail', WEDDINGDATE = '$NewWeddingDate', SHOWERSDATE = '$NewShowersDate', REGISTRYDATE = '$NewRegistryDate', STORE = '$NewStore', EMPLOYEENAME = '$NewEmployeeName' WHERE REGISTRYCODE = '$RegistryCode'";
	
	if(!mysqli_query($con, $sqldb))
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
			<strong>Data Successfully Updated to the Database!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
</div>';
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
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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
						<a class="nav-link" href="registryhome.php">1. New Registry</a>
					</li>
					
					<li class="nav-item active">
						<a class="nav-link" href="addproducts.php">2. Add Products</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="searchregistry.php">3. Search and Edit Registry</a>
					</li>
					
				</ul>
				<div class="btn-group" role="group">
					<a class="button btn btn-warning" href="blank_Bridal_Registry.pdf" target="_blank">Registry Form</a>
					<a class="button btn btn-danger" href="storelogout.php">Logout</a>
				</div>
				
			</div>
		</nav>
		
		<div class="text-center">
			<form name="search" id="search" class="card form-search" method="post" action="">
				<h2 class="form-title">Search By Registry Code</h2>
				<div class="form-group row">
					<input class="form-control col-sm-6" type="text" name="searchcode" placeholder="Enter the Registry Code">
					<button class="btn btn-outline-success col-sm-6" name="submitted" type="submit">Customer Details</button>
					
				</div>
				<div class="form-group row">
					
					<input class="form-control col-sm-6" type="text" id="dbProducts" name="dbProducts" placeholder="Enter the Registry Code">
					<button class="btn btn-outline-success col-sm-6" id="getProducts" name="getProducts" type="button">Show Products</button>
				</div>
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
			
			document.getElementById("newregistrycode").value = "<?php echo $SearchCode;?>";
			document.getElementById("newbride").value = "<?php echo $BrideDb;?>";
			document.getElementById("newgroom").value = "<?php echo $GroomDb;?>";
			document.getElementById("newphone").value = "<?php echo $PhoneDb;?>";
			document.getElementById("newemail").value = "<?php echo $EmailDb;?>";
			document.getElementById("newweddingdate").value = "<?php echo $WeddingDb;?>";
			document.getElementById("newshowersdate").value = "<?php echo $ShowersDb;?>";
			document.getElementById("newregistrydate").value = "<?php echo $RegistryDb;?>";
			document.getElementById("newstore").value = "<?php echo $StoreDb;?>";
			document.getElementById("newemployeename").value = "<?php echo $EmployeeDb;?>";
			
			}
			</script>
			<?php
			echo'
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
												<input type="text" name="newgroom" id="newgroom" class="form-control" placeholder="Name of Groom" required>
									</div>
						</div>
						<div class="form-group row">
									<label for="phone" class="col-sm-4 col-form-label">Contact Number:</label>
									<div class="col-sm-8">
												<input type="text" name="newphone" id="newphone" class="form-control" placeholder="Enter Phone Number" required>
									</div>
						</div>
						<div class="form-group row">
									<label for="email" class="col-sm-4 col-form-label">Contact Email:</label>
									<div class="col-sm-8">
												<input type="email" name="newemail" id="newemail" class="form-control" placeholder="Enter Contact Email">
									</div>
						</div>
						<div class="form-group row">
									<label for="weddingdate" class="col-sm-4 col-form-label">Date of Wedding:</label>
									<div class="col-sm-8">
												<input type="Date" name="newweddingdate" id="newweddingdate" class="form-control" placeholder="Enter Wedding Date">
									</div>
						</div>
						<div class="form-group row">
									<label for="showersdate" class="col-sm-4 col-form-label">Date of Showers:</label>
									<div class="col-sm-8">
												<input type="Date" name="newshowersdate" id="newshowersdate" class="form-control" placeholder="Enter Showers Date">
									</div>
						</div>
						<div class="form-group row">
									<label for="registrydate" class="col-sm-4 col-form-label">Date of Registry:</label>
									<div class="col-sm-8">
												<input type="Date" name="newregistrydate" id="newregistrydate" class="form-control" placeholder="Enter Today Date" required>
									</div>
						</div>
						<div class="form-group row">
									<label for="store" class="col-sm-4 col-form-label">Store of Registry:</label>
									<div class="col-sm-8">
												<input type="text" name="newstore" id="newstore" class="form-control" placeholder="Enter Your Store Number" required>
									</div>
						</div>
						<div class="form-group row">
									<label for="employeename" class="col-sm-4 col-form-label">Registry Taken By:</label>
									<div class="col-sm-8">
												<input type="text" name="newemployeename" id="newemployeename" class="form-control" placeholder="Enter Employee Name" required>
									</div>
						</div>
						<button class="btn btn-lg btn-primary btn-block" type="submit" id="update" name="update" value="update"><a>Update Registry</a></button>
						
			</form>
			<script>
				searchResult();
			</script>';
			}
			}
			else {
			echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Make Sure you have entered right Registry Code</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			}
			?>
			
			<form name="productsForm" id="productsForm" class="card form-addsku" style="display: none;">
				<h3 class="form-title">Products in this Registry</h3>
				<div class="row">
					<div class="col-sm-2">
						<label for="regcode" class="form-label">Registry Code:</label>
					</div>
					<div class="col-sm-2">
						<input type="text" name="regcode" id="regcode" class="form-control item_regcode" readonly>
					</div>
					
				</div>
				<br>
				<table class="table table-hover">
					<thead class="thead-light">
						<tr class="row">
							<th class="col-md-1" scope="col">Product SKU</th>
							<th class="col-md-4" scope="col">Description</th>
							<th class="col-md-1" scope="col">Quantity</th>
							<th class="col-md-4" scope="col">Notes</th>
							<th class="col-md-1" scope="col">Gifted</th>
							<th class="col-md-1" scope="col">Remove</th>
						</tr>
					</thead>
					<tbody id="showProducts">
					</tbody>
				</table>
				<button class="btn btn-danger" id="updateProducts" name="updateProducts" type="submit">Update Changes to the Products</button>
			</form>
			
			<script type="text/javascript">
				$(document).ready(function(){
					$("#getProducts").click(function(e) {
						e.preventDefault();
						$(this).prop('disabled', true);
						var reg = document.getElementById("dbProducts").value;
					
					$.ajax({
						
						type: 'post',
						url: 'fetch-products.php',
						data: {
							registryCode:reg
						},
						success: function (response) {
							if(response == '0')
							{
								// alert("no available data");
								var err = '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>No Products with this Registry Code</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								$('#search').append(err);
								$('#getProducts').prop('disabled', false);
							}
							else {
							console.log(response);
							// document.getElementById("showProducts").contentEditable = true;
							$("#productsForm").css("display", "block");
							var content = document.getElementById("showProducts");
							content.innerHTML = content.innerHTML+response;
							document.getElementById("regcode").value = reg;
						}
						}
					});
					});

					$(document).on('click', '.removeProduct', function(){
						
						// alert("remove clicked");
						console.log("remove product button clicked");
						var rowId = this.id;
						console.log(rowId);
						var item_regcode = $("#regcode").val();
						var item_sku = $(this).closest("tr").find(".item_sku").text();
						var productRow = {item_regcode:item_regcode, item_sku:item_sku};
						console.log(productRow);
						$.ajax({
							method: "POST",
							url: "delete-product.php",
							data: productRow,
							success: function(response){
								console.log(response);
								if(response == 1)
								{
									$('#' + rowId).parent().parent().remove();
									var del = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Product Successfully Removed!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            					$('#search').append(del);
								}
								if(response == 0)
								{

								}
							}
						});
					});

					$('#updateProducts').click(function(e){
						e.preventDefault();
						console.log("update clicked");

						var item_regcode = [];
						var item_sku = [];
						var item_description = [];
						var item_quantity = [];
						var item_notes = [];
						var item_gifted = [];

						$('#regcode').each(function(){
							item_regcode.push($(this).val());
						});
						$('.item_sku').each(function(){ 
							item_sku.push($(this).text());
						});
						$('.item_description').each(function(){
							item_description.push($(this).text());
						});
						$('.item_quantity').each(function(){
							item_quantity.push($(this).text());
						});
						$('.item_notes').each(function(){
							item_notes.push($(this).text());
						});
						$('.item_gifted').each(function(){
							item_gifted.push($(this).text());
						});
						console.log(item_regcode, item_sku, item_description, item_quantity, item_notes, item_gifted);
						var productsUpdated = {item_regcode:item_regcode, item_sku:item_sku, item_description:item_description, item_quantity:item_quantity, item_notes:item_notes, item_gifted:item_gifted} ;
						console.log(productsUpdated);

						$.ajax({

							method: "POST",
							url: "update-products.php",
							data: productsUpdated,
							success: function(response){
								// alert(response);
								console.log(response);
								$("#productsForm").remove();
            					var del = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Products Successfully Updated!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            					$('#search').append(del);
							} 
						});
					});

				});
				
			</script>
			
		</div>
		
		
		<!-- Bootstrap jquery and js files -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
	</body>
</html>
<?php
}
?>