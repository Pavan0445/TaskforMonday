<?php include 'head.php' ?>
<?php include  'dbConn.php' ?>
<?php 
    $sql = "select * from Receptionists";
    $results = $conn->query($sql);
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
<div class="text-center h6 mt-1">Receptionist's details</div>
<div class="container mt-3">
<table id="mytable" class="table table-bordered">
   <thead>     
    <tr>
    <th>Receptionist Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Status</th>
    <th>Action</th>
    <th>Edit Profile</th>
  </tr>
</thead>
<tbody>
    <?php foreach($results as $receptionist){ ?>
      <tr>
        <td><?php echo $receptionist['Receptionist_id']?></td>
        <td><?php echo $receptionist['name']?></td>
        <td><?php echo $receptionist['email']?></td>
        <td><?php echo $receptionist['phone']?></td>
        <td><?php echo $receptionist['status']?></td>
       <td>
        <?php 
        if($receptionist['status']=='Authorized'){?>
         <a href="deactivate.php?Receptionist_id=<?php echo $receptionist['Receptionist_id']?>" class="btn btn-danger w-100">Deactivate</a>
        <?php }else{?>
        <a href="deactivate.php?Receptionist_id=<?php echo $receptionist['Receptionist_id']?>" class="btn btn-success w-10">Activate</a>

        <?php }?>
       </td>
       <td>
       <a href="editReceptionist.php?Receptionist_id=<?php echo $receptionist['Receptionist_id']?>" class="btn btn-primary w-100">Edit</a>

       </td>
      

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