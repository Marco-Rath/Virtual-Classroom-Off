<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('share_sidebar_teacher.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
									<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul class="breadcrumb">
										<?php
										$school_year_query = mysqli_query($con,"SELECT * from school_year where status='Activated' order by school_year DESC")or die(mysqli_error($con));
										$school_year_query_row = mysqli_fetch_array($school_year_query);
										$school_year_id = $school_year_query_row['school_year_id'];
										?>
											<li><a href="#"><b>Mis clases</b></a><span class="divider">/</span></li>
										<li><a href="#">Periodo: <?php echo $school_year_query_row['school_year']; ?></a><span class="divider">/</span></li>
										<li><a href="#"><b>Documentos Compartidos</b></a></li>
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
												Seleccionar Todo <input type="checkbox"  name="selectAll" id="checkAll" />
												<script>
												$("#checkAll").click(function () {
													$('input:checkbox').not(this).prop('checked', this.checked);
												});
												</script>					
									</div>
									<form action="delete_shared.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
								<a data-toggle="modal" href="#backup_delete" id="delete"  class="btn btn-success" name=""><i class="icon-move icon-large"></i> Mover</a>
									<?php include('modal_share_delete.php');  ?>
										<thead>
										        <tr>
												<th></th>
												<th>Fecha Subida</th>
												<th>Nombre de Archivo</th>
												<th>Descripcion</th>
												<th>Compartido por</th>
												<th></th>
												</tr>
										</thead>
										<tbody>
                              		<?php
										$query = mysqli_query($con,"SELECT * FROM teacher_shared
										LEFT JOIN teacher on teacher_shared.teacher_id = teacher.teacher_id
										where shared_teacher_id = '$session_id' 
										order by fdatein DESC")or die(mysqli_error($con));
										while($row = mysqli_fetch_array($query)){
										$id  = $row['teacher_shared_id'];
									?>                              
										<tr id="del<?php echo $id; ?>">
										<td width="30">
											<input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
										 <td><?php echo $row['fdatein']; ?></td>
                                         <td><?php  echo $row['fname']; ?></td>
                                         <td><?php echo $row['fdesc']; ?></td>                                      
                                         <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>                                      
                                         <td width="30"><a href="descarga.php?file=<?php echo $row['floc']; ?>"><i class="icon-download icon-large"></i></a></td>                                      
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