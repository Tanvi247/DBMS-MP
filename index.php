<?php
$emp_email = $_POST['emp_email'];
$emp_password = $_POST['emp_password'];

// Database connection
$conn = new mysqli('admin','root','','test');
if($conn->connect_error){
echo "$conn->connect_error";
die("Connection Failed : ". $conn->connect_error);
} else {
$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $emp_email, $emp_password);
$execval = $stmt->execute();
echo $execval;
echo "Registration successfully...";
$stmt->close();
$conn->close();
}
?>
