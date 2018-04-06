<?php
			include ('connect.php');
			
				$RegCode = $_POST['registryCode'];
				$SkuNumber = "";
				$Description = "";
				$Quantity = "";
				$Notes = "";
				$Gifted = "";
				$query = "SELECT * FROM CUSTOMERPRODUCTS WHERE REGISTRYCODE = '$RegCode'";
				$result = mysqli_query($con, $query) or mysqli_error($con);
				if(mysqli_num_rows($result) > 0)
				{
				while($row=mysqli_fetch_array($result))
				{
					echo "<tr contenteditable='true'>";
					echo "<td>".$row['SKUNUMBER']."</td>";
					echo "<td>".$row['DESCRIPTION']."</td>";
					echo "<td>".$row['QUANTITY']."</td>";
					echo "<td>".$row['NOTES']."</td>";
					echo "<td>".$row['GIFTED']."</td>";
					echo "</tr>";
				}
			}
				else {
					echo '0';
				}
				
				
?>
