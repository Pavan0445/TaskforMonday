<?php include 'head.php' ?>
<?php include 'dbConn.php'?>

<?php 
$Appointment_id = $_POST['Appointment_id'];
$sql = "update Appointments set status='Patient Checked In' where Appointment_id='".$Appointment_id."'";
    if($conn->query($sql)==TRUE){
        $url =  "msg.php?msg=Patient Checked In&color=text-danger";
        header("Location:".$url);
    }
?>