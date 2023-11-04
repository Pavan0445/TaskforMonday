<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php 
$Appointment_id = $_POST['Appointment_id'];
$test_name = $_POST['test_name'];
$description = $_POST['description'];
$sql = "insert into LabTests(test_name,description,Appointment_id) values('".$test_name."','".$description."','".$Appointment_id."')";
if($conn->query($sql)==TRUE){
    $url =  "msg.php?msg=LabTest Added&color=text-success";
    header("Location:".$url);
}
?>