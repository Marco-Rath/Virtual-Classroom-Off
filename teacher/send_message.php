<?php
include('../admin/dbcon.php');
include('../session.php');

$teacher_id = $_POST['teacher_id'];

function clean($str) 
{
	
	include('../admin/dbcon.php');
    $str = @trim($str);
    if (get_magic_quotes_gpc())
	{
        $str = stripslashes($str);
    }
    return mysqli_real_escape_string($con,$str);
}

//Sanitize the POST values
$content = clean($_POST['my_message']);

$query = mysqli_query($con,"SELECT * from teacher where teacher_id = '$teacher_id'")or die(mysqli_error($con));
$row = mysqli_fetch_array($query);
$name = $row['firstname']." ".$row['lastname'];

$query1 = mysqli_query($con,"SELECT * from teacher where teacher_id = '$session_id'")or die(mysqli_error($con));
$row1 = mysqli_fetch_array($query1);
$name1 = $row1['firstname']." ".$row1['lastname'];


mysqli_query($con,"insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name,message_status) values('$teacher_id','$content',NOW(),'$session_id','$name','$name1','')")or die(mysqli_error($con));
mysqli_query($con,"insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$teacher_id','$content',NOW(),'$session_id','$name','$name1')")or die(mysqli_error($con));


?>



