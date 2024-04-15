			<form id="signin_teacher" class="form-signin" method="post">
					<h3 class="form-signin-heading"><i class="icon-lock"></i> Registrar como Profesor</h3>
					<input type="text" class="input-block-level"  name="lastname" placeholder="Apellidos" required>
					<input type="text" class="input-block-level"  name="firstname" placeholder="Nombres" required>
					<label>Curso / Curso</label>
					<select name="department_id" class="input-block-level span12">
						<option></option>
						<?php
						$query = mysqli_query($con,"select * from department order by department_name ")or die(mysqli_error($con));
						while($row = mysqli_fetch_array($query)){
						?>
						<option value="<?php echo $row['department_id'] ?>"><?php echo $row['department_name']; ?></option>
						<?php
						}
						?>
					</select>
					<input type="text" class="input-block-level" id="username" name="username" placeholder="Usuario" required>
					<input type="password" class="input-block-level" id="password" name="password" placeholder="Contraseña" required>
					<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Repita Contraseña" required>
					<button id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i> Registrar</button>
			</form>
			<script>
			jQuery(document).ready(function(){
			jQuery("#signin_teacher").submit(function(e){
					e.preventDefault();
						var password = jQuery('#password').val();
						var cpassword = jQuery('#cpassword').val();
					if (password == cpassword){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "teacher_signup.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						$.jGrowl("Bienvenido avgConertgg: Aula Virtual", { header: 'Acceso Permitido' });
						var delay = 1000;
							setTimeout(function(){ window.location = 'dasboard_teacher.php'  }, delay);  
						}else{
							$.jGrowl("Su información no esta registrada en la basa de datos", { header: 'Registro Fallido' });
						}
						}
					});
			
					}else
						{
						$.jGrowl("su información no esta registrada en la base de datos", { header: 'Registro Fallido' });
						}
				});
			});
			</script>
			<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Clic para Iniciar Sesión</a>
			
			
			
				
		
					
		