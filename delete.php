<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


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

// Check if the delete button has been clicked
if (isset($_POST["delete"])) {

    // Get the booking_id and slot values from the form
    $chasis_no = $_POST["chasis_no"];

    // Prepare the SQL statement to delete the data from the table
    $stmt = $conn->prepare("DELETE FROM booking WHERE chasis_no=?");
    $stmt->bind_param("is", $chasis_no);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        echo "Data deleted successfully!";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
