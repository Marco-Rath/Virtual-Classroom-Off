<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php $class_quiz_id = $_GET['class_quiz_id']; ?>
<?php $quiz_id = $_GET['quiz_id']; ?>
<?php $quiz_time = $_GET['quiz_time']; ?>

<?php $query1 = mysqli_query($con,"SELECT * from student_class_quiz where student_id = '$session_id' and class_quiz_id = '$class_quiz_id' ")or die(mysqli_error($con));
	  $count = mysqli_num_rows($query1);
?>

<?php
if ($count > 0){
	//echo "si pasa";
}else{
 mysqli_query($con,"insert into student_class_quiz (class_quiz_id,student_id,student_quiz_time,grade) values('$class_quiz_id','$session_id','$quiz_time','')");
//echo "no pasa";	
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

							
							<?php
if($_GET['test'] == 'ok'){
/* $sqlp = mysqli_query($con,"SELECT * FROM groupcode WHERE course_code = '".$row['course_code']."'"); */
/*$sqlp = mysqli_query($con,"SELECT * FROM class_quiz WHERE class_quiz_id = '$class_quiz_id'")or die(mysqli_error($con));
$rowp = mysqli_fetch_array($sqlp);
 mysqli_query($con,"UPDATE students SET `time-left` = ".$rowp['time']." WHERE stud_id = '".$_SESSION['user_id']."'"); */
/* echo $rowp['time']; */
$x=0;
?>
										<script>
										jQuery(document).ready(function(){
											var timer = 1;
											jQuery(".questions-table input").hide();
										setInterval(function(){
											var timer = jQuery("#timer").text();
											jQuery("#timer").load("timer.ajax.php<?php echo '?class_quiz_id='.$class_quiz_id; ?>");	
											if(timer == 0){
												jQuery(".questions-table input").hide();
												jQuery("#submit-test").show();
												jQuery("#msg").text("El tiempo a terminado!!!\nPor favor envien sus respuestas");
											} else {
												jQuery(".questions-table input").show();
											}
										},990);	
										});
										</script>
<form action="take_test.php<?php echo '?id='.$get_id; ?>&<?php echo 'class_quiz_id='.$class_quiz_id; ?>&<?php echo 'test=done' ?>&<?php echo 'quiz_id='.$quiz_id; ?>&<?php echo 'quiz_time='.$quiz_time; ?>" name="testform" method="POST" id="test-form">
<?php
										$sqla = mysqli_query($con,"SELECT * FROM class_quiz 
										LEFT JOIN quiz ON quiz.quiz_id  = class_quiz.quiz_id
										where teacher_class_id = '$get_id' 
										order by date_added DESC ")or die(mysqli_error($con));
										/* $row = mysqli_fetch_array($sqla); */
										$rowa = mysqli_fetch_array($sqla);
					
										/* $rowa   = $row['quiz_id']; */
/* $sqla = mysqli_query($con,"SELECT * FROM class_quiz WHERE course_code = '".$row['course_code']."'"); */

?>
										<h2>Título de examen: <b><?php echo $rowa['quiz_title'];?></b></h3>
										
										<h3><p><b>Descripción:<?php echo $rowa['quiz_description'];?></b></p></h3>
										<p>Duración de examen (Minutos):</p><h3><div id="timer">1</div><div id="msg"></div></h3>
										
										
					<script>
					jQuery(document).ready(function(){	
						jQuery(".questions").each(function(){
							jQuery(this).hide();
						});
						jQuery("#q_1").show();
					});
					</script>
										<script>
										jQuery(document).ready(function(){
										var nq = 0;
										var qn = 0;
											jQuery(".nextq").click(function(){
												qn = jQuery(this).attr('qn');
												nq = parseInt(qn) + 1;
												jQuery('#q_' + qn ).fadeOut();
												jQuery('#q_' + nq ).show();		
											});
										});
										</script>
<table class="questions-table table">
<tr>
<th>Nro</th>
<th>Pregunta</th>
</tr>
<?php
	$sqlw = mysqli_query($con,"SELECT * FROM quiz_question where quiz_id = '$quiz_id'  ORDER BY RAND()");
	$qt = mysqli_num_rows($sqlw); 
	while($roww = mysqli_fetch_array($sqlw))
	{
?>
<tr id="q_<?php echo $x=$x+1;?>" class="questions">
<td width="30" id="qa"><?php echo $x;?></td>
<td id="qa">
<?php echo $roww['question_text'];?>
<br>
<hr>
<?php
if($roww['question_type_id']=='2'){
?>
	<input name="q-<?php echo $roww['quiz_question_id'];?>" value="Verdadero" type="radio"> Verdadero&nbsp;|&nbsp;<input name="q-<?php echo $roww['quiz_question_id'];?>" value="Falso" type="radio"> Falso
<?php
} else if($roww['question_type_id']=='1') {
	$sqly = mysqli_query($con,"SELECT * FROM answer WHERE quiz_question_id = '".$roww['quiz_question_id']."'");
	while($rowy = mysqli_fetch_array($sqly)){
	if($rowy['choices'] == 'A') {
	?>
	A.)<input name="q-<?php echo $roww['quiz_question_id'];?>" value="A" type="radio"> <?php echo $rowy['answer_text'];?><br /><br />
	<?php } else if ($rowy['choices'] == 'B') {?>                                 
	B.) <input name="q-<?php echo $roww['quiz_question_id'];?>" value="B" type="radio"> <?php echo $rowy['answer_text'];?><br /><br />
	<?php } else if ($rowy['choices'] == 'C') {?>                                 
	C.) <input name="q-<?php echo $roww['quiz_question_id'];?>" value="C" type="radio"> <?php echo $rowy['answer_text'];?><br /><br />
	<?php } else if ($rowy['choices'] == 'D') {?>                                 
	D.) <input name="q-<?php echo $roww['quiz_question_id'];?>" value="D" type="radio"> <?php echo $rowy['answer_text'];?><br /><br />
	<?php
		}
	}
}
else if($roww['question_type_id']=='3') {
	$sqly = mysqli_query($con,"SELECT * FROM answer WHERE quiz_question_id = '".$roww['quiz_question_id']."'");
	while($rowy = mysqli_fetch_array($sqly)){
	if($rowy['choices'] == 'A') {
	?>
	Escriba su respuesta:<input type="text" name="ans1" size="120" value=""><input name="q-<?php echo $roww['quiz_question_id'];?>" value="" type="radio"> Marque su respuesta<br /><br />
	<?php } 
	}
}
?>
<br/>

