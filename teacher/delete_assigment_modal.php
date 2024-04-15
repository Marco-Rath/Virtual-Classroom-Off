		<!-- Modal -->
<div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#ffffff; opacity:0.7">x</button>
        <h4 class="modal-title" id="exampleModalLabel">¿Esta seguro de eliminar el material<?php //echo $student_name;?> ?</h4>
       
        
      </div>
      <div class="modal-body">
        
		<div class="alert alert-danger">
			¿Esta seguro de eliminar la práctica?
		</div>				
					
		
    </div>
	<div class="modal-footer">
		<form method="post" action="delete_assignment.php">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Cerrar</button>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
		<button class="btn btn-danger" name="change"><i class="icon-check icon-large"></i> Si</button>
		</form>
	</div>
  </div>
</div>
</div>

				