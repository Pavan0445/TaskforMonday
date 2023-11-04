<?php include 'head.php' ;?>
<?php  include 'dbConn.php '?>
<?php 
     $Appointment_id = $_GET['Appointment_id'];
     $sql = "update Appointments set status='Appointment Cancelled' where Appointment_id='".$Appointment_id."'";
    if($conn->query($sql)==TRUE){
        $url =  "msg.php?msg=Appointment Cancelled&color=text-danger";
        header("Location:".$url);
    }



?>