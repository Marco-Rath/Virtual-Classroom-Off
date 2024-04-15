<!-- Modal -->
<div id="reply<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#ffffff; opacity:0.7">x</button>
        <h4 class="modal-title" id="exampleModalLabel">¿Esta seguro de responder al mensaje <?php //echo $student_name;?> ?</h4>
       
        
      </div>
      <div class="modal-body">
        
		<form  id="reply" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputEmail">A:</label>
			<div class="controls">
				<input type="hidden" name="sender_id" id="inputEmail" value="<?php echo $sender_id; ?>" readonly>
				<input type="hidden" name="my_name" value="<?php echo $reciever_name; ?>" readonly>
				<input type="text" name="name_of_sender"  id="inputEmail" value="<?php echo $sender_name; ?>" readonly>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Contenido:</label>
			<div class="controls">
				<textarea name="my_message"></textarea>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
			<button type="submit" id="<?php echo $id; ?>" class="btn btn-success reply"><i class="icon-reply"></i> Responder</button>
			</div>
		</div>
         </form>				
					
		
    </div>
	<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Cerrar</button>
		<button   id="<?php echo $id; ?>" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i class="icon-check icon-large"></i> Si</button>
	</div>
  </div>
</div>
</div>
				
			