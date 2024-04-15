<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
    <body>
	
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
					<?php include('sidebar_backup.php'); ?>
                
                <!--/span-->
                <div class="span9" id="content">
								        <div id="block_bg" class="block">
                
								<div class="block-content collapse in">
										<div class="span8">
							<!-- block -->
										<div class="navbar navbar-inner block-header">
											<div class="muted pull-left">Copia de Seguridad</div>
										</div>
															<div >
									
<a href="backup_script.php" id="sss">
<img src="images/backup.png" alt="backup" />
</a>
<br />
<br />
Copias de Seguridad
<br />
<table
<tr id="head">
<td>
Archivo
</td>
<td>
Acción
</td>
</tr>
<?php
// List the files
$dir = opendir ("./DB_backup"); 
while (false !== ($file = readdir($dir))) { 

	// Print the filenames that have .sql extension
	if (strpos($file,'.sql',1)) { 

	// Remove the sql extension part in the filename
	$filenameboth = str_replace('.sql', '', $file);
                        
	// Print the cells

		echo "<tr id='eee'>";
		echo '<td>'.$filenameboth.".sql".'</td>';
		echo "<td>"."<a href='DB_backup/" . $filenameboth . ".sql' class='view'>Descargar SQL</a>"."</td>";
		echo "</tr>";
		
	} 
} 
?>
</table>														
															
										</div>		
										</div>
										
											
							<!-- block -->
						
										</div>
                                </div>		
                </div>
            </div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
	
    </body>

</html>