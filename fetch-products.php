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
					echo "<tr class='row' contenteditable='true'>";
					echo "<td class='col-sm-2 item_sku'>".$row['SKUNUMBER']."</td>";
					echo "<td class='col-sm-4 item_description'>".$row['DESCRIPTION']."</td>";
					echo "<td class='col-sm-1 item_quantity'>".$row['QUANTITY']."</td>";
					echo "<td class='col-sm-4 item_notes'>".$row['NOTES']."</td>";
					echo "<td class='col-sm-1 item_gifted'>".$row['GIFTED']."</td>";
					echo "</tr>";
				}
			}
				else {
					echo '0';
				}
				
				
?>
