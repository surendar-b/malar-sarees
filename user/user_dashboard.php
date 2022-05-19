<!doctype html>
<html>
<body>
<?php
	$user_active="active";
	include_once("includes/navbar.php");
	include_once("includes/header.php");
	include_once("connection.php")
?>
 <h1 style="text-align:center; color:blue;">Welcome To Malar Sarees</h1>
<h2 style="text-align:center; color:blue;">Choose Your Products</h2>
<?php 
$sql="select * from product order by product_id";
$query=mysql_query($sql);
while($r=mysql_fetch_array($query)){
	$id = $r['product_id'];
    $name = $r['product_name'];
    $code = $r['product_code'];
    $price = $r['price'];
    $type = $r['material'];
    $img_path = $r['img_path'];
    $desc = $r['description'];								
	// echo "<tr>";
	// echo "<td><img src='$img_path' style='width:200px; height:100px;'></td>";
	// echo "<td>name:$name
	// code:$code
	// price:$price
	// meterial:$type
	// description:$desc
	// $id</td>";
	// echo "<td><a href='order.php?prod_id=$id'>
	// <button class='btn btn-primary'>Order</button></a></td> ";
	echo "<div class='col-sm-4' style='border: 1px solid #ccc;'>
					<input type='hidden' name='prod_id'value='$id'>
					<h4 class='text-center'>$name</h4><br>
					  <img src='$img_path' alt='Image' width='250' height='250'>
					  <p><b>Price : $price</b></p>					  
					  <p>$desc</p>
					  <p>
					  <a href='order.php?prod_id=$id'>
					  <b>Order Now</b>
				  </a>
				  </p>
					</div>			
				";
}
?>
