<?php include 'head.php' ?>
<script>
    function validate() {
        let name = document.getElementById("name").value
        if (name == "") {
            alert("Enter Name")
            return false;
        }
        let phone = document.getElementById("phone").value
        if (phone == "") {
            alert("Enter Phone Number")
            return false;
        }
        let email = document.getElementById("email").value
        if (email == "") {
            alert("Enter Email")
            return false;
        }
        let age = document.getElementById("age").value
        if (age == "") {
            alert("Enter Age")
            return false;
        }
        let password = document.getElementById("password").value
        if (password == "") {
            alert("Enter Password")
            return false;
        }


        return true
    }
</script>

<div class="container">
    <div class="card p-3 mt-5">
        <form action="PatientReg1.php" method="post" onsubmit="return validate()">
            <div class="h4 text-center">Patient Registration</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Patient Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group mt-1">
                        <label for="phone">Phone Number </label>
                        <input type="tel" name="phone" id="phone" placeholder="Enter Phone" class="form-control">
                    </div>
                    <div class="form-group mt-1">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control  p-2" placeholder="Enter Password">

                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group mt-1">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control  p-2" placeholder="Enter Email">
                    </div>
                    <div class="form-group mt-1">
                        <label for="age">Age</label>
                        <input type="text" name="age" id="age" class="form-control p-2" placeholder="Enter Age">
                    </div>
                    <div class="form-group mt-1">
                        <label for="gender">Gender</label>
                        <input type="radio" id="gender" value="male" name="gender"> <label for="gender">Male</label>
                        <input type="radio" id="gender1" name="gender" value="female"> <label for="gender1">FeMale</label>
                    </div>
                    <input type="submit" value="Register" class="btn btn-primary w-100 mt-3">
                </div>
            </div>
        </form>
    </div>
</div>