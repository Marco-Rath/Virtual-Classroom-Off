<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php $quiz_question_id = $_GET['quiz_question_id']; ?>
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
										<li><a href="#"><b>Pregunta de Examen</b></a></li>
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
								<?php
										$query = mysqli_query($con,"SELECT * FROM quiz_question
										LEFT JOIN question_type on quiz_question.question_type_id = question_type.question_type_id
										where quiz_id = '$get_id' and quiz_question_id = '$quiz_question_id'  order by date_added DESC ")or die(mysqli_error($con));
										$row = mysqli_fetch_array($query);
										$q_t=$row['question_type_id'];
								?>
								
							    <form class="form-horizontal" method="post">
								        <div class="control-group">
											<label class="control-label" for="inputPassword">Enunciado</label>
											<div class="controls">
													<textarea name="question" id="ckeditor_full" required><?php echo $row['question_text']; ?></textarea>
											</div>
										</div>
										<!-- <div class="control-group">
											<label class="control-label" for="inputEmail">Points</label>
											<div class="controls">
											
											<input type="number" class="span1" name="points" min=1 max=5 required> 
											</div>
										</div> -->
										<div class="control-group">
											<label class="control-label" for="inputEmail">Tipo de pregunta:</label>
											<div class="controls">			
												<select id="qtype" name="question_tpye" required>

														<option value="<?php echo $row['question_type_id']; ?>" ><?php echo $row['question_type']; ?></option>
													<?php
													$query_question = mysqli_query($con,"SELECT * from question_type where question_type_id= '$q_t'")or die(mysqli_error($con));
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
<?php if($q_t=='1')
{
?>	
<div id="opt11">
<?php
	//$sqlz = mysqli_query($con,"SELECT * FROM quiz_question INNER JOIN answer ON quiz_question.quiz_question_id=answer.quiz_question_id WHERE quiz_id = '$get_id' and quiz_question_id='$quiz_question_id'");
	$sqlz = mysqli_query($con,"SELECT * FROM quiz_question q INNER JOIN answer a ON q.quiz_question_id=a.quiz_question_id WHERE quiz_id = '$get_id' and a.quiz_question_id='$quiz_question_id'");
	while($rowz = mysqli_fetch_array($sqlz)){
		if($rowz['choices'] == 'A'){
			$a = $rowz['answer_text'];
			//$respuesta=$rowz['answer'];
		} else if($rowz['choices'] == 'B'){
			$b = $rowz['answer_text'];
			//$respuesta=$rowz['answer'];
		} else if($rowz['choices'] == 'C'){
			$c = $rowz['answer_text'];
			//$respuesta=$rowz['answer'];
		} else if($rowz['choices'] == 'D'){
			$d = $rowz['answer_text'];
			//$respuesta=$rowz['answer'];
		}
		$respuesta=$rowz['answer'];
	}
	//echo "respuesta-".$respuesta."-<br>";
?>
	A.)<input type="text" name="ans1" size="60" value="<?php echo $a;?>"><input name="correctm" value="A" <?php if($respuesta == 'A'){ echo 'checked'; }?> type="radio"><br /><br />
	B.)<input type="text" name="ans2" size="60" value="<?php echo $b;?>"><input name="correctm" value="B" <?php if($respuesta == 'B'){ echo 'checked'; }?> type="radio"><br /><br />
	C.)<input type="text" name="ans3" size="60" value="<?php echo $c;?>"><input name="correctm" value="C" <?php if($respuesta == 'C'){ echo 'checked'; }?> type="radio"><br /><br />
	D.)<input type="text" name="ans4" size="60" value="<?php echo $d;?>"><input name="correctm" value="D" <?php if($respuesta == 'D'){ echo 'checked'; }?> type="radio"><br /><br />
