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



echo'<script> 
							searchResult();
						</script>';



				$sqldb = "UPDATE CUSTOMERINFO SET BRIDE = '$NewBride', GROOM = '$NewGroom', PHONE = '$NewPhone', EMAIL = '$NewEmail', WEDDINGDATE = '$NewWeddingDate', SHOWERSDATE = '$NewShowersDate', REGISTRYDATE = '$NewRegistryDate', STORE = '$NewStore', EMPLOYEENAME = '$NewEmployeeName' WHERE REGISTRYCODE = '$RegistryCode'";


				$sqlupdate = "UPDATE CUSTOMERINFO SET (BRIDE, GROOM, PHONE, EMAIL, WEDDINGDATE, SHOWERSDATE, REGISTRYDATE, STORE, EMPLOYEENAME) VALUES ('$NewBride', '$NewGroom', '$NewPhone', '$NewEmail', '$NewWeddingDate', '$NewShowersDate', '$NewRegistryDate', '$NewStore', '$NewEmployeeName')";


	<!-- <a class="btn btn-outline-success my-2 my-sm-0" type="button" id="copy" onclick="copyText()">Copy</a> -->



	<?php
      //connect to the database
      include('connect.php');
      if (isset($_POST['addsku'])) {
        $SearchCode = $_POST['searchcode'];
        // $BrideDb = "";
        // $GroomDb = "";
        // $PhoneDb = "";
        // $EmailDb = "";
        // $WeddingDb = "";
        // $ShowersDb = "";
        // $RegistryDb = "";
        // $StoreDb = "";
        // $EmployeeDb = "";
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
      
      <?php 
      echo '
            <div class="card border-dark mb-3 cxdata">
      <div class="card-header">Registry Account Details</div>
      <div class="card-body text-dark">
        <div class="row">
          <h5 class="card-title col-sm-4">Registry Code:</h5>
          <p class="card-text col-sm-4 text-uppercase" id="registry"><?php echo $SearchCode;?></p>
        </div>
        <div class="row">
          <h5 class="card-title col-sm-4">Bride Name:</h5>
          <p class="card-text col-sm-8" id="bride"></p>
        </div>
        <div class="row">
          <h5 class="card-title col-sm-4">Groom Name:</h5>
          <p class="card-text col-sm-8" id="groom"></p>
        </div>
        <div class="row">
          <h5 class="card-title col-sm-4">Contact Number:</h5>
          <p class="card-text col-sm-8" id="phone"></p>
        </div>
        <div class="row">
          <h5 class="card-title col-sm-4">Contact Email:</h5>
          <p class="card-text col-sm-8" id="email"></p>
        </div>
        <div class="row">
          <h5 class="card-title col-sm-4">Date of Wedding:</h5>
          <p class="card-text col-sm-8" id="weddingdate"></p>
        </div>
        <div class="row">
          <h5 class="card-title col-sm-4">Date of Showers:</h5>
          <p class="card-text col-sm-8" id="showersdate"></p>
        </div>
        <div class="row">
          <h5 class="card-title col-sm-4">Date of Registry:</h5>
          <p class="card-text col-sm-8" id="registrydate"></p>
        </div>
        <div class="row">
          <h5 class="card-title col-sm-4">Store of Registry:</h5>
          <p class="card-text col-sm-8" id="store"></p>
        </div>
        <div class="row">
          <h5 class="card-title col-sm-4">Registry Taken By:</h5>
          <p class="card-text col-sm-8" id="employeename"></p>
        </div>
        <p class="card-text">Please confirm with the customer that all the details above are correct. In case of any error, please copy the Registry Code and then click on Edit button below to edit the customer details.</p>
        <button class="btn btn-lg btn-warning btn-block" type="button" id="edit" name="edit" value="edit"><a href="searchregistry.php">Edit Customer Details</a></button>
      </div>
    </div>
    ';
    }
    }
    else {
      echo '0 results';
    }
    }

      ?>











      <form name="updateform" id="updateform" class="card form-addsku" method="post" action="addproducts.php">
        <h3 class="form-title">Add Product Details Here</h3>
        
        <div class="form-group row">
          <div class="col-sm-3">
            <input type="text" name="regcode" id="regcode" class="form-control" placeholder="Registry Code" value="<?php echo $SearchCode;?>" required readonly>
          </div>
          <div class="col-sm-3">
            <input type="text" name="skunumber" id="skunumber" class="form-control" placeholder="Product SKU" required>
          </div>
          <div class="col-sm-3">
            <input type="text" name="description" id="description" class="form-control" placeholder="Product Description" required>
          </div>
          <div class="col-sm-3">
            <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Product Quantity" required>
          </div>
        </div>
        <button class="btn btn-primary btn-block" type="submit" id="productadd" name="productadd" value="update"><a>Add Above Products to Registry</a></button>
      </form>
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