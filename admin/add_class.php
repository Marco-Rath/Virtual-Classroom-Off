   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Añadir Aula</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input name="class_name" class="input focused" id="focusedInput" type="text" placeholder = "Nombre de Aula" required>
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
                    </div><?php
if (isset($_POST['save'])){
$class_name = $_POST['class_name'];


$query = mysqli_query($con,"select * from class where class_name  =  '$class_name' ")or die(mysqli_error($con));
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Date Already Exist');
</script>
<?php
}else{
mysqli_query($con,"insert into class (class_name) values('$class_name')")or die(mysqli_error($con));
?>
<script>
window.location = "class.php";
</script>
<?php
}
}
?>