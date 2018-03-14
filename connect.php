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
?>