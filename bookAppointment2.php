<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>

<?php 
$slot_id = $_POST['slot_id'];
$Doctor_id = $_POST['Doctor_id'];
$booking_date = $_POST['booking_date'];
$cause = $_POST['cause'];
if($_SESSION['role']=='Patient'){
    $sql2 = "select count(*) as total from appointments where booking_date = '".$booking_date."' and Patient_id = '".$_SESSION['Patient_id']."' and slot_id in (select slot_id from slots where Timing_id in (select Timing_id from timinigs where Doctor_id='".$Doctor_id."'))";
    $appointments = mysqli_query($conn, $sql2);
    $data = mysqli_fetch_assoc($appointments);
    echo $data['total'];
    if($data['total'] > 0){
        echo "hiiiii";
        $url =  "msg.php?msg=Already You have Appointment with this doctor&color=text-danger";
            header("Location:".$url);  
    }else{
        $sql = "insert into Appointments(cause,booking_date,booked_by,Patient_id,slot_id) values ('".$cause."','".$booking_date."','".$_SESSION['role']."','".$_SESSION['Patient_id']."','".$slot_id."')";
        if($conn->query($sql)==TRUE){
            echo "hii";
            $url =  "msg.php?msg=Appointment Booked on $booking_date&color=text-success";
            header("Location:".$url);  
        } 
        
    }
    
}elseif($_SESSION['role']=='Receptionist'){
    $Patient_id = $_POST['Patient_id'];
    echo $Patient_id;
    $sql = "insert into Appointments(cause,booking_date,booked_by,Patient_id,slot_id)
    values ('".$cause."','".$booking_date."','".$_SESSION['role']."','".$Patient_id."','".$slot_id."')";
    echo $sql;
    if($conn->query($sql)==TRUE){
       $url = "msg.php?msg=Appointment Booked on $booking_date&color=text-success";
       header("Location:".$url);   
   } 
}


?>

