<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php 
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$sql = "insert into Patient(name,phone,email,password,gender,age)
values('".$name."', '".$phone."', '".$email."', '".$password."','".$gender."','".$age."')"; 
if($conn->query($sql)==TRUE){
   $url =  "msg.php?msg=Patient Registered Successfully&color=text-success";
   header("Location:".$url);
}else{
    $url = "msg.php?msg=Something Went Wrong&color=text-danger";
    header("Location:".$url);
}
?>