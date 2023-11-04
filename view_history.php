<?php include 'head.php'?>
<?php include 'dbConn.php'?>
<?php 
$Patient_id = $_POST['Patient_id'];
if($_SESSION['role']=='Doctor'){
$sql = "select * from Appointments where Patient_id='".$Patient_id."' and status = 'Doctor Prescribed'";
}
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
                    <?php if($_SESSION['role']=='Doctor'){ 
                                if($appointment['status']=='Doctor Prescribed'){?>
                                <form action="viewLabTests.php" method="post">
                                 <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                                 <input type="submit" value="View LabTests" class="btn btn-primary w-100">
                             </form>
                            <?php } ?>
                             <?php }if($_SESSION['role']=='Doctor'){ 
                                if($appointment['status']=='Doctor Prescribed and Patient Checked Out'){?>
                                <form action="viewLabTests.php" method="post">
                                 <input type="hidden" name="Appointment_id" value="<?php echo $appointment['Appointment_id'] ?>">
                                 <input type="submit" value="View LabTests" class="btn btn-primary w-100">
                             </form>
                            <?php } ?>
                             <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
    </div>
    </div>