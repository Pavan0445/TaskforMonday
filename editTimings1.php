<?php include 'head.php' ?>
<?php include 'dbConn.php'?>
<?php 
$Timing_id = $_POST['Timing_id'];
$in_time = $_POST['in_time'];
$out_time = $_POST['out_time'];
$day = $_POST['day'];
$date = date('Y-m-d');
// echo $status;
// echo $in_time;
// echo $out_time;
// echo $Timing_id;
$from_time = strval($date)." ".strval($in_time);
$to_time = strval($date)." ".strval($out_time);
$dt = date("Y-m-d H:i", strtotime($from_time));
$dt2 = date("Y-m-d H:i", strtotime($to_time));
// echo $from_time;
// echo $to_time;
$slot_number = 0;
$update = "update Timinigs set status='Deactivated' where Timing_id='".$Timing_id."'";
if($conn->query($update)==TRUE){
    $sql = "insert into Timinigs(day,in_time,out_time,Doctor_id) values('".$day."','".$in_time."','".$out_time."','".$_SESSION['Doctor_id']."')";
    echo $sql;
    if($conn->query($sql)==TRUE){
    $Timing_id = $conn->insert_id;
        while($dt < $dt2){
            $from_dt = $dt;
            $minutes_to_add = 20;
            $to_dt =new DateTime($from_dt);
            $to_dt = $to_dt->add(new DateInterval('PT' . $minutes_to_add . 'M'));
            $to_dt = $to_dt->format('Y-m-d H:i');
            $dt = $to_dt;
    
            // echo $dt;
            $from_time = strtotime($from_dt);
            $from_time = date('H:i', $from_time);
            // echo $from_time;
            $to_time = strtotime($to_dt);
            $to_time = date('H:i', $to_time);
            // echo $from_time;
            // echo $to_time;
            $slot_number = $slot_number + 1 ;
            // echo $slot_number;
           
            $sql2 = "insert into slots (from_time,to_time,slot_number,Timing_id) values('".$from_time."','".$to_time."','".$slot_number."','".$Timing_id."')";
            if($conn->query($sql2)==TRUE){
                $url =  "msg.php?msg=Timings Updated Successfully&color=text-success";
                header("Location:".$url);
            }
            
            
        }
       
    }
}



?>