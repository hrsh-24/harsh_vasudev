<?php
$connection = mysqli_connect("localhost",'root','','online_education_system');
if(!$connection){
    echo " not connectioned".die($connection);
}
?>