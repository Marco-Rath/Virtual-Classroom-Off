<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_message_sidebar.php'); ?>
                <div class="span6" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					     <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul class="breadcrumb">
								<?php
								$school_year_query = mysqli_query($con,"SELECT * from school_year where status='Activated' order by school_year DESC")or die(mysqli_error($con));
								$school_year_query_row = mysqli_fetch_array($school_year_query);
								$school_year_id = $school_year_query_row['school_year_id'];
								?>
								<li><a href="#">Message</a><span class="divider">/</span></li>
								<li><a href="#"><b>Sent Messages</b></a><span class="divider">/</span></li>
								<li><a href="#">Periodo: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
						 </div><!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
										<ul class="nav nav-pills">
										<li class=""><a href="student_message.php"><i class="icon-envelope-alt"></i>Bandeja de Entrada</a></li>
										<li class="active"><a href="sent_message_student.php"><i class="icon-envelope-alt"></i>Enviar mensajes</a></li>
										</ul>
									
								<?php
								 $query_announcement = mysqli_query($con,"SELECT * from message_sent
																	LEFT JOIN student ON student.student_id = message_sent.reciever_id
																	where  sender_id = '$session_id'  order by date_sended DESC
																	")or die(mysqli_error($con));
								 $count_my_message = mysqli_num_rows($query_announcement);
								 if ($count_my_message != '0'){
								 while($row = mysqli_fetch_array($query_announcement)){
								 $id = $row['message_sent_id'];
								 ?>
											<div class="post"  id="del<?php echo $id; ?>">
											<?php echo $row['content']; ?>
													<hr>
											Enviar a: <strong><?php echo $row['reciever_name']; ?></strong>
											<i class="icon-calendar"></i> <?php echo $row['date_sended']; ?>
													<div class="pull-right">
													<a class="btn btn-link"  href="#<?php echo $id; ?>" data-toggle="modal" ><i class="icon-remove"></i> Eliminar </a>
													<?php include("remove_sent_message_modal.php"); ?>
													</div>
											</div>
								<?php }}else{ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> No hay mensajes en tus Buzon Enviados</div>
								<?php } ?>	
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
<script type="text/javascript">
	$(document).ready( function() {

		
		$('.remove').click( function() {
		
		var id = $(this).attr("id");
			$.ajax({
			type: "POST",
			url: "remove_sent_message.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			$.jGrowl("Su mensaje fue eliminado correctamente", { header: 'Mensaje eliminado' });
		
			}
			}); 
			
			return false;
		});				
	});

</script>
	

                </div>
				<?php include('create_message_student.php') ?>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>