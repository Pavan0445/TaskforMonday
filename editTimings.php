<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php
$Timing_id = $_GET['Timing_id'];
$sql = "select * from Timinigs where Timing_id='" . $Timing_id . "'";
$results = $conn->query($sql);
?>
<div class="row mt-2">
    <div class="col-md-4"></div>
    <div class="col-md-4 ms-2 mt-4">
        <div class="card p-4 mt-5">
            <div class="text-center h6">Edit Timings</div>
            <form action="editTimings1.php" method="post">
                <input type="hidden" name="Timing_id" value="<?php echo $Timing_id ?>">
                <div class="form-group">
                    <label for="fromTime"></label>
                    <?php foreach ($results as $timing) { ?>
                        <select hidden name="day" id="day" class="form-control">
                            <option value="Monday" hidden <?php if ($timing['day'] == "Monday") echo "selected=\"selected\""; ?>>Monday</option>
                            <option value="Tuesday" hidden <?php if ($timing['day'] == "Tuesday") echo "selected=\"selected\""; ?>>Tuesday</option>
                            <option value="Wednesday" hidden <?php if ($timing['day'] == "Wednesday") echo "selected=\"selected\""; ?>>Wednesday</option>

                            <option value="Thursday" hidden <?php if ($timing['day'] == "Thursday") echo "selected=\"selected\""; ?>>Thursday</option>

                            <option value="Friday" hidden <?php if ($timing['day'] == "Friday") echo "selected=\"selected\""; ?>>Friday</option>

                            <option value="Saturday" hidden <?php if ($timing['day'] == "Saturday") echo "selected=\"selected\""; ?>>Saturday</option>
                            <option value="Sunday" hidden <?php if ($timing['day'] == "Sunday") echo "selected=\"selected\""; ?>>Sunday</option>

                        </select>
                </div>
                <div class="form-group">
                    <label for="fromTime">FromTime</label>
                    <input type="time" class="form-control mt-1" id="fromTime" value="<?php echo $timing['in_time'] ?>" name="in_time">
                </div>
                <div class="form-group mt-2">
                    <label for="toTime">To Time</label>
                    <input type="time" class="form-control mt-1" id="toTime" value="<?php echo $timing['out_time'] ?>" name="out_time">
                </div>
            <?php } ?>
            <input type="submit" value="Update" class="btn btn-primary w-100 mb-2 mt-3">
            </form>
        </div>
    </div>
</div>