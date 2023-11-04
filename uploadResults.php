<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>

<?php
$Labtest_id = $_GET['Labtest_id'];
?>
<div class="row mt-2">
    <div class="col-md-4"></div>
    <div class="col-md-4 ms-2 mt-4">
        <div class="card p-4 mt-5">
            <div class="text-center h6"></div>
            <form action="uploadResults1.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="Labtest_id" value="<?php echo $Labtest_id ?>">
                <div class="form-group">
                    <label for="test_result">Test Results</label>
                    <textarea class="form-control mt-1" id="test_result" placeholder="Test Results" name="test_result" required></textarea>
                </div>

                <div class="form-group mt-1">
                    <label for="test_status">TestStatus</label>
                    <select class="form-control mt-1" id="test_status" name="test_status" required>
                        <option value="Normal">Normal</option>
                        <option value="Low">Low</option>
                        <option value="High">High</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="picture">Choose File</label>
                    <input type="file" class="form-control mt-1" id="picture" name="picture" required>
                </div>

                <input type="submit" value="Upload" class="btn btn-primary w-100 mb-2 mt-3">
            </form>
        </div>
    </div>
</div>