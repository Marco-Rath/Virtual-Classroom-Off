<?php
include('dbcon.php');
$get_id = $_GET['id'];
mysqli_query($con,"update avisos set estado = 'Activo' where avisos_id = '$get_id'")or die(mysqli_error($con));
header('location:add_announcement.php');
?>