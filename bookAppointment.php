<?php include 'head.php'?>
<?php include 'dbConn.php'?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

$(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    var minDate= year + '-' + month + '-' + day;
    $('#booking_date2').attr('min', minDate);
}
);
</script>
<?php 
date_default_timezone_set('Asia/Kolkata');
// date_default_timezone_set('America/New_York');
$Doctor_id = $_GET['Doctor_id'];
if($_SESSION['role']=='Receptionist'){
    $Patient_id = $_GET['Patient_id'];
}
$booking_date = date('Y-m-d');
if(isset($_GET['booking_date'])){
    $booking_date = $_GET['booking_date'];
    $booking_date = date("Y-m-d", strtotime($booking_date));//String To OnlyDateFormat
}
$day = date('l', strtotime($booking_date));
$sql = "select * from slots where Timing_id in (select Timing_id from Timinigs where Doctor_id='".$Doctor_id."' and day='".$day."' and status='Activated')";
$results = $conn->query($sql);
?>
<div class="container">
    <div class="text-center">View Available Timings</div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <form action="bookAppointment.php">
                    <input type="hidden" name="Patient_id" value="<?php echo $Patient_id ?>">

                    <input type="hidden" name="Doctor_id" value="<?php echo $Doctor_id ?>">
                            <input type="date"  name="booking_date" value="<?php echo $booking_date ?>" onchange="this.form.submit()" id="booking_date2" class="mt-3 form-control" required>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                </div>
            </div>
              <div class="row">
                <?php foreach($results as $slot){
                    $sql = "select * from Appointments where slot_id='".$slot['slot_id']."' and booking_date='".$booking_date."'  and status!='Appointment Cancelled By Patient' and status!='Appointment Cancelled By Receptionist' and status!='Appointment Rejected By Doctor'";
                    $appointments = $conn->query($sql); 
                   ?>
                <div class="col-md-2">
                <form action="bookAppointment1.php" method="post">
                    <?php if($appointments ->num_rows > 0){ ?>
                        <label class="card p-3 m-3" style="background-color: red;">
                        <input type="hidden" name="slot_id"  value="<?php echo $slot['slot_id']?>" id="<?php echo $slot['slot_id']?><?php echo $slot['slot_number']?>">
                            Slot : <?php echo $slot['slot_number'] ?><br><?php echo $slot['from_time'] ?> - <?php echo $slot['to_time'] ?>
                            <input type="hidden" disabled  value="Select" class="btn btn-primary mt-1" style="font-size: 12px;"> 
                            <?php echo 'Slot Booked'; ?>   
                    </label>
           
                <?php } else{?>
                    <?php 
                        $from_time = $slot['from_time'];
                        $today_date = date("Y-m-d");
                        $today_time = date('h:i:s');
                        $today_time_date = date("Y-m-d h:i");
                        $today_time_date = date("Y-m-d H:i", strtotime($today_time_date));
                        $from_time_str = strval($booking_date)." ".strval($from_time);
                        $from_time_date = date("Y-m-d H:i", strtotime($from_time_str));
                        ?>
                        <?php if ($today_time_date < $from_time_date){ ?>
                            <label class="card p-3 m-3">
                                <input type="hidden" name="slot_id"  value="<?php echo $slot['slot_id']?>" id="<?php echo $slot['slot_id']?><?php echo $slot['slot_number']?>">
                                    Slot : <?php echo $slot['slot_number'] ?><br><?php echo $slot['from_time'] ?> - <?php echo $slot['to_time'] ?>
                                <input type="submit" value="Select" class="btn btn-primary mt-1" style="font-size: 12px;">    
                            </label>
                           <?php } else {?>
                        <label class="card p-3 m-3" style="background-color: darkgoldenrod;">
                             <input type="hidden" name="slot_id"  value="<?php echo $slot['slot_id']?>" id="<?php echo $slot['slot_id']?><?php echo $slot['slot_number']?>">
                                Slot : <?php echo $slot['slot_number'] ?><br><?php echo $slot['from_time'] ?> - <?php echo $slot['to_time'] ?>
                            <?php echo 'Slot Expired'; ?>
                           
                            
                        </label>
                       <?php } ?>
                    
                <input type="hidden" name="booking_date" value="<?php echo $booking_date ?>" >
                <input type="hidden" name="Doctor_id" value="<?php echo $Doctor_id ?>">
                <input type="hidden" name="Patient_id" value="<?php echo $Patient_id ?>">
                  <?php } ?>
                    </form>
                </div>

                <?php } ?>
            </div>

            
             <hr>

</div>