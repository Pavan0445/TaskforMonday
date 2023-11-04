<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php 
    $sql = "select * from Patient where Patient_id='".$_SESSION['Patient_id']."' ";
    $Patients = $conn->query($sql);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>



.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
<body>

<h4 style="text-align:center" class="mt-3">Patient Profile </h2>

<div class="card">
    <?php foreach($Patients as $Patient){ ?>
        <img src="https://www.seekpng.com/png/detail/73-730482_existing-user-default-avatar.png" style="height: 200px;width:100%">
  <h1><?php echo $Patient['name'] ?></h1>
  <p class="title"><?php echo $Patient['email'] ?></p>
  <p>Phone : <?php echo $Patient['phone'] ?></p>
 
  <?php } ?>
</div>

</body>


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
