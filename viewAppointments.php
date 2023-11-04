<?php include 'head.php'?>
<?php include 'dbConn.php'?>
<?php 

if($_SESSION['role']=='Patient'){
$sql = "select * from Appointments where Patient_id='".$_SESSION['Patient_id']."'";
}elseif($_SESSION['role']=='Doctor'){
 $sql = "select * from Appointments where slot_id in (select slot_id from slots where Timing_id in (select Timing_id from Timinigs where Doctor_id='".$_SESSION['Doctor_id']."') )";
}elseif($_SESSION['role']=='Receptionist'){
 $sql = "select * from Appointments";
}
// echo $sql;
$appointments = $conn->query($sql);

?>
<div class="container mt-2">
    <div class="text-center h6" style="font-size: 12px;">View Appointments</div>
    <div class="row">
        <?php foreach($appointments as $appointment){
        $sql2 = "select * from slots where slot_id ='".$appointment['slot_id']."'  ";
        $slots = $conn->query($sql2);
        $sql3 = "select * from Patient where Patient_id='".$appointment['Patient_id']."'" ;
        $Patients = $conn->query($sql3);
        
        
        ?>
        <?php foreach($slots as $slot){ 
            $sql4 = "select * from Timinigs where Timing_id='".$slot['Timing_id']."'" ;
            $slot_timings = $conn->query($sql4);
            foreach($slot_timings as $slot_timing){
                $sql5 = "select * from Doctors where Doctor_id='".$slot_timing['Doctor_id']."'" ;
                $doctors = $conn->query($sql5);
            }
            ?>
            <?php  foreach($doctors as $doctor) { ?>
     
        <div class="col-md-6" >
            <div class="card p-2">
                   <div class="row">
                    <div class="text-center h6" style="font-size: 10px;">Doctor Details</div>
                        <div class="col-md-4"> 
                            <div class="" style="font-size:12px">Doctor Name</div>
                            <div class="h6" style="font-size:12px"><?php echo $doctor['name'] ?></div>
                        </div>
                       <div class="col-md-4">
                           <div class="" style="font-size:12px">Doctor Phone</div>
                           <div class="h6" style="font-size:12px"><?php echo $doctor['phone'] ?></div>
                       </div>
                        <div class="col-md-4">
                            <div class="" style="font-size:12px">Designation</div>
                            <div class="h6" style="font-size:12px"><?php echo $doctor['designation'] ?></div>
                        </div>
                        <div class="col-md-4">
                            <div class="" style="font-size:12px">Qualification</div>
                            <div class="h6" style="font-size:12px"><?php echo $doctor['qualification'] ?></div>
                        </div>
                        <div class="col-md-4">
                            <div class="" style="font-size:12px">Email</div>
                            <div class="h6" style="font-size:10px"><?php echo $doctor['email'] ?></div>
                        </div>
                       <hr>
                        <div class="col-md-4">
                            <div class="" style="font-size:12px">Slot Number </div>
                            <div class="h6" style="font-size:12px"><?php echo $slot['slot_number']?></div>
                        </div>

                        <div class="col-md-4">
                            <div class="" style="font-size:12px">Appointment Time</div>
                            <div class="h6" style="font-size:12px"><?php echo $slot['from_time'] ?> - <?php echo $slot['to_time'] ?></div>
                    </div>
                    <div class="col-md-4">
                            <div class="" style="font-size:12px">Booking  Status</div>
                           <div class="h6" style="font-size:12px;color:chocolate"><?php echo $appointment['status'] ?></div>
                       </div>
                        <div class="col-md-4">
                            <div class="" style="font-size:12px">Booking  Date</div>
                           <div class="h6" style="font-size:12px"><?php echo $appointment['booking_date'] ?></div>
                       </div>
                       <div class="col-md-4">
                            <div class="" style="font-size:12px">Appointment BookedBy</div>
                           <div class="h6" style="font-size:12px"><?php echo $appointment['booked_by'] ?></div>
                       </div>
                       <hr>
                       <div class="text-center" style="font-size: 11px;">Patient Details</div>
                       <?php foreach($Patients as $Patient){ ?>
                        <div class="col-md-4">
                           <div class="" style="font-size:12px">Patient Name</div>
                           <div class="h6" style="font-size:12px"><?php echo $Patient['name']?></div>
                       </div>
                        <div class="col-md-4">
                           <div class="" style="font-size:12px">Phone</div>
                           <div class="h6" style="font-size:12px"><?php echo $Patient['phone']?></div>
                       </div>
                         <div class="col-md-4">
                            <div class="" style="font-size:12px">Gender</div>
                           <div class="h6" style="font-size:12px"><?php echo $Patient['gender']?></div>
                       </div>
                       <div class="col-md-4">
                            <div class="" style="font-size:12px">Age</div>
                           <div class="h6" style="font-size:12px"><?php echo $Patient['age']?></div>
                       </div>
                       <div class="col-md-4">
                            <div class="" style="font-size:12px">Email</div>
                           <div class="h6" style="font-size:10px"> <?php echo $Patient['email']?></div>
                       </div>



                </div>
                <?php } ?>
                <?php } ?>
                <hr>
                <div class="card-body">
                    <div class="text-secondary" style="font-size:12px">Cause</div>
                    <div class="h6" style="height:30px;overflow:auto;font-size:12px"><?php echo $appointment['cause'] ?></div>
                      <div class="text-secondary" style="font-size:12px">Prescription</div>
                    <div class="h6" style="height:35px;overflow:auto;font-size:12px"><?php echo $appointment['prescription'] ?> </div>
                    <?php 
                    if($_SESSION['role']=='Doctor'){ ?>
                        <form action="view_history.php" method="post">
                            <input type="hidden" name="Patient_id" value="<?php echo $Patient['Patient_id'] ?>">
                            <input type="submit" value="View History" class="btn btn-secondary w-100">
                        </form>
                    <?php }                    
                    ?>
                    <?php 
                    if($_SESSION['role']=='Receptionist'){
                        if($appointment['status']=='Appointment Accepted'){ ?>
                        <form action="check_in.php" method="post">
                            <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                            <input type="submit" value="Check In" class="btn btn-primary w-100">
                        </form>
                    <?php }  
                    }                  
                    ?>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <?php if($_SESSION['role']=='Doctor'){
                            if($appointment['status']=='Appointment Booked'){ ?>
                            
                            <form action="reject_appointment.php" method="post">
                                <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                                <input type="submit" value="Reject Appointment" class="btn btn-danger w-100">
                            </form>
                            <?php } ?>
                            <?php } elseif($_SESSION['role']=='Receptionist'){
                                if($appointment['status']=='Appointment Booked'){ ?>
                            <form action="bookingStatus.php" method="post">
                                <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                                <input type="submit" value="Cancel Appointment" class="btn btn-danger w-100">
                            </form>
                            <?php } ?>
                            <?php } elseif($_SESSION['role']=='Patient'){
                                if($appointment['status']=='Appointment Booked'){ ?>
                                <?php 
                                date_default_timezone_set('Asia/Kolkata');
                                $booking_date = $appointment['booking_date'];
                                $from_time = $slot['from_time'];
                                $newformat = $booking_date." ".$from_time;
                                $newformat = strtotime ( $newformat );
                                $newformat = date('Y-m-d H:i',$newformat);
                                $currentDate = date('Y-m-d H:i');
                                // echo "current date : ".$currentDate."<br>";
                                // echo "booked date : ".$newformat."<br>";
                                
                                $newformat = strtotime($newformat);
                                $currentDate = strtotime($currentDate);
                                // echo "current date : ".$currentDate."<br>";
                                // echo "booked date : ".$newformat."<br>";
                                $hour = round(($newformat - $currentDate)/3600, 1);
                                // echo $hour;
                                if ($hour > 24){ ?>
                                    <form action="bookingStatus.php" method="post">
                                        <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                                        <input type="submit" value="Cancel Appointment" class="btn btn-danger w-100">
                                    </form>
                                <?php }else{?>
                                       <div style="color:red;" class="h6 m-3"><?php echo "You can't cancel the appointment"; ?></div>
                               <?php } ?>
                            <?php } ?>
                            <?php } ?>
                            <?php 
                                if($_SESSION['role']=='Receptionist'){
                                if($appointment['status']=='Doctor Prescribed'){ ?>
                                <form action="check_out.php" method="post">
                                    <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                                    <input type="submit" value="Check Out" class="btn btn-primary w-100">
                                </form>
                                <?php }  
                                }                  
                            ?>
                            <?php if($_SESSION['role']=='Doctor'){ 
                                if($appointment['status']=='Doctor Prescribed'){?>
                                <form action="addLabTests.php" method="post">
                                 <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                                 <input type="submit" value="Add LabTests" class="btn btn-primary w-100">
                             </form>
                             <?php } ?>
                             <?php } ?>
                             
                        </div>
                         <div class="col-md-6">
                         <?php if($_SESSION['role']=='Doctor'){
                            if($appointment['status']=='Appointment Booked'){ ?>
                               <form action="acceptAppointment.php" method="post">
                                 <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                                 <input type="submit" value="Accept Appointment" class="btn btn-success w-100">
                             </form>
                            
                             <?php } ?>
                            
                             <?php if($appointment['status']=='Patient Checked In'){?>
                             <form action="writePrescription.php" method="post">
                                 <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                                 <input type="submit" value="Write Prescription" class="btn btn-primary w-100">
                             </form>
                             <?php } ?>
                             <?php } ?>
                             <?php if($_SESSION['role']=='Doctor'){ 
                                if($appointment['status']=='Doctor Prescribed'){?>
                                <form action="viewLabTests.php" method="post">
                                 <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                                 <input type="submit" value="View LabTests" class="btn btn-primary w-100">
                             </form>
                            <?php } ?>
                             <?php } ?>
                             <?php if($_SESSION['role']=='Patient'){ 
                                if($appointment['status']=='Doctor Prescribed'){?>
                                <form action="viewLabTests.php" method="post">
                                 <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                                 <input type="submit" value="View LabTests" class="btn btn-primary w-100">
                             </form>
                            <?php } ?>
                             <?php } ?>
                             <?php if($_SESSION['role']=='Patient'){ 
                                if($appointment['status']=='Doctor Prescribed and Patient Checked Out'){?>
                                <form action="viewLabTests.php" method="post">
                                 <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                                 <input type="submit" value="View LabTests" class="btn btn-primary w-100">
                             </form>
                            <?php } ?>
                             <?php } ?>
                             <?php if($_SESSION['role']=='Receptionist'){ 
                                if($appointment['status']=='Doctor Prescribed and Patient Checked Out'){?>
                                <form action="viewLabTests.php" method="post">
                                 <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                                 <input type="submit" value="View LabTests" class="btn btn-primary w-100">
                             </form>
                            <?php } ?>
                             <?php } if($_SESSION['role']=='Receptionist'){ 
                                if($appointment['status']=='Doctor Prescribed'){?>
                                <form action="viewLabTests.php" method="post">
                                 <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                                 <input type="submit" value="View LabTests" class="btn btn-primary w-100">
                             </form>
                            <?php } ?>
                             <?php } ?>
                           
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
    </div>
    </div>

    <!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url('<?php echo 'uploads/pic12.jpg'; ?>');
            background-size: cover;
            background-position: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>

</body>
</html>