<?php include('header.php'); ?>
<?php include('session.php'); ?>

    <body id="class_div">
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar_avisos.php'); ?>
				<div class="span5" id="adduser">
				<?php include('add_announcement_save.php'); ?>		   			
				</div>
		         <div class="span4" id="">
                     <div class="row-fluid">
					    <!-- block -->
						<div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Avisos actuales</div>
                            </div>
							<div class="block-content collapse in">
							<div class="span12">
								<form action="delete_aviso.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#aviso_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
												<th>Aviso (Debe activar solo un aviso)</th>
												<th></th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$user_query = mysqli_query($con,"select * from avisos")or die(mysqli_error($con));
													while($row = mysqli_fetch_array($user_query)){
													$id = $row['avisos_id'];
													$nombre_aviso=$row['nombre_aviso'];
													$tiempo=$row['tiempo'];
													$status =$row['estado'];
													?>
									
												<tr>
												<td width="10%">
												<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td width="60%"> <?php echo $nombre_aviso; ?></td>
												<td width="60%"> <?php echo $tiempo; ?></td>
												<!--<td width="5%" style="padding-right: 1px;">
												<a href="edit_year.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
												</td>
												<td width="5%" style="padding-left: 1px;padding-right:1px;">
												<a href="edit_year.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
												</td>-->
		
												<?php if ($status == "Activo" ){ ?>
												<td width="5%" style="padding-left: 1px;"><a href="aviso_desactivate.php<?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="icon-remove"></i> Desactivar</a></td>
												<?php }else{ ?>
												<td width="5%" style="padding-left: 1px;"><a href="aviso_activate.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-check"></i> Activar</a></td>				
												<?php } ?>
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