<div class="span3" id="">
	<div class="row-fluid">
	
				      <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><h4><i class="icon-pencil"></i> Crear Mensaje</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="teacher_message.php">Para Profesor</a>
										</li>
										<li><a href="teacher_message_teacher.php">Para Estudiante</a></li>
									</ul>
									
								


								<form method="post" id="send_message" name="upload">
									<div class="control-group">
											<label>Para:</label>
                                          <div class="controls">
                                            <select name="teacher_id"  class="chzn-select" required>
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
										
										<div class="control-group">
											<label>Contenido mensaje:</label>
                                          <div class="controls">
											<textarea name="my_message" class="my_message" required></textarea>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
												<button name="Upload" type="submit" value="Upload" class="btn btn-info"><i class="icon-envelope-alt"></i> Enviar </button>
												
												

                                          </div>
                                        </div>
                                </form>

						
								
							
								
								
										<script>
			/*jQuery(document).ready(function(){
			jQuery("#send_message").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "send_message.php",
						data: formData,
						success: function(html){
						
						$.jGrowl("Mensaje exitoso", { header: 'Mensaje enviado' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'teacher_message.php'  
							}, delay);  
						
						
						}
						
					});
					return false;
				});
			});*/
			</script>
			<script>
			jQuery(document).ready(function($){
				$("#send_message").submit(function(e){
					$.jGrowl("Enviando mensaje......", { sticky: true });
					e.preventDefault();
					var _this = $(e.target);
					var formData = new FormData($(this)[0]);
					$.ajax({
						type: "POST",
						url: "send_message.php",
						data: formData,
						success: function(html){
							$.jGrowl("Mensaje enviado correctamente", { header: 'Mensaje enviado' });
							window.location = 'teacher_message.php';
						},
						cache: false,
						contentType: false,
						processData: false

					});
				});
			});
			</script>
									
								
								
								</div>
                            </div>
                        </div>
                        <!-- /block -->
						

	</div>
</div>