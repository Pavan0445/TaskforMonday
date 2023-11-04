<?php include 'head.php' ?>
<?php include 'dbConn.php'?>
<?php 
$target_path = "uploads/";  
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$qualification = $_POST['qualification'];
$designation = $_POST['designation'];
$specialist = $_POST['specialist'];
$experience = $_POST['experience'];
$about_doctor = $_POST['about_doctor'];
$consultation_fee = $_POST['consultation_fee'];
// $picture = $_FILES['picture'];
$target_path = $target_path.basename($_FILES['picture']['name']);   
    echo $target_path;
    if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_path)) {  
        echo "File uploaded successfully!";  
    } else{  
        echo "Sorry, file not uploaded, please try again!";  
    }  
$picture = $_FILES["picture"]["name"];
$sql = "insert into Doctors(name,phone,email,password,gender,qualification,designation,experience,picture,about_doctor,consultation_fee,specialist)
values('".$name."', '".$phone."', '".$email."', '".$password."','".$gender."','".$qualification."','".$designation."',   '".$experience."','".$picture."', '".$about_doctor."', '".$consultation_fee."', '".$specialist."')"; 

if($conn->query($sql)==TRUE){
   $url =  "msg.php?msg=Doctor Registered Successfully&color=text-success";
   header("Location:".$url);
}else{
    $url = "msg.php?msg=Something Went Wrong&color=text-danger";
    header("Location:".$url);
}
?>