<?php include 'head.php' ?>
<?php include 'dbConn.php' ?>
<?php 
$day = $_POST['day'];
$in_time = $_POST['in_time'];
$out_time = $_POST['out_time'];
$date = date('Y-m-d');
$from_time = strval($date)." ".strval($in_time);
$to_time = strval($date)." ".strval($out_time);
$dt = date("Y-m-d H:i", strtotime($from_time));
$dt2 = date("Y-m-d H:i", strtotime($to_time));
$slot_number = 0;
$new_from_time = $dt;
$new_to_time = $dt2;
$sql = "select * from Timinigs where Doctor_id ='".$_SESSION['Doctor_id']."'";
$IsCollision = false;
$results = $conn->query($sql);
if($results ->num_rows > 0){
foreach($results as $data){
    $old_from_time = $data['in_time'];
    // echo $old_from_time;
    $old_to_time = $data['out_time'];
    // echo $old_to_time;
    $date = date('Y-m-d');
    $old_from_time =strval($date)." ".($old_from_time);
    $old_from_time = date("Y-m-d h:i", strtotime($old_from_time));
    $old_to_time = strval($date)." ".($old_to_time);
    $old_to_time = date("Y-m-d h:i", strtotime($old_to_time));
    echo $old_from_time;
    echo $old_to_time;
    echo $data['day'];
    if($day == $data['day']){
        if(($old_from_time >= $new_from_time && $old_from_time <= $new_to_time) && ($old_to_time >= $new_from_time && $old_to_time >= $new_to_time)){
            echo "1";
            $IsCollision = true;
        }elseif(($old_from_time <= $new_from_time && $old_from_time <= $new_to_time) && ($old_to_time >= $new_from_time && $old_to_time <=$new_to_time)){
            echo "2";
            $IsCollision = true;
        }elseif(($old_from_time <= $new_from_time && $old_from_time <= $new_to_time) && ($old_to_time >= $new_from_time && $old_to_time >= $new_to_time)){
            echo "3";
            $IsCollision = true;
        }elseif(($old_from_time >= $new_from_time && $old_from_time <= $new_to_time) && ($old_to_time >= $new_from_time && $old_to_time <= $new_to_time)){
            echo "4";
            $IsCollision = true;
        }
    }
}
}
    if($IsCollision){
        $url =  "msg.php?msg=Time Conflict occurred for this doctor. fails to send the request&color=text-danger";
        header("Location:".$url);
    }
    else{
        $sql2 = "insert into Timinigs(day,in_time,out_time,Doctor_id) values('".$day."','".$in_time."','".$out_time."','".$_SESSION['Doctor_id']."')";
        if($conn->query($sql2)==TRUE){
            $Timing_id = $conn->insert_id;
            while($dt < $dt2){
                $from_dt = $dt;
                $minutes_to_add = 30;
                $to_dt =new DateTime($from_dt);
                $to_dt = $to_dt->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                $to_dt = $to_dt->format('Y-m-d H:i');
                $dt = $to_dt;
                $from_time = strtotime($from_dt);
                $from_time = date('H:i', $from_time);
                $to_time = strtotime($to_dt);
                $to_time = date('H:i', $to_time);
                $slot_number = $slot_number + 1;
                $sql2 = "insert into slots (from_time,to_time,slot_number,Timing_id) values('".$from_time."','".$to_time."','".$slot_number."','".$Timing_id."')";
                if($conn->query($sql2)==TRUE){
                    $url =  "msg.php?msg=Timings Added Successfully&color=text-success";
                    header("Location:".$url);
                }
                
            }
        
        }
    }




?>