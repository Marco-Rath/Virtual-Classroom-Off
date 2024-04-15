<?php include('header.php'); ?>
  <body id="login">
    <div class="container">

      <form id="login_form" class="form-signin" method="post">
        <h3 class="form-signin-heading"><i class="icon-lock"></i> Identificarse</h3>
        <div class="control-group">
                                          <div class="controls">
		<input type="text" class="input-block-level" id="usernmae" name="username" placeholder="Usuario" required>
        	</div>
									</div>
									<div class="control-group">
                                          <div class="controls">
		<input type="password" class="input-block-level" id="password" name="password" placeholder="Contraseña" required>
        </div>
									</div>
		<button name="login" class="btn btn-success" type="submit"><i class="icon-signin icon-large"></i> Iniciar Sesión</button>
		
		<a href='../index.php' class="btn btn-info"><i class="icon-backward icon"></i>&nbsp;Volver</a>
		      </form>
				<script>
			jQuery(document).ready(function(){
			jQuery("#login_form").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "login.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						$.jGrowl("Bienvenido al avgConertgg: Aula Virtual", { header: 'Access Granted' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'dashboard.php'  }, delay);  
						}
						else
						{
						$.jGrowl("Por favor verifique su Usuario y Contraseña", { header: 'Login Failed' });
						}
						}
						
					});
					return false;
				});
			});
			</script>

		


    </div> <!-- /container -->
<?php include('script.php'); ?>
  </body>
</html>