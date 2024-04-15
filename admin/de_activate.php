<?php
include('dbcon.php');
$get_id = $_GET['id'];
mysqli_query($con,"update teacher set teacher_stat = 'Desactivated' where teacher_id = '$get_id'");
header('location:teachers.php');
?>