<?php
// connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "garage";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// get form data
$emp_email = $_POST["emp_email"];
$emp_password = $_POST["emp_password"];

// insert data into emp_login table
$sql = "INSERT INTO emp_login (emp_email, emp_password) VALUES ('$emp_email', '$emp_password')";

if($conn->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
} else {
  // redirect the user to the admin2.html page
  header("Location: admin2.html");
}

// close database connection
$conn->close();
?>
