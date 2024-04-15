<?php
include('dbcon.php');
$get_id = $_GET['id'];
mysqli_query($con,"update school_year set status = 'Activated' where school_year_id = '$get_id'");
header('location:school_year.php');
?>