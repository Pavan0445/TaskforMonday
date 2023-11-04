<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php 
$sql = "select * from Timinigs where Doctor_id='".$_SESSION['Doctor_id']."' and status='Activated'";
$results = $conn ->query($sql);

?>

<h5 class="text-center mt-1">View Timings</h5>
<div class="container mt-3">
    <table id="mytable" class="table table-bordered mt-4">
    <thead>     
            <tr>
            <th>Timing Id</th>
            <th>Day</th>
            <th>InTime</th>
            <th>OutTime</th>
            <th>Action</th>
            <th></th>
            
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $timing){ ?>
                <tr>
                <td><?php echo $timing['Timing_id']?></td>
                <td><?php echo $timing['day']?></td>
                <td><?php echo $timing['in_time']?></td>
                <td><?php echo $timing['out_time']?></td>
                <td>
                    <a href="editTimings.php?Timing_id=<?php echo $timing['Timing_id'] ?>" class="btn text-white  w-100" style="background-color: rgb(0, 0, 255);">Edit Timings</a>
                </td>
                <td>
                <form action="cancel_booking.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="Timing_id" value="<?php echo $timing['Timing_id'] ?>" class="form-control">
                            <label class="h6" for="date">Choose Date</label>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>
                        <div class="col-md-6 mt-4">
                            <input type="submit" value="Cancel Bookings" class="form-control btn btn-danger">
                        </div>
                    </div>
                </form>
                </td>
            <?php  }?>
        </tbody>
    </table>
</div>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url('<?php echo 'uploads/pic11.jpg'; ?>');
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