<?php
$connect = 	mysqli_connect("localhost","root","","miniproject") or die("Connection failed!". $conn->error);
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM laptops
	WHERE brand LIKE '%".$search."%'
	OR name LIKE '%".$search."%' 
	
	";
}
else
{
	$query = "
	SELECT * FROM laptops ORDER BY id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>brand</th>
							<th>name</th>
						
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["brand"].'</td>
				<td>'.$row["name"].'</td>
			
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>