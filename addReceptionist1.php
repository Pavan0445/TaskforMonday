<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php 
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$sql = "select * from Receptionists where email='".$email."'";
$results = $conn->query($sql);
$sql2 = "select * from Receptionists where phone='".$phone."'";
$results2 = $conn->query($sql2);
if ($results ->num_rows > 0){
    $url = "msg.php?msg=$email  Email Exists &color=text-danger";
    header("Location:".$url);

}elseif($results2 ->num_rows > 0){
    $url = "msg.php?msg=$phone Number Exists &color=text-danger";
    header("Location:".$url);
}
    else{
    $sql3 = "insert into Receptionists(name,phone,email,password)values('".$name."','".$phone."','".$email."','".$password."')"; 
    if($conn->query($sql3)==TRUE){
        $url =  "msg.php?msg=Receptionist Added Successfully&color=text-success";
        header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&color=text-danger";
        header("Location:".$url);
    }
}




?>
