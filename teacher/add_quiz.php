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
										<li><a href="#"><b>Quiz</b></a></li>
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
											<label class="control-label" for="inputEmail">Titulo de Examen</label>
											<div class="controls">
											<input type="text" name="quiz_title" id="inputEmail" placeholder="Titulo de Examen">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Descripcion de Examen</label>
											<div class="controls">
											<input type="text" class="span8" name="description" id="inputPassword" placeholder="Descripcion de Examen" required>
											</div>
										</div>										
										<div class="control-group">
										<div class="controls">										
										<button name="save" type="submit" class="btn btn-success"><i class="icon-save"></i> Guardar</button>
										</div>
										</div>
										</form>									
										<?php
										if (isset($_POST['save'])){
										$quiz_title = $_POST['quiz_title'];
										$description = $_POST['description'];
										
										mysqli_query($con,"insert into quiz (quiz_title,quiz_description,date_added,teacher_id) values('$quiz_title','$description',NOW(),'$session_id')")or die(mysqli_error($con));
										?>
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