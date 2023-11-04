<?php include 'head.php' ?>
<script>
    function validate(){
        let email = document.getElementById("email").value
        if(email==""){
            alert("Enter Email")
            return false;
        }
        let password = document.getElementById("password").value
        if(password==""){
            alert("Enter Password")
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
            background-image: url('<?php echo 'uploads/pic9.jpg'; ?>');
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

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-4 mt-5">
        <div class="card p-3 mt-5">
            <div class="text-center"><h3>Patient Login</h1></div>
            <form action="plogin1.php" method="POST" onsubmit="return validate()">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" placeholder="Enter Email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter Password" name="password" id="password" class="form-control">
                </div>
                <input type="submit" value="Login" class="btn btn-primary w-100 mt-3">
                <div class="">New Patient? <a href="PatientReg.php">Register</a></div>
            </div>
        </div>
    </form>
</div>