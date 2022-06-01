<?php
session_start();
$con=mysqli_connect("localhost","root","","amul");

//$id=$_SESSION['p_id'];

$userprofile=$_SESSION['u_username'];
$query="select * from user_reg where u_username='$userprofile'";

$data=mysqli_query($con,$query);
$result=mysqli_fetch_assoc($data);


$query1="select p_id,p_name,p_price,p_upc,p_status,p_image from amul_products";
$data1=mysqli_query($con,$query1);
$result1=mysqli_query($con,$query1);
?>

<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="header">
		<h1>Product Page</h1>
	</div>
	<h1>Home</h1>
	<div><h4>Welcome <?php echo $_SESSION['u_username'];?></h4>
	<form method="POST" enctype="multipart/form">
	<table border="1" cellspacing="0" cellpadding="10">
		<tr>
			<th>Product id</th>
			<th>Product Name</th>
			<th>Product Price</th>
			<th>Product UPC</th>
			<th>Product Status</th>
			<th>Product Image</th>
			<th>Edit</th>
		</tr>
	<?php
		if(mysqli_num_rows($result1)>0)	{
		$pid=1;
		while($data1=mysqli_fetch_array($result1))	{
	?>
	<tr>	
		<td><?php echo $data1['p_id']; ?></td>
		<td><?php echo $data1['p_name']; ?></td>
		<td><?php echo $data1['p_price']; ?></td>
		<td><?php echo $data1['p_upc']; ?></td>
		<td><?php echo $data1['p_status']; ?></td>
		<td><?php echo $data1['p_image']; ?></td>
		<td><a href ="EDIT1.php?p_id=<?php echo $data1['p_id']; ?>">Edit</a></td>				
	</tr>
	<?php
	;}}	else { ?>
		<tr>
			<td colspan="8">No data found</td>
		</tr>
	<?php }  ?>
	</table>
	</form>
	<div class="center">
	<div><a href='add_product.php'>Add Product</div>
	</div>
	<div><a href="logout.php">Logout</a></div>
</body>
</html>