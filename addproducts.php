<?php
session_start();
if(!isset($_SESSION["sess_user"])){
    header("location:storelogin.php");
} else {

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- disallow browser cache -->
    <meta HTTP-EQUIV="Pragma" content="no-cache">
    <meta HTTP-EQUIV="Expires" content="-1" >
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
          <li class="nav-item active">
            <a class="nav-link" href="addproducts.php">Add Products to Registry</a>
          </li>
        </ul>
        <button class="btn btn-danger" type="button"><a href="storelogout.php">Logout</a></button>
      </div>
    </nav>

    <div class="text-center">
      <form name="addsearch" class="card form-search" method="post" action="">
        <h3 class="form-title">Add Products to Registry</h3>
        <div class="form-group row">
          <input class="form-control col-sm-7" type="text" name="searchcode" placeholder="Enter the Registry Code">
          <button class="btn btn-warning col-sm-4 offset-1" name="addsku" type="submit">Search</button>
        </div>
      </form>

      
      <?php
  include 'connect.php';
  if (isset($_POST['productadd'])) {
  $RegCode = $_POST['regcode'];
  $SkuNumber = $_POST['skunumber'];
  $Description = $_POST['description'];
  $Quantity = $_POST['quantity'];
  
  $sql = "INSERT INTO CUSTOMERPRODUCTS (REGISTRYCODE, SKUNUMBER, DESCRIPTION, QUANTITY) VALUES ('$RegCode', '$SkuNumber', '$Description', '$Quantity')";
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
  header('url:addproducts.php');
  }
?>

      <?php
      //connect to the database
      include('connect.php');
      if (isset($_POST['addsku'])) {
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
      document.getElementById("regcode").value = "<?php echo $SearchCode;?>";
      }
      </script>

      <script type="text/javascript">

        var num = 1;
        function addProductRow() {

          
          var e = $('<div class="form-group row"><div class="col-sm-4"><input type="text" name="skunumber" id="skunumber" class="form-control" placeholder="Product SKU" required></div><div class="col-sm-4"><input type="text" name="description" id="description" class="form-control" placeholder="Product Description" required></div><div class="col-sm-4"><input type="text" name="quantity" id="quantity" class="form-control" placeholder="Product Quantity" required></div></div>');
            $('#productRow').append(e);
            e.attr('id', 'newProductRow');
            num += 1;
            // alert(num);
            console.log(num);
            }
      </script>
      <?php
      echo'

        <form name="updateform" id="updateform" class="card form-registry" method="post" action="">
        <h2 class="form-title">Search Results</h2>
        
        <div class="form-group row">
          <label for="newregistrycode" class="col-sm-4 col-form-label">Registry Code:</label>
          <div class="col-sm-8">
            <input type="text" name="newregistrycode" id="newregistrycode" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="bride" class="col-sm-4 col-form-label">Bride Name:</label>
          <div class="col-sm-8">
            <input type="text" name="newbride" class="form-control" id="newbride" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="groom" class="col-sm-4 col-form-label">Groom Name:</label>
          <div class="col-sm-8">
            <input type="text" name="newgroom" id="newgroom" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="phone" class="col-sm-4 col-form-label">Contact Number:</label>
          <div class="col-sm-8">
            <input type="text" name="newphone" id="newphone" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-4 col-form-label">Contact Email:</label>
          <div class="col-sm-8">
            <input type="email" name="newemail" id="newemail" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="weddingdate" class="col-sm-4 col-form-label">Date of Wedding:</label>
          <div class="col-sm-8">
            <input type="Date" name="newweddingdate" id="newweddingdate" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="showersdate" class="col-sm-4 col-form-label">Date of Showers:</label>
          <div class="col-sm-8">
            <input type="Date" name="newshowersdate" id="newshowersdate" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="registrydate" class="col-sm-4 col-form-label">Date of Registry:</label>
          <div class="col-sm-8">
            <input type="Date" name="newregistrydate" id="newregistrydate" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="store" class="col-sm-4 col-form-label">Store of Registry:</label>
          <div class="col-sm-8">
            <input type="text" name="newstore" id="newstore" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="employeename" class="col-sm-4 col-form-label">Registry Taken By:</label>
          <div class="col-sm-8">
            <input type="text" name="newemployeename" id="newemployeename" class="form-control" readonly>
          </div>
        </div>
      </form>
      <form name="updateform" id="updateform" class="card form-addsku" method="post" action="addproducts.php">
        <h3 class="form-title">Add Product Details Here</h3>
        <div class="row">
        <div class="col-sm-4">
          <label for="regcode" class="form-label">Registry Code:</label>
        </div>
        <div class="col-sm-4">
          <input type="text" name="regcode" id="regcode" class="form-control" placeholder="Registry Code" required readonly>
        </div>
        <button class="btn btn-success col-sm-4" name="addRow" onClick="addProductRow()" type="submit">Add Row to Enter Product</button>
        </div>
        <br>
        <div id="productRow">
        <div class="form-group row">
          
          <div class="col-sm-4">
            <input type="text" name="skunumber" id="skunumber" class="form-control" placeholder="Product SKU" required>
          </div>
          <div class="col-sm-4">
            <input type="text" name="description" id="description" class="form-control" placeholder="Product Description" required>
          </div>
          <div class="col-sm-4">
            <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Product Quantity" required>
          </div>
        </div>
        </div>
        
        <button class="btn btn-primary btn-block" type="submit" id="productadd" name="productadd" value="update"><a>Add Above Products to Registry</a></button>
      </form>

      <script>
        searchResult();
      </script>';
      }
      }
      else {
      echo '<div class="alert alert-warning alert-dismissible fade show" style="width: 460px; margin: 0 auto;" role="alert">
  <strong>Make Sure you have entered right Registry Code</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
      }
      }
      ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
  </body>
</html>
<?php
}
?>