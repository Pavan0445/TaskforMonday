<?php include 'head.php' ?>
<?php include 'dbConn.php'?>
<?php 

$Appointment_id = $_POST['Appointment_id'];
$sql2 = "select * from Patient where Patient_id in (select Patient_id from Appointments where Appointment_id='".$Appointment_id."')";
$details = $conn->query($sql2);
foreach($details as $detail){
    $email = $detail['email'];
}
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
 $mail->addAddress($email);

$sql = "update Appointments set status='Appointment Accepted' where Appointment_id='".$Appointment_id."'";
if($conn->query($sql)==TRUE){
    $mail->Body = "Your Booked Appointment is Accepted by Doctor \n . click this link to cancel the Appointment\n http://localhost/Appointment/cancel_appointment.php?Appointment_id=$Appointment_id; \n Or Reschedule  Appointment click this link \n http://localhost/Appointment/reschedule_appointment.php?Appointment_id=$Appointment_id";

    if($mail->send()){
        echo 'Mail Sent';
    }else{
        echo'error';
    }
    $mail->smtpClose();
    $url =  "viewAppointments.php";
    header("Location:".$url);

}

?>