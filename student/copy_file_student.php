<?php
include('../admin/dbcon.php');
include('../session.php');
if (isset($_POST['delete_user'])){
$id=$_POST['selector'];

$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($con,"SELECT * from files  where file_id = '$id[$i]' ")or die(mysqli_error($con));
	while($row = mysqli_fetch_array($result)){
	
	$fname = $row['fname'];
	$floc = $row['floc'];
	$fdesc = $row['fdesc'];
	$teacher_id = $row['teacher_id'];
	
	
	mysqli_query($con,"insert into student_backpack (floc,fdatein,fdesc,student_id,fname) value('$floc',NOW(),'$fdesc','$session_id','$fname')")or die(mysqli_error($con));
	
	
	}
}
?>
<script>
window.location = 'backpack.php';
</script>
<?php
}
else
{
	echo "no paso if";
}
?>