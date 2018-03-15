<?php
	
	include 'connect.php';
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
  <strong>Data Successfully Saved to the Database!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	}
	header("url=searchregistry.php");
	}
?>