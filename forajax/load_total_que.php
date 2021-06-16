<?php
session_start();

include "../includes/db.php" ;

$total_que=0;
global $connection;
$res = mysqli_query($connection, " SELECT * from questions where category = '$_SESSION[exam_category]'  ");
$total_que=mysqli_num_rows($res);
echo $total_que;



?>