<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('assignment_link_student.php'); ?>
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
							<li><a href="#"><b>Practicas Subidas</b></a></li>
						</ul>
						 </div><!-- end breadcrumb -->
						
						
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
								<?php $query = mysqli_query($con,"SELECT * FROM assignment where class_id = '$get_id'  order by fdatein DESC")or die(mysqli_error($con)); 
									  $count  = mysqli_num_rows($query);
								?>
                                <div id="" class="muted pull-right"><span class="badge badge-info"><?php echo $count; ?></span></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
									$query = mysqli_query($con,"SELECT * FROM assignment where class_id = '$get_id'  order by fdatein DESC")or die(mysqli_error($con));
									$count = mysqli_num_rows($query);
									if ($count == '0'){?>
									<div class="alert alert-info">No hay material de prácticas aún</div>
									<?php
									}else{
								?>
  											
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
										$query = mysqli_query($con,"SELECT * FROM assignment where class_id = '$get_id'  order by fdatein DESC")or die(mysqli_error($con));
										while($row = mysqli_fetch_array($query)){
										$id  = $row['assignment_id'];
										$floc = $row['floc'];
									?>                              
										<tr>
										 <td><?php echo $row['fdatein']; ?></td>
                                         <td><?php  echo $row['fname']; ?></td>
                                         <td><?php echo $row['fdesc']; ?></td>                                      
                                         <td width="220">
										 <form id="assign" method="post" action="submit_assignment.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$id ?>">
										 <input type="hidden" name="id" value="<?php echo $id; ?>">
										 <?php
											if ($floc == ""){
											}else{
										 ?>
										  <!--<a data-placement="bottom" title="Descagar" id="<?php echo $id; ?>download"  class="btn btn-info" href="<?php echo $row['floc']; ?>"><i class="icon-download icon-large"></i></a>-->
										  <a data-placement="bottom" title="Descargar" id="<?php echo $id; ?>download" class="btn btn-info" href="descarga.php?file=<?php echo $row['floc']; ?>"><i class="icon-download icon-large"></i></a>
										 <?php } ?>
										 <button  data-placement="bottom" title="Enviar practica" id="<?php echo $id; ?>submit" class="btn btn-success" name="btn_assign"><i class="icon-upload icon-large"></i> Enviar Practica</button>
										 </form>
										 </td>                                      
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>submit').tooltip('show');
															$('#<?php echo $id; ?>submit').tooltip('hide');
														});
														</script>
                             							<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>download').tooltip('show');
															$('#<?php echo $id; ?>download').tooltip('hide');
														});
														</script>

                               
                                </tr>
                         
						 <?php } ?>
						   
                              
										</tbody>
									</table>
						 <?php } ?>
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