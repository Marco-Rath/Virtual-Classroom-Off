<div class="span3" id="">
	<div class="row-fluid">
				      <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><h4><i class="icon-plus-sign"></i> Agregar Practica</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form class="" action="assign_save.php<?php echo '?id='.$get_id; ?>" method="post" enctype="multipart/form-data" name="upload" >
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Archivo:</label>
                            <div class="controls">
				
									
								<input name="uploaded_file"  class="input-file uniform_on" id="fileInput" type="file" >
                         
                                <input type="hidden" name="MAX_FILE_SIZE" value="1048576000" />
                                <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
                                <input type="hidden" name="id_class" value="<?php echo $get_id; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                      
                            <div class="controls">
                                <input type="text" name="name" Placeholder="Nombre de Archivo"  class="input">
                            </div>
                        </div>
                        <div class="control-group">
                          
                            <div class="controls">
							<textarea id="assigntextare" placeholder="Descripcion" name="desc" required></textarea>
                             <!--   <input type="text" name="desc" Placeholder="Descripcion"  class="input" required> -->
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">

                                <button name="Upload" type="submit" value="Upload" class="btn btn-success" /><i class="icon-upload-alt"></i>&nbsp;Subir</button>
                            </div>
                        </div>
                    </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
						

	</div>
</div>