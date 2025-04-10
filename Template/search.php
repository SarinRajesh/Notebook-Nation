
<!DOCTYPE html>
<html>
<head>
	<title>Search Bar using PHP</title>
</head>
<body>

<form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit">
	
</form>

</body>
</html>

<?php

$conn = mysqli_connect("localhost","root","","miniproject") or die("Connection failed!". $conn->error);

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
    $query="select * from `laptops` WHERE Name = '$str'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);

	if( $result)
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Name</th>
				<th>Description</th>
			</tr>
			<tr>
				<td><?php echo $row['name']; ?></td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?>