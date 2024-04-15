<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('quiz_sidebar_teacher.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
									<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul class="breadcrumb">
										<?php
										$school_year_query = mysqli_query($con,"SELECT * from school_year where status='Activated' order by school_year DESC")or die(mysqli_error($con));
										$school_year_query_row = mysqli_fetch_array($school_year_query);
										$school_year_id = $school_year_query_row['school_year_id'];
										?>
											<li><a href="#"><b>Mis aulas</b></a><span class="divider">/</span></li>
										<li><a href="#">Periodo: <?php echo $school_year_query_row['school_year']; ?></a><span class="divider">/</span></li>
										<li><a href="#"><b>Practica</b></a></li>
									</ul>
						 </div><!-- end breadcrumb -->
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<div class="pull-right">
									<a href="teacher_quiz.php" class="btn btn-info"><i class="icon-arrow-left"></i> Atrás</a>
									</div>
								
									    <form class="form-horizontal" method="post">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Examen</label>
											<div class="controls">
											<select name="quiz_id">
											<option></option>
												<?php  $query = mysqli_query($con,"SELECT * from quiz where teacher_id = '$session_id'")or die(mysqli_error($con));
												while ($row = mysqli_fetch_array($query)){ $id = $row['quiz_id']; ?>
												<option value="<?php echo $id; ?>"><?php echo $row['quiz_title']; ?></option>
												<?php } ?>
											</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Tiempo de examen (en minutos)</label>
											<div class="controls">
											<input type="text" class="span3" name="time" id="inputPassword" placeholder="Tiempo (minutos)" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Fecha y hora programada</label>
											<div class="controls">
											<input type="datetime-local" class="span3" name="fecha_p" id="fecha_p" required>
											<!--<input type="datetime-local" id="meeting-time"   name="meeting-time" value="2018-06-12T19:30" min="2018-06-07T00:00" max="2018-06-14T00:00">-->
											</div>
										</div>
		
												<table class="table" id="question">
													<th></th>
													<th>Aula</th>
													<th>Curso</th>
													<th></th>
													
													<tbody>
														<?php $query = mysqli_query($con,"SELECT * from teacher_class
																			LEFT JOIN class ON class.class_id = teacher_class.class_id
																			LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
																			where teacher_id = '$session_id' and school_year = '$school_year_id' ")or die(mysqli_error($con));
																			$count = mysqli_num_rows($query);
																			

																			while($row = mysqli_fetch_array($query)){
																			$id = $row['teacher_class_id'];
													
																			?>
														<tr>
														<td width="30">
															<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
														</td>
														<td><?php echo $row['class_name']; ?></td>
														<td><?php echo $row['subject_code']; ?></td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
		
											
										<div class="control-group">
										<div class="controls">
										
										<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Guardar</button>
										</div>
										</div>
										</form>
										
									
										
										<?php
										if (isset($_POST['save'])){
											$quiz_id = $_POST['quiz_id'];
											$time = $_POST['time'] * 60;
											$fecha_p = $_POST['fecha_p'];
											$id=$_POST['selector'];
											
													$name_notification  = 'Agrego un examen en';
													
											$N = count($id);
											
											for($i=0; $i < $N; $i++)
											{
												mysqli_query($con,"insert into class_quiz (teacher_class_id,quiz_time,quiz_id,fecha_p) values('$id[$i]','$time','$quiz_id','$fecha_p')")or die(mysqli_error($con));
												mysqli_query($con,"insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','$name_notification',NOW(),'student_quiz_list.php')")or die(mysqli_error($con));
											} ?>
											<script>
												window.location = 'teacher_quiz.php';
											</script>
											<?php
										}
										?>
								
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