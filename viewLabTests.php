<?php include 'head.php'?>
<?php include 'dbConn.php'?>

<?php 
$Appointment_id = $_POST['Appointment_id'];
$sql = "select * from LabTests where Appointment_id='".$Appointment_id."'";
$lab_tests = $conn->query($sql);
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
<div class="text-center h6">View LabTests</div>
<div class="container mt-5">
<table id="mytable" class="table table-bordered">
   <thead>     
    <tr>
    <th>LabTest Id</th>
    <th>Test Name</th>
    <th>Description</th>
    <?php if($_SESSION['role']=='Patient' or $_SESSION['role']=='Receptionist'){ ?>
    <th>Upload Results</th>
    <?php } ?>
    <th>View Results</th>
    
  </tr>
</thead>
<tbody>
    <?php foreach($lab_tests as $lab_test){ ?>
      <tr>
        <td><?php echo $lab_test['Labtest_id']?></td>
        <td><?php echo $lab_test['test_name']?></td>
        <td><?php echo $lab_test['description']?></td>
        <?php if($_SESSION['role']=='Patient' or $_SESSION['role']=='Receptionist'){ ?>
        <td>
            
            <a href="uploadResults.php?Labtest_id=<?php echo $lab_test['Labtest_id'] ?>" class="btn btn-success w-100">Upload Results</a>
           
        </td>
        <?php } ?>
        <td>
            <a href="viewResults.php?Labtest_id=<?php echo $lab_test['Labtest_id'] ?>" class="btn btn-success w-100">View Results</a>
        </td>
      
        <tr>
         <?php  }?>
         </tbody>
</table>
</div>