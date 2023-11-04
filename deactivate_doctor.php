<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php 

$Doctor_id = $_GET['Doctor_id'];
$sql = "select * from Doctors where Doctor_id='".$Doctor_id."'";
$results = $conn->query($sql);
foreach($results as $result){
  if($result['status']=='Authorized'){ 
    $sql = "update Doctors set status='UnAuthorized' where Doctor_id='".$Doctor_id."'";
    if($conn->query($sql)==TRUE){
      $url =  "view_actviate_Doctors.php";
      header("Location:".$url);
     }else{
      $url = "msg.php?msg=Something Went Wrong&color=text-danger";
      header("Location:".$url);
  }
    }else{
        $sql = "update Doctors set status='Authorized' where Doctor_id='".$Doctor_id."'";
        if($conn->query($sql)==TRUE){
          $url =  "view_actviate_Doctors.php";
          header("Location:".$url);
         }else{
          $url = "msg.php?msg=Something Went Wrong&color=text-danger";
          header("Location:".$url);
      }
    }
   
}


?>
