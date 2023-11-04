<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php 
$Receptionist_id = $_GET['Receptionist_id'];
$sql = "select * from Receptionists where Receptionist_id='".$Receptionist_id."'";
$results = $conn->query($sql);

?>
<div class="row">
    <form action="editReceptionist1.php" method="post">
        <input type="hidden" name="Receptionist_id" value="<?php echo $Receptionist_id?>">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-3">
                <div class="card p-3 mt-5">
                    <div class="text-center"><h6>Edit Receptionist</h1> </div>
                    <div class="h4 text-center"></div>
                    <div class="form-group">
                        <?php
                        foreach($results as $receptionist){?>

                      
                        <label for="name">Name</label>
                        <input type="text"  class="form-control p-2" name="name" id="name" value="<?php echo $receptionist['name']?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"  class="form-control p-2"  value="<?php echo $receptionist['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" id="phone"  class="form-control p-2" value="<?php echo $receptionist['phone'] ?>">
                    </div>
                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"  class="form-control p-2" value="<?php echo $receptionist['password'] ?>">
                    </div>
                    
                    <input type="submit" value="Update" class="btn  btn-primary w w-100 mt-3" >
                </div>
            </div>
      <?php  } ?>
        </div>
    </form>
</div>
