  <div  id="<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="margin-top: -1px;margin-right: -1px;">
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#ffffff; opacity:0.7">x</button>
        <h4 class="modal-title" id="exampleModalLabel">Comunicado #avgConertgg <?php //echo $student_name;?> </h4>
       
        
      </div>
      <div class="modal-body">
        
		
					
									<?php
									$tiempo_query5 = mysqli_query($con,"select * from avisos where avisos_id='$id'") or die(mysqli_error($con));
									$row5 = mysqli_fetch_array($tiempo_query5);
									echo $row5['contenido'];
									
									//echo $contenido5;
									?>
									
								
		
    </div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Cerrar</button>
	
		
	</div>
  </div>
</div>
</div>