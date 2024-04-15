<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('class_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					     <!-- breadcrumb -->
				<div class="pull-right">
							<a href="my_students.php<?php echo '?id='.$get_id; ?>" class="btn btn-info"><i class="icon-arrow-left"></i> Atrás</a>
						</div>
										<?php $class_query = mysqli_query($con,"SELECT * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_class_id = '$get_id'")or die(mysqli_error($con));
										$class_row = mysqli_fetch_array($class_query);
										?>
				
					     <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul class="breadcrumb">
							<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
							<li><a href="#">Mis Estudiantes</a><span class="divider">/</span></li>
							<li><a href="#"><b>Agregar Estudiante</b></a></li>
						</ul>
						
						 </div><!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form method="post" action="">

							
										<button name="submit" type="submit" class="btn btn-info"><i class="icon-save"></i>&nbsp;Agregar Estudiante</button>
										<!--<a data-toggle="modal" href="#class_agregar" id="agregar"  class="btn btn-info" name=""><i class="icon-save icon-large"></i>&nbsp;Agregar Estudiante</a>-->
									
												<br>
												<br>
                           
							 <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                          
						 <thead>
		
                                <tr>
                               
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Aula</th>
                  
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
					
                                         <?php
							
							
										$a = 0 ;
										$query = mysqli_query($con,"SELECT student.student_id, student.firstname, student.lastname, student.location, class.class_name from student inner join class on class.class_id = student.class_id inner JOIN school_year on school_year.school_year_id = student.cod_ciclo left JOIN teacher_class_student on student.student_id= teacher_class_student.student_id inner join teacher_class on student.class_id = teacher_class.class_id where school_year.status='Activated' and student.status='Registered' and teacher_class.teacher_class_id='$get_id' and teacher_class_student.teacher_class_student_id is NULL") or die(mysqli_error($con));
										while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['student_id'];
										$a++;
									
                                        ?>
								
										<tr>
										<!--<input type="hidden" name="test1" value="<?php echo $a; ?>">-->
                                        <td width="70"><img  class="img-rounded" src="../admin/<?php echo $row['location']; ?>" height="50" width="40"></td>
                                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td> 
										<td><?php echo $row['class_name']; ?></td> 
								
										<td width="80">
										<!--<select name="add_student<?php echo $a; ?>" class="span12">
										<option></option>
										<option>Agregar</option>
										</select>-->
										<input id="optionsCheckbox" class="uniform_on" name="test[]" type="checkbox" value="<?php echo $a; ?>">
										<input type="hidden" name="student_id<?php echo $a; ?>" value="<?php echo $row['student_id']; ?>">
										<input type="hidden" name="class_id<?php echo $a; ?>" value="<?php echo $get_id; ?>">
										<input type="hidden" name="teacher_id<?php echo $a; ?>" value="<?php echo $session_id; ?>">
										
										</td>
									
                                   <?php } ?>    
										
                                </tr>
                         
                            </tbody>
                        </table>
					
						</form>
						
  										
	<?php

if (isset($_POST['submit'])){

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
		
			if ($count > 0)
			{ ?>
				<script>
				 alert('El alumno ya pertenece al aula <?php echo "estudiante".$test1." claseid".$class_id; ?>'); 
				</script>
				<script>
				window.location = "add_student.php<?php echo '?id='.$get_id; ?>"; 
				</script>
				
				<?php
			}
			else 
			{
				//if($Add == 'Agregar')
				//{
					echo "como rayos entro aqui";
					mysqli_query($con,"insert into teacher_class_student (student_id,teacher_class_id,teacher_id) values('$id','$class_id','$teacher_id') ")or die(mysqli_error($con));
					
				//}
				//else
				//{
				
				
				//}
					
				?>
				<script>
				 alert('El estudiante fue agregado con éxito'); 
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
	 alert('No selecciono a ningun estudiante'); 
	</script>
	<script>
	window.location = "add_student.php<?php echo '?id='.$get_id; ?>"; 
	</script>
		
		
		<?php
	}

	}
	 
?>       
	                     
                            </tbody>
                        </table>
						
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
			
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>