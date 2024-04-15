<?php
include('../admin/dbcon.php');
        
               $un = $_POST['un'];
			   $dni = $_POST['dni'];
               $fn = $_POST['fn'];
               $ln = $_POST['ln'];
			   $celular = $_POST['celular'];
               $class_id = $_POST['class_id'];
			   $carrera_id = $_POST['carrera_id'];
			   $ciclo = $_POST['ciclo_id'];

               mysqli_query($con,"insert into student (username,dni,firstname,lastname,celular,location,class_id,carrera,cod_ciclo, status) values ('$un','$dni','$fn','$ln','$celular','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','$carrera_id','$ciclo','Unregistered')") or die(mysqli_error($con)); ?>
<?php    ?>