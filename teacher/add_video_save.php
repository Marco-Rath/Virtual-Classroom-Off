<?php
include('../admin/dbcon.php');
include('../session.php');
/*$content = $_POST['content'];		
	$id=$_POST['selector'];
		$N = count($id);
		for($i=0; $i < $N; $i++)
		{			
			mysqli_query($con,"insert into teacher_class_announcements (teacher_class_id,teacher_id,content,date) values('$id[$i]','$session_id','$content',NOW())")or die(mysqli_error($con));
			mysqli_query($con,"insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','Add Annoucements',NOW(),'announcements_student.php')")or die(mysqli_error($con));
		}*/
$errmsg_arr = array();
//Validation error flag
$errflag = false;

$uploaded_by_query = mysqli_query($con,"SELECT * from teacher where teacher_id = '$session_id'")or die(mysqli_error($con));
$uploaded_by_query_row = mysqli_fetch_array($uploaded_by_query);
$uploaded_by = $uploaded_by_query_row['firstname']."".$uploaded_by_query_row['lastname'];

/* $id_class=$_POST['id_class']; */
$name=$_POST['name'];

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) 
{
	
	include('../admin/dbcon.php');
    $str = @trim($str);
    if (get_magic_quotes_gpc())
	{
        $str = stripslashes($str);
    }
    return mysqli_real_escape_string($con,$str);
}

//Sanitize the POST values
$content = clean($_POST['content']);
//$filedesc= clean($_POST['desc']);

/*if ($content == '') 
{
    $errmsg_arr[] = ' file discription is missing';
    $errflag = true;
}*/

if ($_FILES['uploaded_file']['size'] >= 104857600000 * 10) 
{
    $errmsg_arr[] = 'file selected exceeds 5MB size limit';
    $errflag = true;
	
}


//If there are input validations, redirect back to the registration form
if ($errflag) 
{
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
	?>

   <script>
   window.location = 'downloadable.php<?php echo '?id='.$get_id;  ?>';
   </script>
   <?php exit();
}
//upload random name/number
$rd2 = mt_rand(1000, 9999) . "_File";

//Check that we have a file
if ((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) 
{
    //Check if the file is JPEG image and it's size is less than 350Kb
    $filename = basename($_FILES['uploaded_file']['name']);
	print_r($_FILES['uploaded_file']['name']);
    $ext = substr($filename, strrpos($filename, '.') + 1);

    if (($ext != "exe") && ($_FILES["uploaded_file"]["type"] != "application/x-msdownload")) 
	{
        //Determine the path to which we want to save this file      
        //$newname = dirname(__FILE__).'/upload/'.$filename;
        $newname = "../admin/uploads/" . $rd2 . "_" . $filename;
		$newname1 = $rd2 . "_" . $filename;
		//$newname = $rd2 . "_" . $filename;
		$name_notification  = 'agrego video'." ".'<b>'.$name.'</b>';
        //Check if the file with the same name is already exists on the server
        if (!file_exists($newname)) 
		{
            //Attempt to move the uploaded file to it's new place
            if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname))) 
			{
                //successful upload
                // echo "It's done! The file has been saved as: ".$newname;		   
					
				$id=$_POST['selector'];
				$N = count($id);
				for($i=0; $i < $N; $i++)
				{			
										
               /*  $qry2 = "INSERT INTO files (fdesc,floc,fdatein,teacher_id,class_id,fname,uploaded_by) VALUES ('$filedesc','$newname',NOW(),'$session_id','$id[$i]','$name','$uploaded_by')"; */
				
				mysqli_query($con,"INSERT INTO videos (name,content,floc,uploaded_by,teacher_id,teacher_class_id,date) VALUES ('$name','$content','$newname1','$uploaded_by','$session_id','$id[$i]',NOW())");
				mysqli_query($con,"insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','$name_notification',NOW(),'video_student.php')")or die(mysqli_error($con));
			   
				}
			   
			}
		}
	}
}
else
{
		$id=$_POST['selector'];
		$N = count($id);
		for($i=0; $i < $N; $i++)
		{			
										
               /*  $qry2 = "INSERT INTO files (fdesc,floc,fdatein,teacher_id,class_id,fname,uploaded_by) VALUES ('$filedesc','$newname',NOW(),'$session_id','$id[$i]','$name','$uploaded_by')"; */
				
				mysqli_query($con,"INSERT INTO videos (name,content,uploaded_by,teacher_id,teacher_class_id,date) VALUES ('$name','$content','$uploaded_by','$session_id','$id[$i]',NOW())");
				mysqli_query($con,"insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','$name_notification',NOW(),'video_student.php')")or die(mysqli_error($con));
		}
}
		
		

?>


