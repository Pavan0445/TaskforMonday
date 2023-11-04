<?php include 'head.php'?>
<?php include 'dbConn.php'?>

<?php 
$Labtest_id = $_GET['Labtest_id'];
$sql = "select * from TestResults where Labtest_id='".$Labtest_id."'";
$test_results = $conn->query($sql);
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
    <th>TestResult Id </th>
    <th>Test Result</th>
    <th>Test Status</th>
    <th>View Result</th>
    
  </tr>
</thead>
<tbody>
    <?php foreach($test_results as $test_result){ ?>
      <tr>
        <td><?php echo $test_result['TestResult_id']?></td>
        <td><?php echo $test_result['test_result']?></td>
        <td><?php echo $test_result['test_status']?></td>
        <td>
        <a href="uploads/<?php echo $test_result['picture']?>" class="btn btn-primary w-100">View Result</a>

        </td>
      
        <tr>
         <?php  }?>
         </tbody>
</table>
</div>