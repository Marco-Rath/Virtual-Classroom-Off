   <div class="row-fluid">
       <a href="students.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Agregar Estudiante</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Agregar Estudiante</div>
                            </div>
                            <div class="block-content collapse in">
							<?php
							$query = mysqli_query($con,"select * from student 
							LEFT JOIN class ON class.class_id = student.class_id 
							LEFT JOIN department ON department.department_id= student.carrera
							LEFT JOIN school_year ON school_year.school_year_id= student.cod_ciclo
							where student_id = '$get_id' ")or die(mysqli_error($con));
							$row = mysqli_fetch_array($query);
							?>
                                <div class="span12">
								<form method="post">
								
								        <div class="control-group">
                                   
                                          <div class="controls">
                                            <select  name="cys" class="" required>
                                             	<option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
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
                                            <input name="dni" value="<?php echo $row['dni']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "DNI" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="un" value="<?php echo $row['username']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Codigo" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input name="fn"  value="<?php echo $row['firstname']; ?>"  class="input focused" id="focusedInput" type="text" placeholder = "Nombres" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input  name="ln"  value="<?php echo $row['lastname']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Apellidos" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input  name="celular"  value="<?php echo $row['celular']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Celular" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                   
                                          <div class="controls">
                                            <select  name="carrera_id" class="" required>
                                             	<option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>
											<?php
											$cys_query = mysqli_query($con,"select * from department order by department_id");
											while($cys_row = mysqli_fetch_array($cys_query)){
											
											?>
											<option value="<?php echo $cys_row['department_id']; ?>"><?php echo $cys_row['department_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                   
                                          <div class="controls">
                                            <select  name="ciclo_id" class="" required>
                                             	<option value="<?php echo $row['school_year_id']; ?>"><?php echo $row['school_year']; ?></option>
											<?php
											$cys_query = mysqli_query($con,"select * from school_year where status='Activated' order by school_year_id ");
											while($cys_row = mysqli_fetch_array($cys_query)){
											
											?>
											<option value="<?php echo $cys_row['school_year_id']; ?>"><?php echo $cys_row['school_year']; ?></option>
											<?php } ?>
                                            </select>
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
                               
                                $un = $_POST['un'];
								$dni = $_POST['dni'];
                                $fn = $_POST['fn'];
                                $ln = $_POST['ln'];
								$celular = $_POST['celular'];
                                $cys = $_POST['cys'];
								$car = $_POST['carrera_id'];
								$ciclo = $_POST ['ciclo_id'] ;                     

								mysqli_query($con,"update student set username = '$un' , dni ='$dni' , firstname ='$fn' , lastname = '$ln',celular = '$celular', class_id = '$cys', carrera = '$car', cod_ciclo = '$ciclo' where student_id = '$get_id' ")or die(mysqli_error($con));
															
								
								/*$query_e = mysqli_query($con,"select * from teacher_class_student where student_id='$get_id'")or die(mysqli_error($con));
								$count_my_student = mysqli_num_rows($query_e);
								if($count_my_student > 0)
								{
									$query_clase = mysqli_query($con,"SELECT * from teacher_class where class_id='$cys'")or die(mysqli_error($con));
									$clases_query_row = mysqli_fetch_array($query_clase);
									$school_year_id = $clases_query_row['teacher_class_id'];
									mysqli_query($con,"update teacher_class_student set teacher_class_id = '$cys' where student_id = '$get_id' ")or die(mysqli_error($con));
								
								}*/
								?>
 
								<script>
								window.location = "students.php"; 
								</script>

                       <?php     }  ?>
	