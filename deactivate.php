<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php 

$Receptionist_id = $_GET['Receptionist_id'];
echo $Receptionist_id;
$sql = "select * from Receptionists where Receptionist_id='".$Receptionist_id."'";
$results = $conn->query($sql);
foreach($results as $result){
  if($result['status']=='Authorized'){ 
    $sql = "update Receptionists set status='UnAuthorized' where Receptionist_id='".$Receptionist_id."'";
    if($conn->query($sql)==TRUE){
      $url =  "viewReceptionist.php";
      header("Location:".$url);
     }else{
      $url = "msg.php?msg=Something Went Wrong&color=text-danger";
      header("Location:".$url);
  }
    }else{
        $sql = "update Receptionists set status='Authorized' where Receptionist_id='".$Receptionist_id."'";
        if($conn->query($sql)==TRUE){
          $url =  "viewReceptionist.php";
          header("Location:".$url);
         }else{
          $url = "msg.php?msg=Something Went Wrong&color=text-danger";
          header("Location:".$url);
      }
    }
   
}


?>
