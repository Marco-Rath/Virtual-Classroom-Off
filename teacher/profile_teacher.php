<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
    <body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('teacher_sidebar.php'); ?>
                <div class="span6" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
									
					     <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul class="breadcrumb">
						<?php
						$school_year_query = mysqli_query($con,"SELECT * from school_year where status='Activated' order by school_year DESC")or die(mysqli_error($con));
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year_id = $school_year_query_row['school_year_id'];
						?>
							<li><a href="#">Profesores</a><span class="divider">/</span></li>
							<li><a href="#"><b>Perfil</b></a></li>
						</ul>
						 </div><!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
										<div class="alert alert-info"><i class="icon-info-sign"></i> Contacto:</div>
								<?php $query= mysqli_query($con,"SELECT * from teacher where teacher_id = '$session_id'")or die(mysqli_error($con));
								$row = mysqli_fetch_array($query);
						?>
  									<?php echo $row['about']; ?>
						
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
				<?php include('teacher_right_sidebar.php') ?>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>