   <div class="row-fluid">
       <a href="teachers.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Agregar Profesor</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Editar Profesor</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
								<!--
										<label>Photo:</label>
										<div class="control-group">
                                          <div class="controls">
                                               <input class="input-file uniform_on" id="fileInput" type="file" required>
                                          </div>
                                        </div>
									-->	
									<?php
									$query = mysqli_query($con,"select * from teacher where teacher_id = '$get_id' ")or die(mysqli_error($con));
									$row = mysqli_fetch_array($query);
									?>
										
										  <div class="control-group">
											<label>Colegio</label>
                                          <div class="controls">
                                            <select name="department"  class="chzn-select"required>
											<?php
											$query_teacher = mysqli_query($con,"select * from teacher join  department")or die(mysqli_error($con));
											$row_teacher = mysqli_fetch_array($query_teacher);
											
											?>
											
                                             	<option value="<?php echo $row_teacher['department_id']; ?>">
												<?php echo $row_teacher['department_name']; ?>
												</option>
											<?php
											$department = mysqli_query($con,"select * from department order by department_name");
											while($department_row = mysqli_fetch_array($department)){
											
											?>
											<option value="<?php echo $department_row['department_id']; ?>"><?php echo $department_row['department_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname" id="focusedInput" type="text" placeholder = "Nombres">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['lastname']; ?>"  name="lastname" id="focusedInput" type="text" placeholder = "Apellidos">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['about']; ?>"  name="phone" id="focusedInput" type="text" placeholder = "Teléfono/Celular">
                                          </div>
                                        </div>
										
									
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
				   <?php
                            if (isset($_POST['update'])) {
                       
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $department_id = $_POST['department'];
								$phone = $_POST['phone'];
								
								$query = mysqli_query($con,"select * from teacher where firstname = '$firstname' and lastname = '$lastname' ")or die(mysqli_error($con));
								$count = mysqli_num_rows($query);
								
								if ($count > 1){ ?>
								<script>
								alert('Ya existe ese registro');
								</script>
								<?php
								}else{
								
								mysqli_query($con,"update teacher set firstname = '$firstname' , lastname = '$lastname' , department_id = '$department_id' , about = '$phone' where teacher_id = '$get_id' ")or die(mysqli_error($con));	
								
								?>
								<script>
							 	window.location = "teachers.php"; 
								</script>
								<?php   }} ?>
						 
						 