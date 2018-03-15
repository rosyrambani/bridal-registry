<?php
			//connect to the database
			include('connect.php');
			if (isset($_POST['submitted'])) {

				$SearchCode = $_POST['searchcode'];
				$BrideDb = "rosy";
				$GroomDb = "rosy";
				$PhoneDb = "7274592395";
				$EmailDb = "test@testing.com";
				$WeddingDb = "23423";
				$ShowersDb = "37423";
				$RegistryDb = "32343";
				$StoreDb = "999";
				$EmployeeDb = "Heather";

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

					}
				}
				else {
    				echo "0 results";
				}

			}
?>