<?php include 'head.php' ?>
<script>
    function validate(){
        let name = document.getElementById("name").value
        if(name==""){
            alert("Enter Name")
            return false;
        }
        let email = document.getElementById("email").value
        if(email==""){
            alert("Enter Email")
            return false;
        }
        let phone = document.getElementById("phone").value
        if(phone==""){
            alert("Enter Phone Number")
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
            background-image: url('<?php echo 'uploads/pic12.jpg'; ?>');
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
    <form action="addReceptionist1.php" method="post"  onsubmit="return validate()">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-3">
                <div class="card p-3 mt-5">
                    <div class="text-center"><h6>Add Receptionist</h1> </div>
                    <div class="h4 text-center"></div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"  class="form-control p-2" name="name" id="name" placeholder="Enter your Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"  class="form-control p-2" placeholder="Enter your Email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="number" name="phone" id="phone"  class="form-control p-2" placeholder="Enter Phone Number">
                    </div>
                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"  class="form-control p-2" placeholder="Enter Password">
                    </div>
                    
                    <input type="submit" value="Add Receptioninst" class="btn w-100 mt-3" style="background-color:lightblue;">
                </div>
            </div>
        </div>
    </form>
</div>
