<?php include 'head.php'; ?>
<?php 
    $msg = $_GET['msg'];
    $color = $_GET['color'];
?>
<div  class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">  
        <div class="text-center h5 mt-5 <?php echo $color ?>"><?php echo $msg ?></div>
    </div>
    <div class="col-md-2">
    </div>
</div>