<button onclick="return false;" qn="<?php echo $x;?>" class="nextq btn btn-success" id="next_<?php echo $x;?>">Siguiente pregunta <i class="icon-arrow-right"></i> </button>
<input type="hidden" name="x-<?php echo $x;?>" value="<?php echo $roww['quiz_question_id'];?>">
</td>
</tr>
<?php
	}
?>
<tr>
<td></td>
<td>
<button class="btn btn-info" id="submit-test" name="submit_answer"><i class="icon-check"></i> Enviar respuesta</button>
<!-- <input type="submit" value="Submit My Answers"  class="btn btn-info" id="submit-test" name="submit_answer"><br /> -->
</td>
</tr>
</table>
<input type="hidden" name="x" value="<?php echo $x;?>">
</form>
<?php
}
elseif(isset($_POST['submit_answer'])){
	$x1 = $_POST['x'];
	if(isset($_POST['ans1']))
	{
		$ans1=$_POST['ans1'];
	}
	else
	{
		$ans1="";
	}
	$score = 0;
	for($x=1;$x<=$x1;$x++){
	
		$x2 = $_POST["x-$x"];
		$q = $_POST["q-$x2"];
		
		$sql = mysqli_query($con,"SELECT * FROM quiz_question WHERE quiz_question_id = ".$x2."");
		$row = mysqli_fetch_array($sql);
		if($row['answer'] == $q) {
			$score= $score + 1;
		}
		
	} ?>
	<a href="student_quiz_list.php<?php echo '?id='.$get_id; ?>"><i class="icon-arrow-left"></i> Atrás</a>
	<center>
	<h3><br>Tu puntaje es <b><?php echo $score; ?></b> de <b><?php echo ($x-1); ?></b><br/></h3>
	</center>
	<?php
	/* echo "Your Percentage Grade is : <b>".$per."%</b>"; */
	mysqli_query($con,"UPDATE student_class_quiz SET `student_quiz_time` = 3600, `grade` = '".$score." de ".($x-1)."' WHERE student_id = '$session_id' and class_quiz_id = '$class_quiz_id'")or die(mysqli_error($con));
	
	mysqli_query($con,"UPDATE student_class_quiz SET `student_quiz_time` = 3600, `grade` = '".$score." de ".($x-1)."' WHERE student_id = '$session_id' and class_quiz_id = '$class_quiz_id'")or die(mysqli_error($con));
?>
<script>
	  window.location = 'student_quiz_list.php<?php echo '?id='.$get_id; ?>'; 
</script>
<?php
	} /* else { */
?>
<br />
<?php
/* $sql = mysqli_query($con,"SELECT * FROM students WHERE stud_id = '".$_SESSION['user_id']."'");
$row = mysqli_fetch_array($sql);
	if(is_null($row['grade']) AND $row['time-left'] == 3600){ */
?>
<!--	<a href="?test=ok">Take the test now</a> -->
<?php
/* 	} else if(is_null($row['grade']) AND $row['time-left'] < 3600 AND $row['time-left'] > 0){ */
?>
<!--	<a href="?test=ok">Continue your test</a> -->
<?php
/* 	} else if(!is_null($row['grade'])){
		$sqlg = mysqli_query($con,"SELECT * FROM groupcode WHERE course_code = '".$row['course_code']."'");
		$rowg = mysqli_fetch_array($sqlg);
		echo "You have already taken <b>".$rowg['course_title']."</b> - <b>".$rowg['course_code']."</b> test.";
	}
	if($row['grade']!=''){
		mysqli_query($con,"UPDATE students SET `time-left` = 3600 WHERE stud_id = '".$_SESSION['user_id']."'");
		echo "<br />Your Grade for this Test is :  <b>".$row['grade']."</b>";		
	}
} */
?>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
							
	
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