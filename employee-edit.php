<?php
include ("connection.php" );
$tsub= $_POST['tsub' ];
$tuserid= $_POST['tuserid' ];
$tbody= $_POST['tbody' ];
$ttowhomid= $_POST['ttowhomid' ];
$tid= $_POST['tid' ];
$sql= "UPDATE `ticket`  SET  `tsub` = '". $tsub."'  , `tuserid` =  '". $tuserid."' , 
`tbody`  =  '".$tbody ."' , `ttowhomid`  ='".$ttowhomid ."' WHERE `tid` = $tid " ;

if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record updated succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record updated failed!'
    ];
    print_r(json_encode($response));
} 
?>