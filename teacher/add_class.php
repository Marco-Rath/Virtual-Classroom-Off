						<!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><h4><i class="icon-plus-sign"></i>Asignar aula y curso</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post" id="add_class">
										<div class="control-group">
											<label>Número de Aula:</label>
                                          <div class="controls">
											<input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
                                            <select name="class_id"  class="" required>
                                             	<option></option>
											<?php
											$query = mysqli_query($con,"SELECT * from class order by class_name");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
										<div class="control-group">
											<label>Curso:</label>
                                          <div class="controls">
                                            <select name="subject_id"  class="" required>
                                             	<option></option>
											<?php
											$query = mysqli_query($con,"SELECT * from subject order by subject_code");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_code']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
										<div class="control-group">
											<label>Periodo:</label>
                                          <!--<div class="controls">
											<?php
											//$query = mysqli_query($con,"SELECT * from school_year where status='Activated' order by school_year DESC");
											//$row = mysqli_fetch_array($query);
											?>
											<input id="" class="span5" type="text" class="" name="school_year" value="<?php  echo $row['school_year']; ?>" >
                                          </div> -->
										  <div class="controls">
                                            <select name="school_year"  class="" required>
                                             	<option></option>
											<?php
											$query = mysqli_query($con,"SELECT * from school_year where status='Activated' order by school_year DESC");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['school_year_id']; ?>"><?php echo $row['school_year']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
											<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-success"><i class="icon-save"></i> Guardar</button>
                                          </div>
                                        </div>
                                </form>
								
            <script>
			jQuery(document).ready(function($){
				$("#add_class").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "add_class_action.php",
						data: formData,
						success: function(html){
						if(html=="true")
						{
						$.jGrowl("Aula existente", { header: 'El aula ya existe' });
						}else{
							$.jGrowl("Aula agregada exitosamente", { header: 'Aula agregada' });
							var delay = 500;
							setTimeout(function(){ window.location = 'dasboard_teacher.php'  }, delay);  
						}
						}
					});
				});
			});
			</script>		

								</div>
                            </div>
                        </div>
                        <!-- /block -->
						
