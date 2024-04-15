<?php
include('../admin/dbcon.php');
include('../session.php');
$get_id = $_GET['id']; 

if (isset($_POST['agregar_class'])){

	if(isset($_POST['test']))
	{
		$test = $_POST['test'];
		$N=count($test);
		for($b = 0; $b <  $N; $b++)
		{
				
		$test1 = "student_id".$test[$b];
		$test2 = "class_id".$test[$b];
		$test3 = "teacher_id".$test[$b];
		$test4 = "add_student".$test[$b];
		
		$id = $_POST[$test1];
		$class_id = $_POST[$test2];
		$teacher_id = $_POST[$test3];
		//$Add = $_POST[$test4];
		
		$query = mysqli_query($con,"SELECT * from teacher_class_student where student_id = '$id' and teacher_class_id = '$class_id' ")or die(mysqli_error($con));
		$count = mysqli_num_rows($query); 
		
		if ($count > 0){ ?>
		<script>
		 alert('El alumno ya pertenece al aula <?php echo "estudiante".$id." claseid".$class_id; ?>'); 
		</script>
		<!--<script>
		window.location = "add_student.php<?php echo '?id='.$get_id; ?>"; 
		</script>-->
		
		<?php
		}else 
		{
			//if($Add == 'Agregar')
			//{
				echo "como rayos entro aqui";
				//mysqli_query($con,"insert into teacher_class_student (student_id,teacher_class_id,teacher_id) values('$id','$class_id','$teacher_id') ")or die(mysqli_error($con));
				
			//}
			//else
			//{
			
			
			//}
				
		?>
		<script>
		 alert('El estudiante fue agregado con éxito <?php echo "rayos".$id; ?>'); 
		</script>
		<script>
		 window.location = "my_students.php<?php echo '?id='.$get_id; ?>"; 
		</script>
			
			<?php
		}
		
		}
	}
	else
	{
		?>
		<script>
	 alert('Student Already in the class'); 
	</script>
	<script>
	window.location = "add_student.php<?php echo '?id='.$get_id; ?>"; 
	</script>
		
		
		<?php
	}

	}
	 
?>       