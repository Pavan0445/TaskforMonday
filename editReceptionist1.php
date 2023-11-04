<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php 
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$Receptionist_id = $_POST['Receptionist_id'];

$sql = "update Receptionists set name = '".$name."',email='".$email."', phone='".$phone."', password='".$password."'  where Receptionist_id='".$Receptionist_id."'";
if($conn->query($sql)==TRUE){
    $url =  "viewReceptionist.php";
    header("Location:".$url);
   }else{
    $url = "msg.php?msg=Something Went Wrong&color=text-danger";
    header("Location:".$url);
}

?>