<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "garage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$chasis_no = $_POST["chasis_no"];
$car_comp = $_POST["car_comp"];
$year_of_purchase = $_POST["year_of_purchase"];
$car_type = $_POST["car_type"];

// Insert data into table
$sql = "INSERT INTO vehicle_info (chasis_no, car_comp, year_of_purchase, car_type) 
        VALUES ('$chasis_no','$car_comp','$year_of_purchase','$car_type')";

if ($conn->query($sql) === TRUE) {
  header("Location: booking.html");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
