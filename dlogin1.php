<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php 
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "select * from Doctors where email='".$email."' and password='".$password."' ";
$results = $conn->query($sql);
$sql3 = "select * from Doctors where email='".$email."' and password='".$password."'";
$results3 = $conn->query($sql3);

if($results ->num_rows == 0){
    $url = "msg.php?msg=Invalid Login Details&color=text-danger";
    header("Location:".$url);
}elseif($results3->num_rows > 0) { 
    while($row = $results3->fetch_assoc()) {
        if($row["status"]==='UnAuthorized'){
            $url = "msg.php?msg=Your  Account not  Verified&color=text-primary";
            header("Location:".$url);
        }else{
            $_SESSION["role"] = 'Doctor';
            $_SESSION["Doctor_id"] = $row["Doctor_id"];
            $url = "dhome.php";
            header("Location:".$url);
        }
       
    }
}
else{
    $url = "msg.php?msg=Invalid Login Details&color=text-danger";
    header("Location:".$url);
}



?>
