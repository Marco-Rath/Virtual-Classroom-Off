<div class="span3" id="sidebar"><center>
	<img id="avatar" class="img-circle" src="../admin/<?php echo $row['location']; ?>">
	<?php include('teacher_count.php'); ?>
	<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
		<li class=""><a href="dasboard_teacher.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Mis clases</a></li>
		<li class=""><a href="notification_teacher.php"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Notificaciones
			<?php if($not_read == '0'){
				}else{ ?>
					<span class="badge badge-important"><?php echo $not_read; ?></span>
				<?php } ?>
		</a></li>
		<?php
			$message_query = mysqli_query($con,"SELECT * from message where reciever_id = '$session_id' and message_status != 'read' ")or die(mysqli_error($con));
			$count_message = mysqli_num_rows($message_query);
			?>
		<li class=""><a href="teacher_message.php"><i class="icon-chevron-right"></i><i class="icon-envelope-alt"></i>&nbsp;Mensajes
		<?php if($count_message == '0'){
				}else{ ?>
					<span class="badge badge-important"><?php echo $count_message; ?></span>
				<?php } ?>
		</a></li> 
		<li class=""><a href="teacher_backack.php"><i class="icon-chevron-right"></i><i class="icon-suitcase"></i>&nbsp;Portafolio</a></li> 
		<!-- <li class=""><a href="teacher_quiz.php"><i class="icon-chevron-right"></i><i class="icon-list"></i>&nbsp;Examenes</a></li>  -->
		<li class=""><a href="add_assignment.php"><i class="icon-chevron-right"></i><i class="icon-plus-sign"></i>&nbsp;Agregar Prácticas</a></li>
		<li class=""><a href="add_video.php"><i class="icon-chevron-right"></i><i class="icon-play"></i>&nbsp;Agregar Videos</a></li>	
		<li class=""><a href="add_downloadable.php"><i class="icon-chevron-right"></i><i class="icon-plus-sign"></i>&nbsp;Agregar Material Adicional</a></li>
		<li class=""><a href="add_announcement.php"><i class="icon-chevron-right"></i><i class="icon-plus-sign"></i>&nbsp;Agregar Noticias</a></li> 
	</ul>
	<?php include('search_other_class.php'); ?>	
</center>
</div>

