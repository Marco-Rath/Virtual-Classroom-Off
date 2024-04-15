<?php
include('dbcon.php');
$get_id = $_GET['id'];
mysqli_query($con,"update student set status = 'Registered' where student_id = '$get_id'");
header('location:students.php');
?>