</div>
<?php 
}
else
{	
?>
<div id="opt12">
	<input name="correctt" <?php if($row['answer'] == 'Verdadero'){ echo 'checked'; }?> value="Verdadero" type="radio">Verdadero<br /><br />
	<input name="correctt" <?php if($row['answer'] == 'Falso'){ echo 'checked'; }?> value="Falso" type="radio">Falso<br /><br />
</div>
<?php } ?>
											</div>
										</div>
									
											
						

						<div class="control-group">
										<div class="controls">
										
										<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Guardar</button>
										</div>
										</div>		
																				
										
		</form>							
		
		<?php
		if (isset($_POST['save']))
		{
			$question = $_POST['question'];
			//$points = $_POST['points'];
			$type = $_POST['question_tpye'];
			//$answer = $_POST['answer'];
			if($type=='1')
			{
				$answertm = $_POST['correctm'];
				$ans1 = $_POST['ans1'];
				$ans2 = $_POST['ans2'];
				$ans3 = $_POST['ans3'];
				$ans4 = $_POST['ans4'];
			}
			else
			{
				$answertvf = $_POST['correctt']; 
			}
			
			
			
		
			if ($type  == '2'){
					//mysqli_query($con,"insert into quiz_question (quiz_id,question_text,date_added,answer,question_type_id) values('$get_id','$question',NOW(),'".$_POST['correctt']."','$type')")or die(mysqli_error($con));
					mysqli_query($con,"update quiz_question set question_text = '$question', date_added = NOW(), answer = '$answertvf', question_type_id = '$type' WHERE quiz_id = '$get_id' and quiz_question_id='$quiz_question_id'")or die(mysqli_error($con));
			}
			else
			{
	
			//mysqli_query($con,"insert into quiz_question (quiz_id,question_text,date_added,answer,question_type_id) values('$get_id','$question',NOW(),'$answer','$type')")or die(mysqli_error($con));
				mysqli_query($con,"update quiz_question set question_text = '$question', date_added = NOW(), answer = '$answertm', question_type_id = '$type' WHERE quiz_id = '$get_id' and quiz_question_id='$quiz_question_id'")or die(mysqli_error($con));
				
				$queryg = mysqli_query($con,"SELECT * from answer where quiz_question_id='$quiz_question_id' order by quiz_question_id DESC")or die(mysqli_error($con));
					//$row = mysqli_fetch_array($query);
				while($rowg = mysqli_fetch_array($queryg))
				{	
					//$quiz_question_id = $row['quiz_question_id'];
					if($rowg['choices'] == 'A'){
						$a1 = $rowg['answer_id'];
					} else if($rowg['choices'] == 'B'){
						$b1 = $rowg['answer_id'];
					} else if($rowg['choices'] == 'C'){
						$c1 = $rowg['answer_id'];
					} else if($rowg['choices'] == 'D'){
						$d1 = $rowg['answer_id'];
					}
				}	
					mysqli_query($con,"update answer set quiz_question_id = '$quiz_question_id',answer_text = '$ans1' ,choices = 'A' where answer_id= '$a1'")or die(mysqli_error($con));
					mysqli_query($con,"update answer set quiz_question_id = '$quiz_question_id',answer_text = '$ans2' ,choices = 'B' where answer_id= '$b1'")or die(mysqli_error($con));
					mysqli_query($con,"update answer set quiz_question_id = '$quiz_question_id',answer_text = '$ans3' ,choices = 'C' where answer_id= '$c1'")or die(mysqli_error($con));
					mysqli_query($con,"update answer set quiz_question_id = '$quiz_question_id',answer_text = '$ans4' ,choices = 'D' where answer_id= '$d1'")or die(mysqli_error($con));
					
					//mysqli_query($con,"insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans2','B')")or die(mysqli_error($con));
					//mysqli_query($con,"insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans3','C')")or die(mysqli_error($con));
					//mysqli_query($con,"insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans4','D')")or die(mysqli_error($con));
				
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

		jQuery("#qtype").change(function(){	
			var x = jQuery(this).val();			
			if(x == '1') {
				jQuery("#opt11").show();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();
			} else if(x == '2') {
				jQuery("#opt11").hide();
				jQuery("#opt12").show();
				jQuery("#opt13").hide();
			}
		});
		
	});
</script>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>