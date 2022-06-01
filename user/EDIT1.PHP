<?php
$con=mysqli_connect("localhost","root","","amul");

$id=$_GET['p_id'];


$query=mysqli_query($con,"select * from amul_products where p_id='$id'");
$row=mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<div class="header">
		<h1>Edit Product</h1>
	</div>
	<?php echo $id; ?>
	<form method="GET" action="UPDATE1.php?id=<?php echo $id; ?>">
		<label>Product Name:</label><input type="text" value="<?php echo $row['p_name']; ?>" name="p_name"><br>
		<label>Product Price:</label><input type="text" value="<?php echo $row['p_price']; ?>" name="p_price"><br>
		<label>Product Universal Product Code(UPC):</label><input type="text" value="<?php echo $row['p_upc']; ?>" name="p_upc"><br>
		<label>Product Status:</label><input type="text" value="<?php echo $row['p_status']; ?>" name="p_status"><br>
		<input type="submit" name="submit">
		<a href="welcome.php">Back</a>
	</form>
</body>
</html>