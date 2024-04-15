<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('downloadable_link.php'); ?>
                <div class="span6" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
										<?php $class_query = mysqli_query($con,"SELECT * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										LEFT JOIN school_year ON school_year.school_year_id = teacher_class.school_year
										where teacher_class_id = '$get_id'")or die(mysqli_error($con));
										$class_row = mysqli_fetch_array($class_query);
										$class_id = $class_row['class_id'];
										$school_year_id = $class_row['school_year_id'];
										?>
					     <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul class="breadcrumb">
							<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
							<li><a href="#">Periodo: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b>Material Descargable</b></a></li>
						</ul>
						 </div><!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div id="downloadable_table.php" class="span12">
									<div class="pull-right">
							Seleccionar Todo <input type="checkbox"  name="selectAll" id="checkAll" />
								<script>
								$("#checkAll").click(function () {
									$('input:checkbox').not(this).prop('checked', this.checked);
								});
								</script>					
							</div>
								
									<?php
										$query = mysqli_query($con,"SELECT * FROM files where class_id = '$get_id'  order by fdatein DESC ")or die(mysqli_error($con));
										$count = mysqli_fetch_array($query);
										if ($count == '0'){ ?>
											<div class="alert alert-info"><i class="icon-info-sign"></i> Actualmente no has subido ningun material descargable</div>
						
									<?php	}else{
									?>  
  								<form action="copy_file.php" method="post">
								
									<a data-toggle="modal" href="#user_delete" id="delete"  class="btn btn-info" name=""><i class="icon-file"></i> Copiar el archivo seleccionado</a>
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<?php include('move_to_school_year.php'); ?>
										<thead>
										        <tr>
												<th>Fecha Subida</th>
												<th>Nombre de Archivo</th>
												<th>Descripcion</th>
												<th>Subido por</th>
												<th></th>
												<th></th>
												</tr>
												
										</thead>
										<tbody>
											
                              		<?php
										$query = mysqli_query($con,"SELECT * FROM files where class_id = '$get_id'  order by fdatein DESC ")or die(mysqli_error($con));
										while($row = mysqli_fetch_array($query)){
										$id  = $row['file_id'];
									?>                              
										<tr id="del<?php echo $id; ?>">
									
										 <td><?php echo $row['fdatein']; ?></td>
                                         <td><?php  echo $row['fname']; ?></td>
                                         <td><?php echo $row['fdesc']; ?></td>                                      
                                         <td><?php echo $row['uploaded_by']; ?></td>                                      
                                         <td width="40">
										<!-- <a  data-placement="bottom" title="Descargar" id="<?php echo $id; ?>download" href="<?php echo $row['floc']; ?>"><i class="icon-download icon-large"></i></a>-->
										 <a  data-placement="bottom" title="Descargar" id="<?php echo $id; ?>download" href="descarga.php?file=<?php echo $row['floc']; ?>"><i class="icon-download icon-large"></i></a>
										 <a  data-placement="bottom" title="Eliminar" id="<?php echo $id; ?>remove" href="#<?php echo $id; ?>" data-toggle="modal"><i class="icon-remove icon-large"></i></a>
										 <?php include('delete_download_modal.php'); ?>
										 </td>                                      
										<td width="30">
											<input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
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
                               
                                </tr>
                         
						 <?php } ?>
						   
                              
										</tbody>
									</table>
									</form>
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
			url: "delete_file.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			$.jGrowl("Su archivo fue eliminado", { header: 'Eliminar' });
		
			}
			}); 
			
			return false;
		});				
	});

</script>
					
                </div>
				<?php include('downloadable_sidebar.php') ?>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>