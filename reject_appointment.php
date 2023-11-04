<?php include 'head.php' ?>
<?php include 'dbConn.php'?>

<?php 
$Appointment_id = $_POST['Appointment_id'];
$sql4 = "select * from Appointments where Appointment_id='".$Appointment_id."'" ;
$Appointments = $conn->query($sql4);
foreach($Appointments as $Appointment){
    $status = $Appointment['status'];
    $booking_date = $Appointment['booking_date'];
    $sql4 = "select * from Patient where Patient_id='".$Appointment['Patient_id']."'" ;
    $Patients = $conn->query($sql4);
    foreach($Patients as $Patient){
        $name = $Patient['name'];
        $email = $Patient['email'];
    }
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

$sql = "update Appointments set status='Appointment Rejected By Doctor' where Appointment_id='".$Appointment_id."'";
    if($conn->query($sql)==TRUE){
        $mail->Body = "Dear $name your appointment $booking_datedoctor was cancelled. Please re-schedule your appointment.";
        if($mail->send()){
            echo 'Mail Sent';
        }else{
            echo'error';
        }
        $mail->smtpClose();
        $url =  "msg.php?msg=Appointment Rejected By Doctor&color=text-danger";
        header("Location:".$url);
    }
?>