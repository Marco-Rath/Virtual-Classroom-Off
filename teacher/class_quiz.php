<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('quiz_link.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
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
							<li><a href="#"><b>Practica de Examen</b></a></li>
						</ul>
						 </div><!-- end breadcrumb -->
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								<form action="delete_class_quiz.php<?php echo '?id='.$get_id; ?>" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#backup_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete_class_quiz.php'); ?>
										<thead>
										        <tr>
												<th></th>
												<th>Titulo de Examen</th>
												<th>Descripcion</th>
												<th>Tiempo (Min)</th>
												<th>Fecha creada</th>
												<th>Fecha examen</th>
												<th>Resultados</th>
												</tr>
										</thead>
										<tbody>
                              		<?php
										$query = mysqli_query($con,"SELECT * FROM class_quiz 
										LEFT JOIN quiz ON quiz.quiz_id  = class_quiz.quiz_id
										where teacher_class_id = '$get_id' 
										order by date_added DESC ")or die(mysqli_error($con));
										while($row = mysqli_fetch_array($query)){
										$id  = $row['class_quiz_id'];
									?>                              
										<tr id="del<?php echo $id; ?>">
										<td width="30">
											<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
										 <td><?php echo $row['quiz_title']; ?></td>
                                         <td><?php  echo $row['quiz_description']; ?></td>
                                         <td><?php  echo $row['quiz_time'] / 60; ?></td>
                                         <td><?php echo $row['date_added']; ?></td>                                      
                                         <td><?php echo $row['fecha_p']; ?></td>                                      
                                         <td><a href="print_results.php?id=<?php echo $id; ?>&idc=<?php echo $get_id; ?>" class="btn btn-success"><i class="icon-search"></i> RESULTADOS</a></td>       
										 
                                      
                                                                      
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