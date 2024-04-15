<div id="campuses" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#ffffff; opacity:0.7">x</button>
        <h4 class="modal-title" id="exampleModalLabel">Campus <?php //echo $student_name;?> </h4>
       
        
      </div>
      <div class="modal-body">
        
		<?php
											$mission_query = mysqli_query($con,"SELECT * from content where title  = 'Campuses' ")or die(mysqli_error($con));
											$mission_row = mysqli_fetch_array($mission_query);
											echo $mission_row['content'];
										?>
	</div>
	<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>

</div>
  </div>
</div>
</div>
<!-- end  Modal -->