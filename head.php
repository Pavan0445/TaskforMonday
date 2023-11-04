<?php include 'title.php' ?>
<?php SESSION_start(); ?>
<?php 
if(empty($_SESSION['role'])){?>
<nav class="navbar navbar-expand-sm" style="background-color:black;font-size:20px">

<div class="container-fluid">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-white" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="alogin.php">Admin</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="rlogin.php">Receptionist</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="dlogin.php">Doctor</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="plogin.php">Patient</a>
    </li>

  </ul>
</div>

</nav>
 <?php }elseif($_SESSION['role']=='admin'){?>
  <nav class="navbar navbar-expand-sm" style="background-color:black;font-size:20px">

<div class="container-fluid">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-white" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="addReceptionist.php">Add Receptionist</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="viewReceptionist.php">View Receptionist</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="view_actviate_Doctors.php">View Doctors</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="logout.php">Logout</a>
    </li>

  </ul>
</div>

</nav>
 <?php }elseif($_SESSION['role']=='Receptionist'){?>
  <nav class="navbar navbar-expand-sm" style="background-color:black;font-size:20px">

<div class="container-fluid">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-white" href="rhome.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="viewAppointments.php">View Appointments</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="viewAvailableDoctors.php">View Doctors</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="logout.php">Logout</a>
    </li>
  </ul>
</div>

</nav>

<?php }elseif($_SESSION['role']=='Doctor'){?>

  <nav class="navbar navbar-expand-sm" style="background-color:black;font-size:20px">
<div class="container-fluid">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-white" href="dhome.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="addTimings.php">Add Timings</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="viewTimings.php">View Timings</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="viewAppointments.php">View Appointments</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="logout.php">Logout</a>
    </li>

  </ul>
</div>

</nav>

<?php }elseif($_SESSION['role']=='Patient'){?>
  <nav class="navbar navbar-expand-sm" style="background-color:black;font-size:20px">
<div class="container-fluid">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-white" href="phome.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="viewAvailableDoctors.php">View  Doctors</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="viewAppointments.php">View Appointments</a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link text-white" href="dlogin.php">Doctor</a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link text-white" href="logout.php">Logout</a>
    </li>

  </ul>
</div>

</nav>
<?php }

?>
