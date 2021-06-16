<?php
session_start();
include "../includes/db.php" ;

global $connection;
$exam_category=$_GET['exam_category'];
$_SESSION['exam_category']=$exam_category;
$res=mysqli_query($connection,"SELECT * from exam_category WHERE category ='$exam_category'");
while($row=mysqli_fetch_array($res)){
    $_SESSION['exam_time']=$row['exam_time_in_minutes'];

}

$date=date("Y-m-d H:i:s");
$_SESSION['end_time']= date("Y-m-d H:i:s",strtotime($date."+$_SESSION[exam_time] minutes"));
$_SESSION['exam_start']="yes";

?>