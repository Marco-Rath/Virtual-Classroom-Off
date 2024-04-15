<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
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
										<li><a href="#"><b>Pregunta de examen</b></a></li>
									</ul>
						 </div><!-- end breadcrumb -->
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right">
								<a href="quiz_question.php<?php echo '?id='.$get_id; ?>" class="btn btn-success"><i class="icon-arrow-left"></i> Atrás</a>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">

								
							    <form class="form-horizontal" method="post">
								        <div class="control-group">
											<label class="control-label" for="inputPassword">Pregunta</label>
											<div class="controls">
													<textarea name="question" id="ckeditor_full" required></textarea>
											</div>
										</div>
										<!--<div class="control-group">
											<label class="control-label" for="inputEmail">Points</label>
											<div class="controls">
											
											<input type="number" class="span1" name="points" min=1 max=5 required> 
											</div>
										</div>--> 
										<div class="control-group">
											<label class="control-label" for="inputEmail">Tipo pregunta:</label>
											<div class="controls">			
												<select id="qtype" name="question_tpye" required>
													<option value=""></option>
													<?php
													$query_question = mysqli_query($con,"SELECT * from question_type")or die(mysqli_error($con));
													while($query_question_row = mysqli_fetch_array($query_question)){
													?>
													<option value="<?php echo $query_question_row['question_type_id']; ?>"><?php echo $query_question_row['question_type'];  ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputEmail"></label>
											<div class="controls">			
													<div id="opt11">
														A: <input type="text" name="ans1" size="60"> <input name="answer" value="A" type="radio"><br><br>
														B: <input type="text" name="ans2" size="60"> <input name="answer" value="B" type="radio"><br><br>
														C: <input type="text" name="ans3" size="60"> <input name="answer" value="C" type="radio"><br><br>
														D: <input type="text" name="ans4" size="60"> <input name="answer" value="D" type="radio"><br><br>
													</div>
													<div id="opt12">
														<input name="correctt" value="Verdadero" type="radio">Verdadero<br /><br />
														<input name="correctt"  value="Falso" type="radio">Falso<br /><br />
													</div>
													<div id="opt13">
														Respuesta corta: <input type="text" name="ans1" size="60" value="" readonly> <input name="answer" value="libre" type="radio"><br><br>
														
													</div>
													<div id="opt14">
														A: <input type="text" name="ans1" size="60"> <input name="answer" value="A" type="radio"><br><br>
														B: <input type="text" name="ans2" size="60"> <input name="answer" value="B" type="radio"><br><br>
														C: <input type="text" name="ans3" size="60"> <input name="answer" value="C" type="radio"><br><br>
														D: <input type="text" name="ans4" size="60"> <input name="answer" value="D" type="radio"><br><br>
													</div>
													<div id="opt15">
														A: <input type="text" name="ans1" size="60"> <input name="answer" value="A" type="radio"><br><br>
														B: <input type="text" name="ans2" size="60"> <input name="answer" value="B" type="radio"><br><br>
														C: <input type="text" name="ans3" size="60"> <input name="answer" value="C" type="radio"><br><br>
														D: <input type="text" name="ans4" size="60"> <input name="answer" value="D" type="radio"><br><br>
													</div>
											</div>
										</div>
									
											
						

						<div class="control-group">
										<div class="controls">
										
										<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Guardar</button>
										</div>
										</div>		
																				
										
		</form>							
		
		<?php
		if (isset($_POST['save'])){
		$question = $_POST['question'];
		//$points = $_POST['points'];
		$points = 0;
		$type = $_POST['question_tpye'];
		
		if ($type  == '2'){
				mysqli_query($con,"insert into quiz_question (quiz_id,question_text,points,date_added,answer,question_type_id) 
			values('$get_id','$question','$points',NOW(),'".$_POST['correctt']."','$type')")or die(mysqli_error($con));
		}else{
	
		$ans1 = $_POST['ans1'];
		$ans2 = $_POST['ans2'];
		$ans3 = $_POST['ans3'];
		$ans4 = $_POST['ans4'];
		$answer = $_POST['answer']; 
		
		mysqli_query($con,"insert into quiz_question (quiz_id,question_text,points,date_added,answer,question_type_id) 
		values('$get_id','$question','$points',NOW(),'$answer','$type')")or die(mysqli_error($con));
		$query = mysqli_query($con,"SELECT * from quiz_question order by quiz_question_id DESC LIMIT 1")or die(mysqli_error($con));
		$row = mysqli_fetch_array($query);
		$quiz_question_id = $row['quiz_question_id'];
		
		mysqli_query($con,"insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans1','A')")or die(mysqli_error($con));
		mysqli_query($con,"insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans2','B')")or die(mysqli_error($con));
		mysqli_query($con,"insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans3','C')")or die(mysqli_error($con));
		mysqli_query($con,"insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans4','D')")or die(mysqli_error($con));
		
		}
		
	?>
		<script>
 		window.location = 'quiz_question.php<?php echo '?id='.$get_id; ?>' 
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
					<script>
	jQuery(document).ready(function(){
		jQuery("#opt11").hide();
		jQuery("#opt12").hide();
		jQuery("#opt13").hide();		
		jQuery("#opt14").hide();
		jQuery("#opt15").hide();
				
		jQuery("#qtype").change(function(){	
			var x = jQuery(this).val();			
			if(x == '1') {
				jQuery("#opt11").show();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();
				jQuery("#opt14").hide();
				jQuery("#opt15").hide();
			} else if(x == '2') {
				jQuery("#opt11").hide();
				jQuery("#opt12").show();
				jQuery("#opt13").hide();
				jQuery("#opt14").hide();
				jQuery("#opt15").hide();
			} else if(x == '3') {
				jQuery("#opt11").hide();
				jQuery("#opt12").hide();
				jQuery("#opt13").show();
				jQuery("#opt14").hide();
				jQuery("#opt15").hide();
			}else if(x == '4') {
				jQuery("#opt11").hide();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();
				jQuery("#opt14").show();
				jQuery("#opt15").hide();
			}else if(x == '5') {
				jQuery("#opt11").hide();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();
				jQuery("#opt14").hide();
				jQuery("#opt15").show();
			}else {
				jQuery("#opt11").hide();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();
				jQuery("#opt14").hide();
				jQuery("#opt15").hide();
			}
		});
		
	});
</script>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>