<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php
// if($_SESSION['role']!='Patient'){
//     $url =  "plogin.php";
//     header("Location:".$url);
// }
$sql = "select * from Doctors where status= 'Authorized' ";
$specialist = '';
if(isset($_POST['specialist']) ){
$specialist = $_POST['specialist'];
    $sql = "select * from Doctors where status= 'Authorized' and specialist ='".$specialist."' ";
}
$Doctors = $conn->query($sql);
?>
<style>
    body {
        background-image: url("https://t3.ftcdn.net/jpg/02/60/79/68/360_F_260796882_QyjDubhDDk0RZXV9z7XBEw9AKnWCizXy.jpg");
        background-repeat: no-repeat;
        /* Do not repeat the image */
        background-size: cover;
        height: 200px;

    }
</style>
<div class="container">
    <div class="row">
            <div class="col-md-3">
                <form action="viewAvailableDoctors.php" method="post">
                    <div class="form-group mt-1">
                        <label for="specialist" class="h6">Specialist</label>
                        <select name="specialist" id="specialist" class="form-control" onchange="this.form.submit()">
                            <option value="" <?php if($specialist==''){ echo 'selected'; } ?>>Choose Specialist</option>
                            <option value="neurologist" <?php if($specialist=='neurologist'){ echo 'selected'; } ?>>Neurologist</option>
                            <option value="dermatologist" <?php if($specialist=='dermatologist'){ echo 'selected'; } ?>>Dermatologist</option>
                            <option value="psychiatrist" <?php if($specialist=='psychiatrist'){ echo 'selected'; } ?>>Psychiatrist</option>
                            <option value="surgeon" <?php if($specialist=='surgeon'){ echo 'selected'; } ?>>Surgeon</option>
                            <option value="gastroenterologist" <?php if($specialist=='gastroenterologist'){ echo 'selected'; } ?>>Gastroenterologist</option>
                            <option value="pediatrician" <?php if($specialist=='pediatrician'){ echo 'selected'; } ?>>Pediatrician</option>
                            <option value="internal_medicine" <?php if($specialist=='internal_medicine'){ echo 'selected'; } ?>>Internal medicine</option>
                        </select>
                    </div>
                </form>
            </div>
        <div class="col-md-6">
            <div class="text-center h6">View Doctors</div>
        </div>
        <div class="col-md-3"></div>
        <div class="row">
            <?php foreach ($Doctors as $Doctor) { ?>
                <div class="col-md-4">
                    <div class="card mt-4">
                        <img src="uploads/<?php echo $Doctor['picture'] ?>" style="height: 200px;width:100%">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-secondary" style="font-size:12px">Name: </div>
                                    <div class="h6" style="font-size:13px"><?php echo $Doctor['name'] ?></div>
                                    <div class="text-secondary" style="font-size:12px">Phone: </div>
                                    <div class="h6" style="font-size:13px"><?php echo $Doctor['phone'] ?></div>
                                    <div class="text-secondary" style="font-size:12px">Experience: </div>
                                    <div class="h6" style="font-size:13px"><?php echo $Doctor['experience'] ?></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-secondary" style="font-size:12px">Email: </div>
                                    <div class="h3" style="font-size:9px"><?php echo $Doctor['email'] ?></div>
                                    <div class="text-secondary" style="font-size:12px">Qualification: </div>
                                    <div class="h6" style="font-size:13px"><?php echo $Doctor['qualification'] ?></div>
                                    <div class="text-secondary" style="font-size:12px">Consultation Fee: </div>
                                    <div class="h6" style="font-size:13px">$ <?php echo $Doctor['consultation_fee'] ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-secondary">About</div>
                            <div style="overflow: auto;height:32px"><?php echo $Doctor['about_doctor'] ?></div>
                        </div>
                        <?php if ($_SESSION['role'] == 'Patient') { ?>
                            <div class="card-footer">
                                <a href="bookAppointment.php?Doctor_id=<?php echo $Doctor['Doctor_id'] ?>" class="btn btn-primary w-100">Book Appointment</a>
                            </div>
                        <?php } elseif ($_SESSION['role'] == 'Receptionist') { ?>
                            <div class="card-footer">
                                <a href="bookPatientAppointment.php?Doctor_id=<?php echo $Doctor['Doctor_id'] ?>" class="btn btn-primary w-100">Book Appointment</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>