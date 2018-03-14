<?php

			if (isset($_POST['submitted'])) {

				//connect to the database
				include('connect.php');

				$SearchCode = $_POST['searchcode'];
				$query = "SELECT * FROM CUSTOMERINFO WHERE REGISTRYCODE = '$SearchCode'";
				$result = mysqli_query($con, $query) or die('error getting data');

				if(mysqli_num_rows($result) > 0) {

					while($row = mysqli_fetch_assoc($result)) {

						
						$BrideName=$row['BRIDE'];
						
						

					}
				}
			}
?>