				<div id="<?php echo $id;?>" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#ffffff; opacity:0.7">x</button>
        <h4 class="modal-title" id="exampleModalLabel">¿Esta seguro de eliminar el mensaje enviado<?php //echo $student_name;?> ?</h4>
       
        
      </div>
      <div class="modal-body">
        
		<div class="alert alert-danger">
			¿Esta seguro de eliminar el mensaje enviado?
		</div>				
					
		
    </div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Cerrar</button>
		<button   id="<?php echo $id; ?>" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i class="icon-check icon-large"></i> Si</button>	
	</div>
  </div>
</div>
</div>