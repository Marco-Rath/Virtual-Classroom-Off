<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('subject_overview_link.php'); ?>
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
							<li><a href="#"><b>Descripción de Curso</b></a></li>
						</ul>
						 </div><!-- end breadcrumb -->
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right">
									<?php $query = mysqli_query($con,"SELECT * from teacher_class
										LEFT JOIN class_subject_overview ON class_subject_overview.teacher_class_id = teacher_class.teacher_class_id
										where class_subject_overview.teacher_class_id = '$get_id'")or die(mysqli_error($con));
										$row = mysqli_fetch_array($query);
										$id = $row['class_subject_overview_id'];
										$count = mysqli_num_rows($query);
									if ($count > 0){
									?>
										  <a href="edit_subject_overview.php<?php echo '?id='.$get_id; ?>&<?php echo 'subject_id='.$id; ?>" class="btn btn-info"><i class="icon-pencil"></i> Editar Descripción de Curso</a>
									 <?php }else{ ?>
										     <a href="add_subject_overview.php<?php echo '?id='.$get_id; ?>" class="btn btn-success"><i class="icon-plus-sign"></i> Agregar Descripción de Curso</a>
									 <?php } ?>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
										<?php echo $row['content']; ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>