 <?php
 include('../admin/dbcon.php');
 include('../session.php');
 
 
if (isset($_POST['change'])) 
{
		   

	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name = addslashes($_FILES['image']['name']);
	$image_size = getimagesize($_FILES['image']['tmp_name']);
	$allowedMimes = array('image/gif', 'image/jpeg', 'image/jpg', 'image/png', 'image/bmp', 'image/wbmp');
	$allowedExtensions = array('jpg', 'gif', 'jpeg', 'png', 'bmp', 'wbmp');

	$tmp = explode('.',$image_name);
	$extension = end($tmp);
	if(in_array($extension, $allowedExtensions))
	{
		$type = strtolower($image_size['mime']);
		if(in_array($type, $allowedMimes))
		{
		
			move_uploaded_file($_FILES["image"]["tmp_name"], "../admin/uploads/" . $_FILES["image"]["name"]);
			$location = "uploads/" . $_FILES["image"]["name"];
			
			mysqli_query($con,"update  student set location = '$location' where student_id  = '$session_id' ")or die(mysqli_error($con));
			
			?>

			<script>
			window.location = "dashboard_student.php";  
			</script>
			<?php 
		}

   
	}
	else
	{ ?>
		<script>
				window.location = "dashboard_student.php";
			</script>
	<?php
	}
}  
?>