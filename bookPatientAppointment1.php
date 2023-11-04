<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php 
$Doctor_id = $_POST['Doctor_id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$sql  ="select * from Patient where phone='".$phone."' or email='".$email."'";
$Patients = $conn->query($sql);
if($Patients ->num_rows > 0){
    foreach($Patients as $Patient){
        $Patient_id = $Patient['Patient_id'];
        $url =  "bookAppointment.php?Doctor_id=$Doctor_id&Patient_id=$Patient_id";
        header("Location:".$url);
    }
    
}else{
    $sql = "insert into Patient(name,phone,email,password,gender,age,Receptionist_id)values('".$name."', '".$phone."', '".$email."', '".$password."','".$gender."','".$age."','".$_SESSION['Receptionist_id']."')"; 
    echo $sql;
    if($conn->query($sql)==TRUE){
       $Patient_id = $conn->insert_id;
       $url =  "bookAppointment.php?Doctor_id=$Doctor_id&Patient_id=$Patient_id";
       header("Location:".$url);
    }else{
        $url = "msg.php?msg=Something Went Wrong&color=text-danger";
        header("Location:".$url);
    }
}

?>