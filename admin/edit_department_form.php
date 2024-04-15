   <div class="row-fluid">
    <a href="department.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Agregar Colegio</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Editar Colegio </div>
                            </div>
							<?php 
							$query = mysqli_query($con,"select * from department where department_id = '$get_id'")or die(mysqli_error($con));
							$row = mysqli_fetch_array($query);
							?>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['department_name']; ?>" id="focusedInput" name="d" type="text" placeholder = "Colegio">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['dean']; ?>" id="focusedInput" name="dn" type="text" placeholder = "Persona Encargada">
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
 if (isset($_POST['update'])){
 

 $dn = $_POST['dn'];
 $d = $_POST['d'];
 
 mysqli_query($con,"update department set department_name = '$d' , dean  = '$dn' where department_id = '$get_id' ")or die(mysqli_error($con));
 ?>
 <script>
 window.location='department.php'; 
 </script>
 <?php 
 }
 ?>
 