<?php include 'head.php' ?>
<script>
    function validate(){
        let userName = document.getElementById("userName").value
        if(userName==""){
            alert("Enter UserName")
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
            background-image: url('<?php echo 'uploads/pic13.jpg'; ?>');
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
            <div class="text-center"><h3>Admin Login</h1></div>
            <form action="alogin1.php" method="POST" onsubmit="return validate()">
                <div class="form-group">
                    <label for="UserName">UserName</label>
                    <input type="text" placeholder="Enter UserName" name="userName" id="userName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter Password" name="password" id="password" class="form-control">
                </div>
                <input type="submit" value="Login" class="btn btn-primary w-100 mt-3">
            </div>
        </div>
    </form>
</div>