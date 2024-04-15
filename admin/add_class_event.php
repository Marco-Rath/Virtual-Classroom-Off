 <form id="signin_student" class="form-signin" method="post">
	<h4 class="form-signin-heading"><i class="icon-plus-sign"></i> Agregar Evento</h4>
	    <input type="text" class="input-block-level datepicker" name="date_start" id="date01" placeholder="Fecha Inicio" required/>
	    <input type="text" class="input-block-level datepicker" name="date_end" id="date01" placeholder="Fecha Fin" required/>
		<input type="text" class="input-block-level" id="username" name="title" placeholder="Titulo Evento" required/>
	<button id="signin" name="add" class="btn btn-info" type="submit"><i class="icon-save"></i> Guardar</button>
</form>
<?php
if (isset($_POST['add'])){
	$date_start = $_POST['date_start'];
	$date_end = $_POST['date_end'];
	$title = $_POST['title'];
	
	$query = mysqli_query($con,"insert into event (date_end,date_start,event_title,teacher_class_id) values('$date_end','$date_start','$title','0')")or die(mysqli_error($con));
	?>
	<script>
	window.location = "calendar_of_events.php";
	</script>
<?php
}
?>

		<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
									
		
										<thead>
										        <tr>
												<th>Evento</th>
												<th>Fecha</th>
												<th></th>
												
												</tr>
												
										</thead>
										<tbody>
											
                             
									<?php $event_query = mysqli_query($con,"select * from event where teacher_class_id = '0' ")or die(mysqli_error($con));
										while($event_row = mysqli_fetch_array($event_query)){
										$id  = $event_row['event_id'];
									?>                              
										<tr id="del<?php echo $id; ?>">
									
										 <td><?php echo $event_row['event_title']; ?> </td>
                                         <td><?php  echo date('d/m/Y',strtotime($event_row['date_start'])); ?>
											<br>a
											 <?php  echo date('d/m/Y',strtotime($event_row['date_end'])); ?>
										 </td>                                    
                                         <td width="40">
							
										 <a  class="btn btn-danger" href="delete_event.php<?php echo '?id='.$id; ?>"><i class="icon-remove icon-large"></i></a>
								
										 </td>                                      
									
                             

                               
                                </tr>
                         
						 <?php } ?>
						   
                              
										</tbody>
									</table>
