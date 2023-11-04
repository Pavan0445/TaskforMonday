<?php include 'head.php' ?>
<?php include 'dbConn.php'?>
<?php 
$Appointment_id = $_POST['Appointment_id'];
if($_SESSION['role']=='Patient'){
    $sql = "update Appointments set status='Appointment Cancelled By Patient' where Appointment_id='".$Appointment_id."'";
    if($conn->query($sql)==TRUE){
        $url =  "msg.php?msg=Appointment Cancelled By Patient&color=text-danger";
        header("Location:".$url);
    }
}elseif($_SESSION['role']=='Receptionist'){
    $sql = "update Appointments set status='Appointment Cancelled By Receptionist' where Appointment_id='".$Appointment_id."'";
    if($conn->query($sql)==TRUE){
        $url =  "msg.php?msg=Appointment Cancelled By Receptionist&color=text-danger";
        header("Location:".$url);
    }
}elseif($_SESSION['role']=='Receptionist'){
    $sql = "update Appointments set status='Patient Checked-In' where Appointment_id='".$Appointment_id."'";
    if($conn->query($sql)==TRUE){
        $url =  "msg.php?msg=Patient Checked-In&color=text-danger";
        header("Location:".$url);
    }
}
?>