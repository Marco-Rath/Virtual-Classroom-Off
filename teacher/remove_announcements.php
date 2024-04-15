<?php include('../admin/dbcon.php'); ?>
<?php
$id = $_POST['id'];
mysqli_query($con,"delete from teacher_class_announcements where teacher_class_announcements_id = '$id'")or die(mysqli_error($con));
mysqli_query($con,"delete from teacher_class_announcements where teacher_class_announcements_id = '$id'")or die(mysqli_error($con));
?>

