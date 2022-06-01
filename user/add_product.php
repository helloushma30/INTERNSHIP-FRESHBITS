<?php
session_start();
$db=mysqli_connect("localhost","root","","amul");

if(isset($_POST['submit']))
{
	$id=$_POST['p_id'];
	$name=$_POST['p_name'];
	$price=$_POST['p_price'];
	$upc=$_POST['p_upc'];
	$status=$_POST['p_status'];
	$file_name=$_FILES['p_image']['p_name'];
	$file_tmp=$_FILES['p_image']['tmp_name'];
	$folder="photo/".$file_name;
	move_uploaded_file($file_tmp,"/photo".$file_name);

	$sql="insert into amul_products(p_id,p_name,p_price,p_upc,p_status,p_image)
	values('$id','$name','$price','$upc','$status','$folder')";
	mysqli_query($db,$sql);
	header("location:welcome.php");	
}
?>

<!doctype html>
<html>
<head>
	<title>Add Products</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<div class="header">
		<h1>Add Products</h1>
	</div>
	<form method="post" enctype="multipart/form_data">
	<table>
		<tr>
			<td>Product Name:</td>
			<td><input type="text" name="p_name" class="textInput"required></td>
		</tr>
		<tr>
			<td>Product Price in INR:</td>
			<td><input type="text" name="p_price" class="textInput"required></td>
		</tr>
		<tr>
			<td>Product Universal Product Code(UPC):</td>
			<td><input type="text" name="p_upc" class="textInput"required></td>
		</tr>
		<tr>
			<td>Product status:</td>
			<td><select name="p_status" id="status">
				  <option value="Stock">Stock</option>
				  <option value="Out of stock">Out of Stock</option>		
			</td>

		</tr>
		<tr>
			<td>Product Image:</td>
			<td><input type="file" name="p_image" class="textInput"required></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="Add"></td>
		</tr>
	
</body>
</html>