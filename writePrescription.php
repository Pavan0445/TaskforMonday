<?php include 'head.php'?>
<?php include 'dbConn.php'?>
<?php 
$Appointment_id = $_POST['Appointment_id'];

?>
<div class="row mt-2">
    <div class="col-md-4"></div>
    <div class="col-md-4 ms-2 mt-4">
        <div class="card p-4 mt-5">
            <div class="text-center h6">Wrie Prescription</div>
            <form action="writePrescription1.php" method="post">
            <input type="hidden" name="Appointment_id" value="<?php echo $Appointment_id?>">
                <div class="form-group">
                    <label for="prescription"></label>
                    <textarea  class="form-control mt-1" id="prescription" placeholder="Write Prescription"  name="prescription" required></textarea>
                </div>
               
                <input type="submit" value="Submit" class="btn btn-primary w-100 mb-2 mt-3">
            </form>
        </div>
    </div>
</div>