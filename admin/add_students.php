   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Agregar Estudiante</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form id="add_student" method="post">
								
								        <div class="control-group">
                                   
                                          <div class="controls">
                                            <select  name="class_id" class="" style="width:95%" required>
                                             	<option></option>
											<?php
											$cys_query = mysqli_query($con,"select * from class order by class_name");
											while($cys_row = mysqli_fetch_array($cys_query)){
											
											?>
											<option value="<?php echo $cys_row['class_id']; ?>"><?php echo $cys_row['class_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
								
										<div class="control-group">
                                          <div class="controls">
                                            <input name="un" class="input focused" id="focusedInput" type="text" placeholder = "Codigo" style="width:95%" required>
                                          </div> 
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="dni" class="input focused" id="focusedInput" type="text" placeholder = "DNI" style="width:95%" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="fn" class="input focused" id="focusedInput" type="text" placeholder = "Nombres" style="width:95%" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input  name="ln" class="input focused" id="focusedInput" type="text" placeholder = "Apellidos" style="width:95%" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input  name="dir" class="input focused" id="focusedInput" type="text" placeholder = "Dirección" style="width:95%" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input  name="celular" class="input focused" id="focusedInput" type="text" placeholder = "Celular" style="width:95%" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input  name="email" class="input focused" id="focusedInput" type="text" placeholder = "Correo electrónico" style="width:95%" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                   
                                          <div class="controls">
                                            <select  name="carrera_id" class="" style="width:95%" required>
                                             	<option></option>
											<?php
											$car_query = mysqli_query($con,"select * from department order by department_id");
											while($car_row = mysqli_fetch_array($car_query)){
											
											?>
											<option value="<?php echo $car_row['department_id']; ?>"><?php echo $car_row['department_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                   
                                          <div class="controls">
                                            <select  name="ciclo_id" class="" style="width:95%" required>
                                             	<option disabled selected>Periodo</option>
											<?php
											$cos_query = mysqli_query($con,"select * from school_year where status='Activated' order by school_year_id");
											while($cos_row = mysqli_fetch_array($cos_query)){
											
											?>
											<option value="<?php echo $cos_row['school_year_id']; ?>"><?php echo $cos_row['school_year']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
											<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			<script>
			jQuery(document).ready(function($){
				$("#add_student").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "save_student.php",
						data: formData,
						success: function(html){
							$.jGrowl("Estudiante agregado exitosamente", { header: 'Estudiante agregado' });
							$('#studentTableDiv').load('student_table.php', function(response){
								$("#studentTableDiv").html(response);
								$('#example').dataTable( {
									"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
									"sPaginationType": "bootstrap",
									"oLanguage": {
										"sLengthMenu": "_MENU_ records per page"
									}
								} );
								$(_this).find(":input").val('');
								$(_this).find('select option').attr('selected',false);
								$(_this).find('select option:first').attr('selected',true);
							});
						}
					});
				});
			});
			</script>		
