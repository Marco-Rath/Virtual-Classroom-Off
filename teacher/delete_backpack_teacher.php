<?php
include('../dbcon.php');
if (isset($_POST['backup_delete'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($con,"DELETE FROM teacher_backpack where file_id='$id[$i]'");
}
header("location: teacher_backack.php");
}
?>