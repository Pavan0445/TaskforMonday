<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<div class="container">
    <div class="card p-3 mt-5">
        <form action="doctorReg1.php" method="post" enctype="multipart/form-data">
            <div class="h4 text-center">Doctor Register</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Doctor Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group mt-1">
                        <label for="phone">Phone Number </label>
                        <input type="tel" name="phone" id="phone" placeholder="Enter Phone" class="form-control" required>
                    </div>
                    <div class="form-group mt-1">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control  p-2" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group mt-1">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control  p-2" placeholder="Enter Password" required>

                    </div>
                    <div class="form-group mt-1">
                        <label for="picture">Choose Image</label>
                        <input type="file" name="picture" id="picture" class="form-control" required>
                    </div>
                    <div class="form-group mt-1">
                        <label for="consultation_fee">Consultation Fee</label>
                        <input type="text" name="consultation_fee" id="consultation_fee" class="form-control" placeholder="Enter Consultation Fee" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="gender">Gender</label>
                        <input type="radio" id="gender" value="male" name="gender"> <label for="gender">Male</label>
                        <input type="radio" id="gender1" name="gender" value="female"> <label for="gender">FeMale</label>
                    </div>
                    <div class="form-group mt-1">
                        <label for="qualification">Qualification</label>
                        <input type="text" name="qualification" id="qualification" class="form-control p-2" placeholder="Enter Qualification" required>
                    </div>
                    <div class="form-group mt-1">
                        <label for="designation">Designation</label>
                        <input type="text" name="designation" id="designation" class="form-control p-2" placeholder="Enter Designation" required>
                    </div>
                    <div class="form-group mt-1">
                        <label for="experience">Experience</label>
                        <input type="text" name="experience" id="experience" class="form-control p-2" placeholder="Enter Experience" required>
                    </div>
                    <div class="form-group mt-1">
                        <label for="specialist">Specialist</label>
                        <select name="specialist" id="specialist" class="form-control">
                            <option value="">Choose Specialist</option>
                            <option value="neurologist">Neurologist</option>
                            <option value="dermatologist">Dermatologist</option>
                            <option value="psychiatrist">Psychiatrist</option>
                            <option value="surgeon">Surgeon</option>
                            <option value="gastroenterologist">Gastroenterologist</option>
                            <option value="pediatrician">Pediatrician</option>
                            <option value="internal_medicine">Internal medicine</option>
                        </select>
                    </div>
                    <div class="form-group mt-1">
                        <label for="about_doctor">About</label>
                        <textarea name="about_doctor" id="about_doctor" class="form-control p-2" placeholder="About Doctor" required></textarea>
                    </div>
                    <input type="submit" value="Register" class="btn btn-primary w-100 mt-3">
                </div>
            </div>
        </form>
    </div>
</div>