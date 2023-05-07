<?php
include('vehicle.php');

$query = "SELECT chasis_no, car_comp, year_of_purchase, car_type, car_id, cust_email";
$prepared = $conn->prepare($query);
$prepared->execute();
$result = $prepared->get_result();
?>

<?php
if ($result->num_rows > 0) {
  $sn=1;
  while($data = $result->fetch_assoc()) {
 ?>
 
 <?php
  $sn++;}
} else { 
  ?>
    

 <?php } ?>
