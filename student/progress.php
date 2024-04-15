<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('progress_link_student.php'); ?>
                <div class="span4" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
										<?php $class_query = mysqli_query($con,"SELECT * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										LEFT JOIN school_year ON school_year.school_year_id = teacher_class.school_year
										where teacher_class_id = '$get_id'")or die(mysqli_error($con));
										$class_row = mysqli_fetch_array($class_query);
										$class_id = $class_row['class_id'];
										$school_year = $class_row['school_year'];
										?>
				
					     <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul class="breadcrumb">
							<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
							<li><a href="#">Periodo: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b>Progreso</b></a></li>
						</ul>
						 </div><!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
							    <div id="" class="muted pull-left"><h4> Progreso de las Prácticas</h4></div>
							</div>
                            <div class="block-content collapse in">
                                <div class="span12">
										<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
						
										<thead>
										        <tr>
												<th>Fecha Subida</th>
												<th>Practica</th>
											
												<th>Nota</th>
												</tr>
												
										</thead>
										<tbody>
											
                              		<?php
										$query = mysqli_query($con,"SELECT * FROM student_assignment 
										LEFT JOIN student on student.student_id  = student_assignment.student_id
										RIGHT JOIN assignment on student_assignment.assignment_id  = assignment.assignment_id
										WHERE student_assignment.student_id = '$session_id'
										order by fdatein DESC")or die(mysqli_error($con));
										while($row = mysqli_fetch_array($query)){
										$id  = $row['student_assignment_id'];
										$student_id = $row['student_id'];
									?>                              
										<tr>
										 <td><?php echo $row['fdatein']; ?></td>
                                         <td><?php  echo $row['fname']; ?></td>
                                      
										 <?php if ($session_id == $student_id){ ?>
                                         <td>
										 <span class="badge badge-success"><?php echo $row['grade']; ?></span>
										 </td>
										 <?php }else{ ?>
										 <td></td>
										 <?php } ?>										 
                                </tr>
                         
						 <?php } ?>
						   
                              
										</tbody>
									</table>
						
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
				
				
				
				                <div class="span5" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
							
				
					     <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul class="breadcrumb">
		
							<li><a href="#"><b>|</b></a></li>
						</ul>
						 </div><!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
							    <div id="" class="muted pull-left"><h4> Progreso de Practicas (Calificadas)</h4></div>
							</div>
                            <div class="block-content collapse in">
                                <div class="span12">
			
								<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
										<thead>
										        <tr>
												<th>Titulo de Examen</th>
												<th>Descripcion</th>
												<th>TIEMPO DE EXAMEN (EN MINUTOS)</th>
												<th></th>
												</tr>
										</thead>
										<tbody>
                              		<?php
										$query = mysqli_query($con,"SELECT * FROM class_quiz 
										LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id
										where teacher_class_id = '$get_id' order by class_quiz_id DESC ")or die(mysqli_error($con));
										while($row = mysqli_fetch_array($query)){
										$id  = $row['class_quiz_id'];
										$quiz_id  = $row['quiz_id'];
										$quiz_time  = $row['quiz_time'];
									
										$query1 = mysqli_query($con,"SELECT * from student_class_quiz where class_quiz_id = '$id' and student_id = '$session_id'")or die(mysqli_error($con));
										$row1 = mysqli_fetch_array($query1);
										$grade = $row1['grade'];

									?>          
										<?php if ($grade ==""){
										
										}else{ ?>	
										<tr>                     
										 <td><?php echo $row['quiz_title']; ?></td>
                                         <td><?php  echo $row['quiz_description']; ?></td>                                     
                                         <td><?php  echo $row['quiz_time'] / 60; ?></td>                                     
                                         <td width="200">
									
										<b>Puntaje logrado <?php echo $grade; ?></b>
						
										</td>            
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>Hacer esta practica').tooltip('show');
															$('#<?php echo $id; ?>Hacer esta practica').tooltip('hide');
														});
														</script>										 
										</tr>
										<?php } ?>
						 <?php } ?>
										</tbody>
									</table>
						
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
				
				<?php /* include('downloadable_sidebar.php') */ ?>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>