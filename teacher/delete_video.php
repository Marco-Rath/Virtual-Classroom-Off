<?php
include('../admin/dbcon.php');
$id = $_POST['id'];
$get_id = $_POST['get_id'];
mysqli_query($con,"delete from videos where video_id = '$id' ")or die(mysqli_error($con));
?>
<script>
	window.location = 'video.php<?php echo '?id='.$get_id; ?>'
</script>