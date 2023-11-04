<?php include 'head.php' ?>
<?php include 'dbConn.php'?>

<?php 
$Appointment_id = $_POST['Appointment_id'];
$sql4 = "select * from Appointments where Appointment_id='".$Appointment_id."'" ;
$Appointments = $conn->query($sql4);
foreach($Appointments as $Appointment){
    $prescription = $Appointment['prescription'];
    $prescription_date = $Appointment['prescription_date'];
    $cause = $Appointment['cause'];
    $booking_date = $Appointment['booking_date'];
    $booked_by = $Appointment['booked_by'];
    $Patient_id = $Appointment['Patient_id'];
    $slot_id = $Appointment['slot_id'];
    $sql4 = "select * from Patient where Patient_id='".$Appointment['Patient_id']."'" ;
    $Patients = $conn->query($sql4);
    foreach($Patients as $Patient){
        $name = $Patient['name'];
        $email = $Patient['email'];
    }
    $sql6 = "select * from slots where slot_id='".$Appointment['slot_id']."'" ;
    $slots = $conn->query($sql6);
    foreach($slots as $slot){
        $Timing_id = $slot['Timing_id'];
        $sql7 = "select * from timings where Timing_id='".$slot['Timing_id']."'" ;
        $timings = $conn->query($sql7);
        foreach($timings as $timing){
            $Doctor_id = $timing['Doctor_id'];
            $sql8 = "select * from doctors where Doctor_id='".$timing['Doctor_id']."'" ;
            $doctors = $conn->query($sql8);
            foreach($doctors as $doctor){
                $name = $doctor['name'];
                $designation = $doctor['designation'];
            }
        }

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

$sql = "update Appointments set status='Doctor Prescribed and Patient Checked Out' where Appointment_id='".$Appointment_id."'";
    if($conn->query($sql)==TRUE){
        $mail->Body = "This is your In-Voice "."<br>". "Patient Name : $name" ."<br>". "Patient Email : $email" ."<br>". "Consulted Doctor : $name" ."<br>". "Specialist : $designation" ."<br>". "Cause : $cause" ."<br>". "Booking Date : $booking_date" ."<br>". "Booked By : $booked_by" ."<br>". "Prescription Date : $prescription_date" ."<br>". "Prescription : $prescription";
        if($mail->send()){
            echo 'Mail Sent';
        }else{
            echo'error';
        }
        $mail->smtpClose();
        $url =  "msg.php?msg=Patient Checked Out&color=text-danger";
        header("Location:".$url);
    
    }
?>