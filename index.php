<?php include('header.php'); ?>
<?php
  # Iniciando la variable de control que permitirá mostrar o no el modal
  $exibirModal = false;
  /*$tiempo_query = mysqli_query($con,"select * from avisos where estado='Activo'") or die(mysqli_error($con));
  $row = mysqli_fetch_array($tiempo_query);
  $id = $row['avisos_id'];*/
  
  $aviso_query = mysqli_query($con,"select * from avisos where estado='Activo'") or die(mysqli_error($con));
  $count = mysqli_num_rows($aviso_query);
  if($count>0)
  {	
	   	
	   while ($row = mysqli_fetch_array($aviso_query)) 
		{
			$id = $row['avisos_id'];
			$estado=$row['estado'];
			$contenido=$row['contenido'];
			//$exibirModal = true;
			include('modalInicio.php');
		}
  }
  # Verificando si existe o no la cookie
  
 
  //if($id2==$id)
  //{
	  //$i=0;
	  $tiempo_query2 = mysqli_query($con,"select * from avisos where estado='Activo'") or die(mysqli_error($con));
	  while($row2 = mysqli_fetch_array($tiempo_query2)){
		  if(!isset($_COOKIE['mostrarModal']))
		  //if($id=$row2['avisos_id'])
		  {
			# Caso no exista la cookie entra aquí
			# Creamos la cookie con la duración que queramos
			$id2 = $row2['avisos_id'];
			//$tiempo = 
			$expirar= array($count);
			$expirar= $row2['tiempo'];
			
			setcookie('mostrarModal', 'SI', (time() + $expirar)); 
			
			# Ahora nuestra variable de control pasará a tener el valor TRUE (Verdadero)
			
			$exibirModal = true;
		  }
		  //$i++;
	  }
	  
  //}
  
?>
    <body id="login">
	
		<?php //include('teacher/navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="span2" id="">

				</div>
                <div class="span6" id="content">
				<div class="row-fluid">
				<div class="span12"></div>						
				</div>
			
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="" class="block">
                            <div class="block-content collapse in">
								<div class="span12" id="">
									
									<?php include('title_index.php'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
				<div class="span3" id="">
					<div class="row-fluid">
					<div class="pull-right" style="margin-top: 0%;width:100%">
						<?php //include('add_class.php') ?>
						<?php include('login_form.php'); ?>
					</div>
					</div>
				</div>
				
            </div>
		
		<div class="row-fluid">
			<div class="span2"></div>
			<div class="span9"><div class="index-footer"><?php include('link.php'); ?></div></div>
		</div><?php //include('footer.php'); ?>
        </div>
		
		<?php include('script.php'); ?>
		<?php 
    if($exibirModal === true) :
	$aviso_query2 = mysqli_query($con,"select * from avisos where estado='Activo'")or die(mysqli_error($con));
	while($row = mysqli_fetch_array($aviso_query2))
	{
		 $id = $row['avisos_id'];
		 ?>
		<script>
		  $(document).ready(function()
		  {
			// id de nuestro modal
			$("#<?php echo $id;?>").modal("show");
		  });
		 </script>
		<?php
	}
	endif; ?>
    </body>
</html>