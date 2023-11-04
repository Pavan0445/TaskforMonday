<?php include 'head.php' ?>
<?php include 'dbConn.php'?>
<?php 
require 'includes/PhpMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';


use PhpMailer\PhpMailer\PhpMailer;
use PhpMailer\PhpMailer\SMTP;
use PhpMailer\PhpMailer\Exception;

$mail = new PhpMailer();


$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = "true";
$mail->SMTPSecure = "tls";
$mail->Port = "587";
$mail->Username = "onlineclinicappointments@gmail.com";
$mail->Password = "ijhyqbuamakjhmgo";
$mail->Subject = "Online Clinic" ;

$mail->setFrom("onlineclinicappointments@gmail.com");
$mail->isHTML(true);




$date = $_POST['date'];
$Timing_id = $_POST['Timing_id'];
$sql = "select * from slots where Timing_id='".$Timing_id."'";
$slotss = $conn->query($sql);
$sql2 = "select count(*) as total from appointments where booking_date = '".$date."' and slot_id in (select slot_id from slots where Timing_id='".$Timing_id."') and status = 'Appointment Booked' or status = 'Appointment Accepted'";
$appointments = mysqli_query($conn, $sql2);
$data = mysqli_fetch_assoc($appointments);

$sql3 = "select * from appointments where booking_date = '".$date."' and slot_id in (select slot_id from slots where Timing_id='".$Timing_id."') and status = 'Appointment Booked' or status = 'Appointment Accepted'";
$appointments = $conn->query($sql3);
foreach($appointments as $appointment){
    $Patient_id = $appointment['Patient_id'];
    echo $Patient_id;
    $sql4 = "select * from Patient where Patient_id='".$Patient_id."'" ;
    $Patients = $conn->query($sql4);
    foreach($Patients as $Patient){
        $name = $Patient['name'];
        $email = $Patient['email'];
        $mail->addAddress($email);
        $mail->Body = "Doctor was not availabe for today. So,Appointments are Cancelled by Your Doctor";
            if($mail->send()){
                echo 'Mail Sent';
            }else{
                echo'error';
            }
    echo $email;
    }
}


if($data['total']>0){
    foreach($slotss as $slots){
        $sql1 = "update appointments set status = 'Appointment Cancelled by Doctor'  where slot_id = '".$slots['slot_id']."' and status = 'Appointment Booked' or status = 'Appointment Accepted'";
        if($conn->query($sql1)==TRUE){
        }else {
            $url = "msg.php?msg=There are no Bookings&color=text-danger";
            header("Location:".$url);
        
        }
    }
}
?>