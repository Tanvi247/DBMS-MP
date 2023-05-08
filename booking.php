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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$date = $_POST['date'];
$time = $_POST['time'];

// Fetching customer email and chassis number from the database
$cust_email = "";
$chasis_no = "";


// Inserting the booking into the database
$booking_query = "INSERT INTO bookings (date, time) VALUES ('$date', '$time')";
mysqli_query($conn, $booking_query);
}

// Closing the database connection
mysqli_close($conn);
?>
