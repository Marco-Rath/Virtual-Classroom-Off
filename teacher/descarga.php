<?php
session_start();
/*if (isset($_SESSION['id'])) {
  $archivo = filter_input(INPUT_GET, 'fileid', 513);
  descargar_archivo($archivo);
  exit();
}
function descargar_archivo($archivo) {
   $ruta_completa = "/mis/archivos/varios/" . $archivo;
   header("Content-length:" . filesize($ruta_completa));
   $mimetype = "application/x-zip-compressed";
   header("Content-Type: " . $mimetype);
   header('Content-Type: application/octet-stream');
   header('Content-Disposition: attachment; filename="' . $archivo . '"');
   header('Content-Transfer-Encoding: binary');
   return readfile_chunked($ruta_completa);
}*/

if(isset($_SESSION['id'])) {
      $ruta_completa = "../admin/uploads/";
      $name = $_GET['file'];
      header("Content-disposition: attachment; filename=$name");
      header("Content-type: application/octet-stream");
      readfile($ruta_completa.'/'.$name);
 
   } else {
 
      //echo "solo los usuarios registrados pueden descargar archivos";
	  ?>
	  <img src="images/404.jpg" width=100%>
	  <?php
   }
/*function readfile_chunked($filename, $retbytes = TRUE) {
    $chunk_size = 1024 * 1024;
    $buffer = "";
    $cnt = 0;
    $handle = fopen($filename, "rb");
    while (!feof($handle)) {
        $buffer = fread($handle, $chunk_size);
        echo $buffer;
        flush();
        if ($retbytes) {
            $cnt += strlen($buffer);
        }
    }
    $status = fclose($handle);
    if ($retbytes && $status) {
        return $cnt;
    }
    return $status;
}*/