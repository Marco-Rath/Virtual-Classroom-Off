<div id="user_delete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#ffffff; opacity:0.7">x</button>
        <h4 class="modal-title" id="exampleModalLabel">¿Compartir o copiar archivo <?php //echo $student_name;?> ?</h4>
       
        
      </div>
      <div class="modal-body">
        
		<center>
										<div class="control-group">
											<label>Periodo:</label>
                                          <div class="controls">
										  	<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
                                            <select name="school_year"  class="">
                                            <option></option>
											<?php
											$query1 = mysqli_query($con,"SELECT * from teacher_class where class_id ='$class_id' and school_year != '$school_year_id'")or die(mysqli_error($con));
											while($row = mysqli_fetch_array($query1)){
											
											?>
											<option><?php echo $row['school_year']; ?></option>
											<input type="hidden" name="teacher_class_id" value="<?php echo $row['teacher_class_id']; ?>">
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
										  	<button name="delete_user" class="btn btn-danger"><i class="icon-copy"></i> Copiar</button>
                                          </div>
                                        </div>
										</center>
										
											<center>
										<div class="control-group">
											<label>------------O----------</label>
                                   		<div class="control-group">
                                          <div class="controls">
										  	<button name="copy" class="btn btn-info"><i class="icon-copy"></i> Copiar a portafolio</button>
                                          </div>
                                        </div>
                                        </div>
										
									
										</center>
										
										
										<center>
										<div class="control-group">
											<label>------------O----------</label>
                                   		<div class="control-group">
                                          <div class="controls">
										  <p>Compartir:</p>
										  					<div class="control-group">
											<label>A:</label>
                                          <div class="controls">
                                            <select name="teacher_id1"  class="" >
                                             	<option></option>
											<?php
											$query = mysqli_query($con,"SELECT * from teacher order by firstname");
											while($row = mysqli_fetch_array($query)){
											
											?>
											
											<option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> </option>
											
											<?php } ?>
                                            </select>
							
                                          </div>
                                        </div>
										
										  	<button name="share" class="btn btn-success"><i class="icon-copy"></i> Compartir</button>
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
