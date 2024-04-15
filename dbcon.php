<?php
//mysql_select_db('capstone',mysql_connect('localhost','root',''))or die(mysqli_error($con));
$host='localhost';
$user='root';
$pass='';
$name='aulavirtual';
$con = mysqli_connect("$host","$user","$pass","$name");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 mysqli_query($con,"SET NAMES 'utf8'");
?>