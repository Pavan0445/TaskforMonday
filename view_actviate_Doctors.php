<?php include 'head.php' ?>
<?php include  'dbConn.php' ?>
<?php 
    $sql = "select * from Doctors";
    $Doctors = $conn->query($sql);
?>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        
            
}
        
    #myTable th, #myTable td {
    text-align: left;
    padding: 26px;
    border-style: solid;
    border-color:1px solid green;

}
    #myTable tr {
    border-bottom: 1px solid #ddd;
}
    /* /* #myTable {
    border-collapse: collapse;
    width: 30%;
    border: 2px solid #ddd;
    font-size: 16px; */
 


</style>
<div class="text-center h6 mt-1">View Doctors</div>
<div class="container-fluid mt-3">
<table id="mytable" class="table table-bordered">
   <thead>     
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Expericence</th>
    <th>Gender</th>
    <th>Qualification</th>
    <th>Designation</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
    <?php foreach($Doctors as $Doctor){ ?>
      <tr>
        <td><img src="uploads/<?php echo $Doctor['picture']?>" style="height:50px; max-width:100%"><?php echo $Doctor['name'] ?></td>
        <td><?php echo $Doctor['email']?></td>
        <td><?php echo $Doctor['phone']?></td>
        <td><?php echo $Doctor['experience']?></td>
        <td><?php echo $Doctor['gender']?></td>
        <td><?php echo $Doctor['qualification']?></td>
        <td><?php echo $Doctor['designation']?></td>
        <td><?php echo $Doctor['status'] ?></td>
       <td>
        <?php 
        if($Doctor['status']=='UnAuthorized'){?>
        <a href="deactivate_doctor.php?Doctor_id=<?php echo $Doctor['Doctor_id']?>" class="btn btn-success w-10">Activate</a>
        <?php }else{?>
        <a href="deactivate_doctor.php?Doctor_id=<?php echo $Doctor['Doctor_id']?>" class="btn btn-danger w-100">Deactivate</a>

        <?php }?>
       
      

        <tr>
            <?php  }?>
         </tbody>
</table>
</div>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url('<?php echo 'uploads/pic5.jpg'; ?>');
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