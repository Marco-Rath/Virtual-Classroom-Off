   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Agregar Periodo</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="school_year" id="focusedInput" type="text" placeholder = "Periodo" required>
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
					
					<?php
if (isset($_POST['save'])){
$school_year = $_POST['school_year'];



$query = mysqli_query($con,"select * from school_year where school_year = '$school_year'")or die(mysqli_error($con));
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Ya existe ese proceso');
</script>
<?php
}else{
mysqli_query($con,"insert into school_year (school_year, status) values('$school_year', 'Desactivated')")or die(mysqli_error($con));

mysqli_query($con,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Agregar Periodo $school_year')")or die(mysqli_error($con));
?>
<script>
window.location = "school_year.php";
</script>
<?php
}
}
?>