	<div class="navbar navbar-fixed-top navbar-inverse">
           <div class="navbar-inner">
               <div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
                   <a class="brand" href="#">Bienvenido a avgConertgg Aula Virtual</a>
							<div class="nav-collapse collapse">
								<ul class="nav pull-right">
												<?php $query= mysqli_query($con,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error($con));
														$row = mysqli_fetch_array($query);
												?>
												<li class="dropdown">
													<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> 
													<i class="icon-user icon-large"></i><?php echo $row['firstname']." ".$row['lastname'];  ?> <i class="caret"></i></a>
															<ul class="dropdown-menu">
																<li>
																	<a href="change_password_teacher.php"><i class="icon-circle"></i> Cambiar Contraseña</a>
																	<a href="#myModal" data-toggle="modal"><i class="icon-picture"></i> Cambiar imagen de perfil</a>
																	<a href="profile_teacher.php"><i class="icon-user"></i> Perfil</a>
																</li>
																<li class="divider"></li>
																<li><a href="logout.php"><i class="icon-signout"></i>&nbsp;Cerrar Sesión</a></li>
															</ul>
												</li>
								</ul>
							</div>
                   <!--/.nav-collapse -->
               </div>
           </div>
</div>
<?php include('avatar_modal.php'); ?>		