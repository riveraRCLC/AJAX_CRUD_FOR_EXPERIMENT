<?php
include ("connection.php" ); 
$tid= $_GET['id' ];
$sql= "SELECT *  FROM `ticket`  WHERE  `tid` =   $tid";
$result= mysqli_query($conn ,  $sql);
$fetch= mysqli_fetch_assoc($result) ;
print_r(json_encode($fetch));
?>