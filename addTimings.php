<?php include 'head.php' ?>

<script>
    function validate() {
        let fromTime = document.getElementById("fromTime").value
        if (fromTime == "") {
            alert("Choose From Time")
            return false;
        }
        let toTime = document.getElementById("toTime").value
        if (toTime == "") {
            alert("Choose To Time")
            return false;
        }


        return true
    }
</script>

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

<div class="row mt-2">
    <div class="col-md-1"></div>
    <div class="col-md-4 ms-2 mt-4">
        <div class="card p-4 mt-5">
            <div class="text-center h6">Add Timings</div>
            <form action="addTimings1.php" method="post" onsubmit="return validate()">
                <div class="form-group">
                    <label for="fromTime">Choose Day</label>
                    <select name="day" id="day" class="form-control">
                        <option>--Choose Day--</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fromTime">FromTime</label>
                    <input type="time" class="form-control mt-1" id="fromTime" name="in_time">
                </div>
                <div class="form-group mt-2">
                    <label for="toTime">To Time</label>
                    <input type="time" class="form-control mt-1" id="toTime" name="out_time">
                </div>
                <input type="submit" value="Add" class="btn btn-primary w-100 mb-2 mt-3">
            </form>
        </div>
    </div>
</div>