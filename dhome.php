<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php 
    $sql = "select * from Doctors where Doctor_id='".$_SESSION['Doctor_id']."' ";
    $doctors = $conn->query($sql);
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
body {
 background-image: url("https://png.pngtree.com/thumb_back/fh260/background/20190220/ourmid/pngtree-technology-technology-health-doctors-image_10060.jpg");
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover;
  height:200px;

}
</style>

<body>

<h4 style="text-align:center" class="mt-3">Doctor Profile </h2>

<div class="card">
    <?php foreach($doctors as $doctor){ ?>
  <img src="uploads/<?php echo $doctor['picture']?>" alt="John" style="width:100%;height:230px">
  <h1><?php echo $doctor['name'] ?></h1>
  <p class="title"><?php echo $doctor['qualification'] ?></p>
  <p class="title">Designation : <?php echo $doctor['designation'] ?></p>
  <p>Phone : <?php echo $doctor['phone'] ?></p>
 
  <?php } ?>
</div>

</body>

