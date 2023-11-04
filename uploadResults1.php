<?php include 'head.php'?>
<?php include 'dbConn.php'?>

<?php 
$target_path = "uploads/";  
$Labtest_id = $_POST['Labtest_id'];
$test_result = $_POST['test_result'];
$test_status = $_POST['test_status'];
$target_path = $target_path.basename($_FILES['picture']['name']);   
    echo $target_path;
    if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_path)) {  
        echo "File uploaded successfully!";  
    } else{  
        echo "Sorry, file not uploaded, please try again!";  
    }  
$picture = $_FILES["picture"]["name"];
$sql = "insert into TestResults(test_result,test_status,picture,Labtest_id)values('".$test_result."', '".$test_status."', '".$picture."', '".$Labtest_id."')"; 

if($conn->query($sql)==TRUE){
   $url =  "msg.php?msg=Results Uploaded Successfully&color=text-success";
   header("Location:".$url);
}else{
    $url = "msg.php?msg=Something Went Wrong&color=text-danger";
    header("Location:".$url);
}

?>
