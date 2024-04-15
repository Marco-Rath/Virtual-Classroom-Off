			<form id="signin_student" class="form-signin" method="post">
			<h3 class="form-signin-heading"><i class="icon-lock"></i> Registrar como Estudiante</h3>
			<input type="text" class="input-block-level" id="username" name="username" placeholder="Código (06 digitos)" maxlength="6" required>
			<input type="text" class="input-block-level" id="lastname" name="lastname" placeholder="Apellidos" required>
			<input type="text" class="input-block-level" id="firstname" name="firstname" placeholder="Nombres" required>
			<label>Aula</label>
			<select name="class_id" class="input-block-level span5">
				<option></option>
				<?php
				$query = mysqli_query($con,"select * from class order by class_name ")or die(mysqli_error($con));
				while($row = mysqli_fetch_array($query)){
				?>
				<option value="<?php  echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
				<?php
				}
				?>
			</select>
			<input type="password" class="input-block-level" id="password" name="password" placeholder="Contraseña" required>
			<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Repita Contraseña" required>
			<button id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i> Registrar</button>
			</form>
			
		
			
			<script>
			jQuery(document).ready(function(){
			jQuery("#signin_student").submit(function(e){
					e.preventDefault();
						
						var password = jQuery('#password').val();
						var cpassword = jQuery('#cpassword').val();
					    var username = jQuery('#username').val().length;
					//($(".txtReasonDecline").val().length == 0)
					if (username == 6)
					{
						if (password == cpassword){
						var formData = jQuery(this).serialize();
						$.ajax({
							type: "POST",
							url: "student_signup.php",
							data: formData,
							success: function(html){
							if(html=='true')
							{
							$.jGrowl("Bienvenido a avgConertgg: Aulas Virtual", { header: 'Registro Exitoso' });
							var delay = 2000;
								setTimeout(function(){ window.location = 'dashboard_student.php'  }, delay);  
							}else if(html=='false'){
								$.jGrowl("Estudiante no registrado en la base de datos, Porfavor verifique su codigo, nombres y apellidos, aula", { header: 'Registro Fallido' });
							}
							}
							
							
						});
				
						}
						else
						{
						$.jGrowl("Estudiante no registrado en la base de datos", { header: 'Registro Fallido' });
						}
					}
					else
					{
						$.jGrowl("El código debe ser de 06 digitos", { header: 'Error Código ' });
					}
					
				});
			});
			
			 
			</script>

			
		
			<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Clic para Iniciar Sesión</a>
			
			
			
				
		
					