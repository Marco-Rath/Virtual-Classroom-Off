<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; 

function minutosTranscurridos($fecha_i,$fecha_f)
{
$minutos = (strtotime($fecha_i)-strtotime($fecha_f))/60;
$minutos = abs($minutos); 
$minutos = floor($minutos);
return $minutos;
}
?>
    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_quiz_link.php'); ?>
                <div class="span9" id="content">
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
							<li><a href="#"><b>Practica de Examen</b></a></li>
						</ul>
						 </div><!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
							<?php 		$query = mysqli_query($con,"SELECT * FROM class_quiz 
										LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id
										where teacher_class_id = '$get_id'  ")or die(mysqli_error($con));
										$count = mysqli_num_rows($query);
							?>
                                <div id="" class="muted pull-right"><span class="badge badge-info"><?php echo $count; ?></span></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form action="copy_file_student.php" method="post">
					
									<?php include('copy_to_backpack_modal.php'); ?>
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
										<thead>
										        <tr>
												<th>Titulo de Examen</th>
												<th>Descripcion</th>
												<th>Tiempo(minutos)</th>
												<th>Fecha y hora</th>
												<th></th>
												</tr>
										</thead>
										<tbody>
                              		<?php
										$query = mysqli_query($con,"SELECT * FROM class_quiz 
										LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id
										where teacher_class_id = '$get_id'  order by class_quiz_id DESC ")or die(mysqli_error($con));
										while($row = mysqli_fetch_array($query)){
										$id  = $row['class_quiz_id'];
										$quiz_id  = $row['quiz_id'];
										$quiz_time  = $row['quiz_time'];
										$fecha_e  = date_format(date_create_from_format('Y-m-d H:i:s', $row['fecha_p']), 'Y-m-d H:i');
										$fecha_post  = date_format(date_create_from_format('Y-m-d H:i:s', $row['fecha_p']), 'd/m/Y H:i:s');
										//$fecha_d = date_format(date_create_from_format('Y-m-d H:i:s', $row['fecha_p']), 'd');
										//$fecha_m = date_format(date_create_from_format('Y-m-d H:i:s', $row['fecha_p']), 'm');
										//$fecha_a = date_format(date_create_from_format('Y-m-d H:i:s', $row['fecha_p']), 'Y');
									
										$query1 = mysqli_query($con,"SELECT * from student_class_quiz where class_quiz_id = '$id' and student_id = '$session_id'")or die(mysqli_error($con));
										$row1 = mysqli_fetch_array($query1);
										$grade = $row1['grade'];

									?>                              
										<tr>                     
										 <td><?php  echo $row['quiz_title']; ?></td>
                                         <td><?php  echo $row['quiz_description']; ?></td>                                     
                                         <td><?php  echo $row['quiz_time'] / 60; ?></td>                                     
                                         <td><?php  echo $fecha_post; ?></td>                                     
                                         <td width="200">
										<?php 
										
										$fecha_actual = strtotime(date('Y-m-d H:i'));
										//$fecha_actual = strtotime('2020-08-01 16:59');
										$fecha_examen = strtotime($fecha_e);
										$tolerancia=-30;
										$minutos = ($fecha_examen-$fecha_actual)/60;
										//$minutos = abs($minutos); 
										$minutos = ceil($minutos);

										if ($fecha_actual == $fecha_examen || ($minutos<0 && $minutos>=$tolerancia)){
										$hayexamen = true;  //si hay examen
										}else{
										$hayexamen = false; // no hay examen
										}
										 
										if ($grade!=''){ ?>
											<b>Puntuación <?php echo $grade; ?></b>
											<?php }
										
										
										else
											 {
												if($hayexamen==true){ 		
												?>
											
												<a  data-placement="bottom" title="Hacer esta practica" id="<?php echo $id; ?>Download" href="take_test.php<?php echo '?id='.$get_id ?>&<?php echo 'class_quiz_id='.$id; ?>&<?php echo 'test=ok' ?>&<?php echo 'quiz_id='.$quiz_id; ?>&<?php echo 'quiz_time='.$quiz_time;	 ?>"><i class="icon-check icon-large"></i> Resolver prueba</a>
										
												<?php 
												}
												else
												{
													//echo " ".$fecha_actual." ".$fecha_examen."diferencia".$minutos;
													?>
												
												<a href="#" class="btn btn-danger"><i class="icon-exclamation-sign"></i> Desactivado </a>
										
												<?php
												}													
											}
										?>
										</td>            
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>Hacer esta practica').tooltip('show');
															$('#<?php echo $id; ?>Hacer esta practica').tooltip('hide');
														});
														</script>										 
										</tr>
						 <?php } ?>
										</tbody>
									</table>
									</form>
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