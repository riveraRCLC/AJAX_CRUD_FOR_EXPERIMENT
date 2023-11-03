<?php

include ("connection.php" ); 
$tsub =  $_POST['tsub' ]; 
$tuserid =  $_POST['tuserid' ]; 
$tbody =  $_POST['tbody' ]; 
$ttowhomid =  $_POST['ttowhomid' ]; 
$sql=  "INSERT  INTO `ticket`(`tsub` , `tuserid` , `tbody` , `ttowhomid`)
 VALUE  (' {$tsub} ' , ' {$tuserid } ' , ' {$tbody } ' , ' {$ttowhomid } ')" ; 

if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record created succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record created failed!'
    ];
    print_r(json_encode($response));
}


?> 