<div class="row-fluid">

		<!-- block -->
        <div class="block">                   
			<div class="navbar navbar-inner block-header">
				<div class="muted pull-left">Agregar Avisos</div>
			</div>
			<div class="block-content collapse in">
				<div class="span12">
				<form class="" id="add_downloadble" method="post"  >
					<div class="control-group" style="display: inline-block;">

					<label class="control-label" for="inputPassword" >Ingresa nombre del aviso (*)</label>
						  <div class="controls">
							<input class="input focused" name="nombre" id="focusedInput" type="text" placeholder = "Nombre de aviso" required> 
												
						  </div>
					</div>
						  <div class="control-group" style="display: inline-block;">
												<label class="control-label" for="inputPassword" >Intervalo de tiempo</label>
												<select name="tiempo">
												   <option disabled selected value>Selecciona</option>
													<option value="600">10 min</option>
													<option value="1200">20 min</option>
													<option value="3600">01 hora</option>
													<option value="10800">03 hora</option>
													<option value="43200">12 hora</option>
													<option value="86400">24 hora</option>
													
												</select>
							</div>
									
					<div class="control-group">
						<div class="controls">
						<textarea name="content" id="ckeditor_full"></textarea>
						</div>
					</div>
				
					
				
				<hr>
					<center>
					<div class="control-group">
								<div class="controls">
									<button name="Upload" type="submit" value="Upload" class="btn btn-success" /><i class="icon-check"></i>&nbsp;Publicar</button>
								</div>
					</div>
					</center>

			    </form>
				
				</div>
			</div>
		</div>
		<!-- block -->
</div>
<?php

if (isset($_POST['Upload'])){

	$content = $_POST['content'];	
	$nombre_a= $_POST['nombre'];
	$tiempo = $_POST['tiempo'];
	//$id=$_POST['selector'];
		//$N = count($id);
		
		//for($i=0; $i < $N; $i++)
		//{			
			mysqli_query($con,"insert into avisos (contenido,nombre_aviso,date,tiempo,estado) values('$content','$nombre_a',NOW(),'$tiempo','Inactivo')")or die(mysqli_error($con));
			//mysqli_query($con,"insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','Agregó aviso',NOW(),'announcements_student.php')")or die(mysqli_error($con));
		//}
}
?>

<script>
/*jQuery(document).ready(function($){
$("#add_downloadble").submit(function(e){
	e.preventDefault();
	var formData = $(this).serialize();
	$.ajax({
		type: "POST",
		url: "add_announcement_save.php",
		data: formData,
		success: function(html){
			$.jGrowl("Aviso agregado correctamente", { header: 'Aviso' });
			window.location = 'add_announcement.php';
		}

	});
});
});*/
</script>	
	
