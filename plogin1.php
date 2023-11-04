<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php 
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "select * from Patient where email='".$email."' and password='".$password."' ";
$results = $conn->query($sql);
$sql3 = "select * from Patient where email='".$email."' and password='".$password."'";
$results3 = $conn->query($sql3);

if($results ->num_rows == 0){
    $url = "msg.php?msg=Invalid Login Details&color=text-danger";
    header("Location:".$url);
}elseif($results3->num_rows > 0) { 
    while($row = $results3->fetch_assoc()) {
        $_SESSION["role"] = 'Patient';
        $_SESSION["Patient_id"] = $row["Patient_id"];
        $url = "phome.php";
        header("Location:".$url);
        
       
    }
}
else{
    $url = "msg.php?msg=Invalid Login Details&color=text-danger";
    header("Location:".$url);
}



?>

