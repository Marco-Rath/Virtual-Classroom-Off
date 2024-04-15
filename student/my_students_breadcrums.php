	 <!-- breadcrumb -->
	<?php $class_query = mysqli_query($con,"SELECT * from teacher_class
	LEFT JOIN class ON class.class_id = teacher_class.class_id
	LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
	LEFT JOIN school_year ON school_year.school_year_id = teacher_class.school_year
	where teacher_class_id = '$get_id'")or die(mysqli_error($con));
	$class_row = mysqli_fetch_array($class_query);
	?>
				
	<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul class="breadcrumb">
		<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
		<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
		<li><a href="#">Periodo: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
		<li><a href="#"><b>Mis Estudiantes</b></a></li>
	</ul>
	</div><!-- end breadcrumb -->