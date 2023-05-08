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

// Fetching customer email
$cust_login_query = "SELECT cust_email FROM cust_login";
$cust_login_result = mysqli_query($conn, $cust_login_query);
if(mysqli_num_rows($cust_login_result) > 0) {
    $row = mysqli_fetch_assoc($cust_login_result);
    $cust_email = $row['cust_email'];
}

// Fetching chassis number
$vehicle_info_query = "SELECT chasis_no FROM vehicle_info";
$vehicle_info_result = mysqli_query($conn, $vehicle_info_query);
if(mysqli_num_rows($vehicle_info_result) > 0) {
    $row = mysqli_fetch_assoc($vehicle_info_result);
    $chasis_no = $row['chasis_no'];
}

// Inserting the booking into the database
$booking_query = "INSERT INTO bookings (date, time, cust_email, chasis_no) VALUES ('$date', '$time', '$cust_email', '$chasis_no')";
mysqli_query($conn, $booking_query);
}

// Closing the database connection
mysqli_close($conn);
?>
