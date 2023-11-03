<?php
include ("connection.php" ); 
$tid= $_GET['tid' ];
$sql= "SELECT *  FROM `ticket`  WHERE  `tid` =   $id";
$result= mysqli_query($conn ,  $sql);
$fetch= mysqli_fetch_assoc($result) ;
print_r(json_encode($fetch));
?>