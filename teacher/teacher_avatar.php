 <?php
 include('../admin/dbcon.php');
 include('../session.php');
 
if (isset($_POST['change'])) 
{
		   
	//defining the allowed extensions and types for our system.
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name = addslashes($_FILES['image']['name']);
	$image_size = getimagesize($_FILES['image']['tmp_name']);
	$allowedMimes = array('image/gif', 'image/jpeg', 'image/jpg', 'image/png', 'image/bmp', 'image/wbmp');
	$allowedExtensions = array('jpg', 'gif', 'jpeg', 'png', 'bmp', 'wbmp');

	$tmp = explode('.',$image_name);
	$extension = end($tmp);

	//is the extension allowed?
	//echo $extension;
	if(in_array($extension, $allowedExtensions))
	{

		//getting the mime type (it can be different from the extension) Be careful!
		//$imgInfo = getimagesize('yourPath/'.$imgFile
		
		
		//$type = strtolower($);
		$type = strtolower($image_size['mime']);
		
		//echo $type;
		//checking the mime type
		if(in_array($type, $allowedMimes))
		{
			 // is an allowed image type
			//echo $type;
			move_uploaded_file($_FILES["image"]["tmp_name"], "../admin/uploads/" . $_FILES["image"]["name"]);
			$location = "uploads/" . $_FILES["image"]["name"];
				
			mysqli_query($con,"update  teacher set location = '$location' where teacher_id  = '$session_id' ")or die(mysqli_error($con));
				
			?>

			<script>
				window.location = "dasboard_teacher.php";
			</script>
			<?php 
		}
	}
	else
	{ ?>
		<script>
				window.location = "dasboard_teacher.php";
			</script>
	<?php
	}
			

	}  
?>