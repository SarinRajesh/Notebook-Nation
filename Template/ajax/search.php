<?php

$conn=mysqli_connect("localhost","root","","miniproject") or die("Connection failed!". $conn->error);
$searchValue = $_POST['searchValue'];

// Query the database for products that match the search value
$select_products = mysqli_query($conn, "SELECT * FROM `laptops` WHERE `name` LIKE '%$searchValue%'");

// Create an empty array to store the search results
$searchResults = array();

// Loop through the query results and add each product to the search results array
if(mysqli_num_rows($select_products) > 0) {
  while($row = mysqli_fetch_array($select_products)) {
    $searchResults[] = $row;
  }
}

// Send the search results back to the client as JSON
echo json_encode($searchResults);
?>