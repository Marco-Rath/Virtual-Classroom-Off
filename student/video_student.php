<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<style>
/*  bhoechie tab */
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 20px;
  margin-left: 70px;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 10%;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
  width: 120%;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
  width: 120%;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #5A55A3;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
  background-color: #5A55A3;
  background-image: #5A55A3;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -13px;
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #5A55A3;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 20px;
  padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}

</style>
    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('video_link_student.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					  <!-- breadcrumb -->
				
										<?php $class_query = mysqli_query($con,"SELECT * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_class_id = '$get_id'")or die(mysqli_error($con));
										$class_row = mysqli_fetch_array($class_query);
										?>
				
					     <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul class="breadcrumb">
							<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b>Videos</b></a></li>
						</ul>
						 </div><!-- end breadcrumb -->
					 
                        <!-- block -->
            <div id="block_bg" class="block">
					<div class="navbar navbar-inner block-header">
					   <div id="" class="muted pull-left">Videos publicados </div>
					</div>
                <div class="block-content collapse in">
                            <div class="span12">
							<div class="container">
				<?php /*
							$query_announcement3 = mysqli_query($con,"SELECT * from videos where  teacher_class_id = '$get_id' order by date ASC")or die(mysqli_error($con));
							$k=1;
							while($row3= mysqli_fetch_array($query_announcement3))
							{
								 $id2 = $row3['video_id'];
								 include('delete_video_modal.php'); 
								 $k++;
							}*/
							?>	
							<div class="row">
							<?php
							$query_announcement = mysqli_query($con,"SELECT * from videos where  teacher_class_id = '$get_id' order by date ASC")or die(mysqli_error($con));
							$count = mysqli_num_rows($query_announcement);

							if ($count > 0)
							{
							?>
								<div class="col-lg-5 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">		
									  
										<?php
										$i=1;
										while($row = mysqli_fetch_array($query_announcement))
										{
											$id = $row['video_id'];
											$nombre=$row['name'];
											$direccion_v=$row['floc'];
											$iframe=$row['content'];
											if($direccion_v!=null && $iframe!=null)
											{
												?>
												
												
												<?php
												if($i=='1')
												{?> 
													<div class="list-group">
													<a href="#" class="list-group-item active text-center">
													  <h4 class="glyphicon glyphicon-play"></h4><br/><?php echo "$nombre"; ?>
													
												<?php
												} 
												else
												{?>
													<a href="#" class="list-group-item text-center">
													<h4 class="glyphicon glyphicon-play"></h4><br/><?php echo "$nombre"; ?>
												<?php
												}
												?>
													<a href="#" class="list-group-item text-center">
												  <h4 class="glyphicon glyphicon-play"></h4><br/><?php echo "$nombre"; ?>
												  
												</a>
												
											<?php 
											}
											else
											{
												if($direccion_v!=null)
												{
													
													if($i=='1')
													{?>
														<div class="list-group"><a href="#" class="list-group-item active text-center">
													<?php
													}
													else
													{?>
														<a href="#" class="list-group-item text-center">
													<?php
													}
													?>
													
													  <h4 class="glyphicon glyphicon-play"></h4><br/><?php echo "$nombre"; ?>
													  
													</a>
												<?php
												}
												elseif($iframe!=null)
												{
													
													if($i=='1')
													{?>
													<div class="list-group"><a href="#" class="list-group-item active text-center">
													<?php
													}
													else
													{?>
														<a href="#" class="list-group-item text-center">
													<?php
													}
													?>
													
													  <h4 class="glyphicon glyphicon-play"></h4><br/><?php echo "$nombre"; ?>
													  
													</a>
												<?php
												}
											}
											?>
											<?php $i++;
										} ?>
									  </div>
									</div>
									
										<?php
										$query_announcement2 = mysqli_query($con,"SELECT * from videos where  teacher_class_id = '$get_id' order by date ASC")or die(mysqli_error($con));
										$j=1;
										 while($row2 = mysqli_fetch_array($query_announcement2))
										 {
											 $id2 = $row2['video_id'];
											 $direccion_v2=$row2['floc'];
											 $iframe2=$row2['content'];
											 ?>
											<!-- flight section -->
										<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
											<?php 
												
												if($direccion_v2!=null && $iframe2!=null  )
												{
													if($j=='1')
													{?>
													<div class="bhoechie-tab-content active">
														
														<div style="width: 640px; height: 480px; position: relative;">
														
																	<?php echo $iframe2; ?>
																	
																	<div style="width: 100%; height: 12.5%; position: absolute; opacity: 1; right: 0px; top: 0px;background-color:#000"></div>
														</div>
														<hr>
																										
																	<strong><i class="icon-calendar"></i> <?php echo $row2['date']; ?></strong>
																	<strong><i class="icon-user"></i> <?php echo $row2['uploaded_by']; ?></strong>
													
													<?php
													}
													else
													{?>
													<div class="bhoechie-tab-content">
												
														<div style="width: 640px; height: 480px; position: relative;">
														
																	<?php echo $iframe2; ?>
																	
																	<div style="width: 100%; height: 12.5%; position: absolute; opacity: 1; right: 0px; top: 0px;background-color:#000"></div>
														</div>
														<hr>
																										
																	<strong><i class="icon-calendar"></i> <?php echo $row2['date']; ?></strong>
																	<strong><i class="icon-user"></i> <?php echo $row2['uploaded_by']; ?></strong>
													
													<?php
													}
													?>
													
													
													<!-- train section -->
												
													</div>
													<div class="bhoechie-tab-content">
													<div style="width: 640px; height: 480px; position: relative;">
																<video width="640px" height="480px" controls>
																	<source src="../admin/uploads/<?php echo $direccion_v2; ?>" type="video/mp4">
																	Tu navegador no soporta los vídeos de HTML5
																</video>
																<div style="width: 100%; height: 12.5%; position: absolute; opacity: 1; right: 0px; top: 0px;background-color:#000"></div>
															</div>
															
															<hr>
																									
																<strong><i class="icon-calendar"></i> <?php echo $row2['date']; ?></strong>
																<strong><i class="icon-user"></i> <?php echo $row2['uploaded_by']; ?></strong>
													</div>
											    <?php
												}
												else
												{
													if($direccion_v2!=null)
													{
														if($j=='1')
														{?>
														<div class="bhoechie-tab-content active">
														<?php
														}
														else
														{?>
														<div class="bhoechie-tab-content">
														<?php
														}
														?>
														
														<div style="width: 640px; height: 480px; position: relative;">
														
																	<video width="640px" height="480px" controls>
																		<source src="../admin/uploads/<?php echo $direccion_v2; ?>" type="video/mp4">
																		Tu navegador no soporta los vídeos de HTML5
																	</video>
																	<div style="width: 100%; height: 12.5%; position: absolute; opacity: 1; right: 0px; top: 0px;background-color:#000"></div>
														</div>
																
																	<hr>
																										
																	<strong><i class="icon-calendar"></i> <?php echo $row2['date']; ?></strong>
																	<strong><i class="icon-user"></i> <?php echo $row2['uploaded_by']; ?></strong>
																	
														</div>
													<?php 
													}
													elseif($iframe2!=null)
													{
														if($j=='1')
														{?>
															<div class="bhoechie-tab-content active">
															<?php
														}
														else
														{?>
															<div class="bhoechie-tab-content">
															<?php
														}
															?>
															
															<div style="width: 640px; height: 480px; position: relative;">
															
																		<?php echo $iframe2; ?>
																			
																		<div style="width: 100%; height: 12.5%; position: absolute; opacity: 1; right: 0px; top: 0px;background-color:#000"></div>
															</div>
																	
																		<hr>
																											
																		<strong><i class="icon-calendar"></i> <?php echo $row2['date']; ?></strong>
																		<strong><i class="icon-user"></i> <?php echo $row2['uploaded_by']; ?></strong>
																		
															</div>
													<?php
													}
												}
												?>
											<?php $j++;
											} ?>
											</div>
										</div>
							 </div>
								
							<?php
							}
							else
							{ 
								?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> No hay videos subidos.</div>
								<?php 
							} 	?>
						 
						  <?php //include('delete_video_modal.php'); ?>
			</div>
</div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
							</div>
							</div>
		<!-- /block -->
				</div>


			</div>
				
				
<script type="text/javascript">
/*	$(document).ready( function() {

		
		$('.remove').click( function() {
		
		var id = $(this).attr("id");
			$.ajax({
			type: "POST",
			url: "delete_video.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			$.jGrowl("Su archivo fue eliminado", { header: 'Eliminar' });
			window.location = 'video_student.php<?php echo '?id='.$get_id; ?>';
			}
			}); 
			
			return false;
		});				
	});
*/
</script>

<script>
$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
</script>
					
                </div>
				
			
            </div>
			
		
		
		
			
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>