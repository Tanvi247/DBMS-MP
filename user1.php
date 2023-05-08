<?php
// Database configuration
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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the input values from the form
    $cust_name = $_POST["cust_name"];
    $cust_email = $_POST["cust_email"];
    $cust_password = $_POST["cust_password"];

    // Prepare the SQL statement to insert the data into the table
    $stmt = $conn->prepare("INSERT INTO cust_login (cust_name, cust_email, cust_password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $cust_name, $cust_email, $cust_password);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        // If the data is successfully inserted, redirect the user to the booking.html page
        header("Location: vehicle.html");
        exit();
    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
