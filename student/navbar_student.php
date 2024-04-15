<div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
					<span class="icon-bar"></span><span class="icon-bar"></span>
                </a>
                <a class="brand" href="#"><img src="../admin/images/logo.jpeg" width="2.5%" > Bienvenido a avgConertgg: Aula Virtual 2023</a>
					<div class="nav-collapse collapse">
						<ul class="nav pull-right">
							<?php $query= mysqli_query($con,"select * from student where student_id = '$session_id'")or die(mysqli_error($con));
									$row = mysqli_fetch_array($query);
							?>
							<li class="dropdown">
								<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-large"></i><?php echo $row['firstname']." ".$row['lastname'];  ?> <i class="caret"></i></a>
									<ul class="dropdown-menu">
										<li><a tabindex="-1" href="change_password_student.php"><i class="icon-circle"></i> Cambiar Contraseña</a></li>
										<li><a tabindex="-1" href="#myModal_student" data-toggle="modal"><i class="icon-picture"></i> Cambiar imagen de perfil</a></li>
										<li class="divider"></li>
										<li>
											<a tabindex="-1" href="logout.php"><i class="icon-signout"></i>&nbsp;Cerrar Sesión</a>
										</li>
									</ul>
							</li>
						</ul>
					</div>
            </div>
        </div>
</div>
<?php include('avatar_modal_student.php'); ?>	