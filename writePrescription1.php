<?php include 'head.php'?>
<?php include 'dbConn.php'?>
<?php 
$Appointment_id = $_POST['Appointment_id'];
$prescription = $_POST['prescription'];
$sql = "update Appointments set prescription='".$prescription."', prescription_date = NOW(),  status='Doctor Prescribed' where Appointment_id='".$Appointment_id."'";
if($conn->query($sql)==TRUE){
    $url =  "viewAppointments.php";
    header("Location:".$url);
}


?>