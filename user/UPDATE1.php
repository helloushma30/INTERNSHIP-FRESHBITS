<?php
$con=mysqli_connect("localhost","root","","amul");

$id=$_GET['p_id'];
$pname=$_POST['p_name'];

mysqli_query($con,"update amul_products set p_name='$pname' where p_id='$id'");
header('location:welcome.php');
?>