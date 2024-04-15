<?php
  # Iniciando la variable de control que permitirá mostrar o no el modal
  $exibirModal = true;
  # Verificando si existe o no la cookie
  /*if(!isset($_COOKIE["mostrarModal"]))
  {
    # Caso no exista la cookie entra aquí
    # Creamos la cookie con la duración que queramos
     
    //$expirar = 3600; // muestra cada 1 hora
    //$expirar = 10800; // muestra cada 3 horas
    //$expirar = 21600; //muestra cada 6 horas
    $expirar = 43200; //muestra cada 12 horas
    //$expirar = 86400;  // muestra cada 24 horas
    setcookie('mostrarModal', 'SI', (time() + $expirar)); // mostrará cada 12 horas.
    # Ahora nuestra variable de control pasará a tener el valor TRUE (Verdadero)
    $exibirModal = true;
  }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mostrar Ventana Emergente</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>
  <div class="container">
  
  
 
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#ffffff; opacity:0.7">x</button>
        <h4 class="modal-title" id="exampleModalLabel">Cambiar imagen de perfil <?php //echo $student_name;?> </h4>
       
        
      </div>
      <div class="modal-body">
        
		
							<center>	
								<div class="control-group">
								<div class="controls">
									<input name="image" class="input-file uniform_on" id="fileInput" type="file" required>
								</div>
								</div>
							</center>				
					
		
    </div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Cerrar</button>
		<button class="btn btn-info" name="change"><i class="icon-save icon-large"></i> Guardar</button>
		
	</div>
  </div>
</div>
</div>

	
	
	
  </div>
  <?php if($exibirModal === true) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. ?>
  <script>
  $(document).ready(function()
  {
    // id de nuestro modal
    $("#exampleModal").modal("show");
  });
  </script>
  <?php endif; ?>
</body>
</html>