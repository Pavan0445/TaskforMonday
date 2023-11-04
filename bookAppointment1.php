<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>

<?php 
$Doctor_id = $_POST['Doctor_id'];
$slot_id = $_POST['slot_id'];
$booking_date = $_POST['booking_date'];
$Patient_id = $_POST['Patient_id'];
$sql  = "select * from Doctors where Doctor_id='".$Doctor_id."'";
$results = $conn->query($sql);
?>
<form action="bookAppointment2.php" method="post">
<div class="row mt-2">
<div class="col-md-1"></div>

    <div class="col-md-4 ms-2">
        <div class="card p-4 mt-5">
        <input type="hidden" name="slot_id" value="<?php echo $slot_id?>">
        <input type="hidden" name="Doctor_id" value="<?php echo $Doctor_id?>">
        <input type="hidden" name="Patient_id" value="<?php echo $Patient_id?>">

                <input type="hidden" name="Patient_id" value="<?php echo $Patient_id?>">
                <input type="hidden" name="booking_date" value="<?php echo $booking_date?>">
                <div class="h4 text-center ">Enter Cause</div>
                <div class="form-group mt-2">
                    <label for="cause"></label>
                    <textarea  class="form-control mt-1 p-2" id="cause" placeholder="Cause" name="cause" required></textarea>
                </div>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
    <div class="card p-3 mt-5">
        <?php foreach($results as $result){ ?>
        <div class="text-center h5">Consultation_Fee : $ <?php echo $result['consultation_fee'] ?></div>
        <?php } ?>
        <div class="form-group mt-1">
            <label for="cardNumber">Card Number</label>
            <input type="text" class="form-control p-3" id="cardNumber" placeholder="Enter CardNumber" name="cardNumber" required>
        </div>
            <div class="form-group">
            <label for="nameonCard">Name On Card</label>
            <input type="text" class="form-control p-3" id="nameonCard" placeholder="NameOnCard" name="nameonCard" required>
        </div>
        <div class="form-group mt-2">
            <label for="cvv">CVV</label>
            <input type="number" class="form-control p-3" id="cvv" placeholder="Enter CVV" name="cvv" required>
        </div>
            <div class="form-group mt-2">
            <label for="ExpDate">Exp Date</label>
            <input type="number" class="form-control p-3" id="ExpDate" placeholder="Expiry Date" name="ExpDate" required>
        </div>
        <div class="mt-2">
        <input type="submit" value="Book" class="btn btn-primary w-100 p-1 mt-3">
        </div>
    </div>
        </div>
        
  
</div>
</form>
