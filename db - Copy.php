<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Gift_store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from store";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<hr>id: " . $row["S_no"]. " - Name: " . $row["Category"]. " " . $row["Product_name"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
 