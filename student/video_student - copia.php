<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  min-height: 640px;
  height: 100%;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  min-height: 640px;
  height: 100%;
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
							<li><a href="#"><b>Avisos</b></a></li>
						</ul>
						 </div><!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								 <?php
								 $query_announcement = mysqli_query($con,"SELECT * from videos
																	where  teacher_class_id = '$get_id' order by date ASC
																	")or die(mysqli_error($con));
								$count = mysqli_num_rows($query_announcement);
								if ($count > 0){
								?><div class="tab">
								<?php
								$i=1;
								 while($row = mysqli_fetch_array($query_announcement)){
								 $id = $row['video_id'];
								 $nombre=$row['name'];
								 ?>
											
											
										
										  <button class="tablinks" onclick="openCity(event, '<?php echo $id; ?>')" id="defaultOpen">Video <?php echo $id; ?></button>
											<!--<p>Descripción del video <?php echo "$nombre;" ?></p>
											<button class="tablinks" onclick="openCity(event, 'Tokyo')">Video2</button>
											  </div>-->
										
										
										
								<?php //$i++;} ?>
														
												<!--<div id="Tokyo" class="tabcontent">
												  <h3>Contenido 02</h3>
												  <p>Tokyo is the capital of Japan.</p>
												</div>-->
											
											
											
											
											
											
								<?php $i++;} ?>
								
								</div>
								
								<?php
								$query_announcement2 = mysqli_query($con,"SELECT * from videos
																	where  teacher_class_id = '$get_id' order by date ASC
																	")or die(mysqli_error($con));
								$j=1;
								 while($row = mysqli_fetch_array($query_announcement2)){
								 $id = $row['video_id'];
								 ?>
										
										<div id="<?php echo $id; ?>" class="tabcontent">
												  <h3>Contenido <?php echo $id; ?></h3>
												  <p>
												  
												  
													<div class="post"  id="del<?php echo $id; ?>">
														<div style="width: 640px; height: 480px; position: relative;">

														<?php echo $row['content']; ?>
														<div style="width: 100%; height: 12.5%; position: absolute; opacity: 1; right: 0px; top: 0px;background-color:#000"></div>
														</div>
														
													
														<hr>
														
													
														<strong><i class="icon-calendar"></i> <?php echo $row['date']; ?></strong>
														<strong><i class="icon-user"></i> <?php echo $row['uploaded_by']; ?></strong>
													</div>
												  
												  
												  </p>
										</div>
								<?php $j++;} ?>
								
								
								<?php
								
								}
								else
								{ 
									?>
									<div class="alert alert-info"><i class="icon-info-sign"></i> No hay videos subidos.</div>
									<?php 
								} 	?>
                                </div>
								
							
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
				
				

					<script type="text/javascript">
	$(document).ready( function() {

		
		$('.remove').click( function() {
		
		var id = $(this).attr("id");
			$.ajax({
			type: "POST",
			url: "remove_video.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			$.jGrowl("Your Post is Successfully Deleted", { header: 'Data Delete' });
		
			}
			}); 
			
			return false;
		});				
	});

</script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
					
                </div>
				
			
            </div>
			
		
		
		
			
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>