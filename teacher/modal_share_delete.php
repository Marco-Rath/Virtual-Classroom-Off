				<!-- user delete modal -->
										
					
<div id="backup_delete" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#ffffff; opacity:0.7">x</button>
        <h4 class="modal-title" id="exampleModalLabel">¿Esta seguro de copiar el archivo<?php //echo $student_name;?> ?</h4>
       
        
      </div>
      <div class="modal-body">
        
		<center>
										<div class="control-group">
                                   		<div class="control-group">
                                          <div class="controls">
										  <p>Mover a:</p>
										  					<div class="control-group">
                                          <div class="controls">
                                            <select name="teacher_class_id"  class="" required>
                                             	<option></option>
																		<?php $query = mysqli_query($con,"SELECT * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id' and school_year = '$school_year_id' ")or die(mysqli_error($con));	
										while($row = mysqli_fetch_array($query)){
										$id = $row['teacher_class_id'];
										?>		
									
											<option value="<?php echo $row['teacher_class_id']; ?>">

											<?php echo $row['class_name']; ?> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['subject_code']; ?></option>
									
									<?php } ?>
										
                                            </select>
																	
									
                                          </div>
                                        </div>
										
										  	<button name="share" class="btn btn-success"><i class="icon-copy"></i> Copiar</button>
                                          </div>
                                        </div>
                                        </div>
										
									
										</center>				
					
		
    </div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Cerrar</button>

	</div>
  </div>
</div>
</div>