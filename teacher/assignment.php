<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('assignment_link.php'); ?>
                <div class="span6" id="content">
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
							<li><a href="#"><b>Practicas Subidas</b></a></li>
						</ul>
						 </div><!-- end breadcrumb -->
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
										<thead>
										        <tr>
												<th>Fecha Subida</th>
												<th>Nombre de Archivo</th>
												<th>Descripcion</th>
												<th></th>
												</tr>
										</thead>
										<tbody>
											
                              		<?php
										$query = mysqli_query($con,"SELECT * FROM assignment where class_id = '$get_id' and teacher_id = '$session_id' order by fdatein DESC ")or die(mysqli_error($con));
										while($row = mysqli_fetch_array($query)){
										$id  = $row['assignment_id'];
										$floc  = $row['floc'];
									?>                              
								<tr>
										 <td><?php echo $row['fdatein']; ?></td>
                                         <td><?php  echo $row['fname']; ?></td>
                                         <td><?php echo $row['fdesc']; ?></td>                                      
                                         <td width="150">
										  <form method="post" action="view_submit_assignment.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$id ?>">
										
										 <button data-placement="bottom" title="Ver estudiante que envío practica" id="<?php echo $id; ?>view" class="btn btn-success"><i class="icon-folder-open-alt icon-large"></i></button>

										</form>
										<?php 
										if ($floc == ""){
										}else{
										?>
										 <!--<a data-placement="bottom" title="Descargar" id="<?php echo $id; ?>download"  class="btn btn-info" href="<?php echo $row['floc']; ?>"><i class="icon-download icon-large"></i></a> -->
										 <a data-placement="bottom" title="Descargar" id="<?php echo $id; ?>download" class="btn btn-info" href="descarga.php?file=<?php echo $row['floc']; ?>"><i class="icon-download icon-large"></i></a>
										<?php } ?>
										 <a data-placement="bottom" title="Eliminar" id="<?php echo $id; ?>remove"  class="btn btn-danger"  href="#<?php echo $id; ?>" data-toggle="modal"><i class="icon-remove icon-large"></i></a>
										 <?php include('delete_assigment_modal.php'); ?>									
										</td>                                      
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>download').tooltip('show');
															$('#<?php echo $id; ?>download').tooltip('hide');
														});
														</script>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>remove').tooltip('show');
															$('#<?php echo $id; ?>remove').tooltip('hide');
														});
														</script>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>view').tooltip('show');
															$('#<?php echo $id; ?>view').tooltip('hide');
														});
														</script>
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

				<?php include('assignment_sidebar.php') ?>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>