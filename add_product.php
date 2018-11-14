<?php
	include 'dbconnect.php';

	$conn = OpenCon();

	$table_name=$_POST["tname"];
	$item_id=$_POST["id"];
	$item_name=$_POST["name"];
	$item_quant=$_POST["quant"];
	$item_brand=$_POST["brand"];
	$MRP=$_POST["mrp"];
	$offer=$_POST["off"];
	$item_price=$_POST["price"];
	$Best_before=$_POST["best"];
	$food_type=$_POST["food"];
	$ratings=$_POST["ratings"];
	$stock=$_POST["stock"];
	$direction=$_POST["dir"];
	$item_img=$_POST["img"];
	$item_image='ProjectImages/'.$item_img;
	
	$sql = 	"INSERT INTO $table_name (item_id,item_name,item_quant,item_brand,MRP,offer,item_price,Best_before,food_type,ratings,stock,direction,item_image)VALUES".
			"('$item_id','$item_name','$item_quant','$item_brand','$MRP','$offer','$item_price','$Best_before','$food_type','$ratings','$stock','$direction','$item_image')";

	if ($conn->query($sql) === TRUE) {
		echo '<script language="javascript">';
		echo 'alert("New Product Inserted Successfully!!!")';
		echo '</script>';	
		include 'add_product.html';
	} else {
		echo '<script language="javascript">';
		echo 'alert("Product already exists!!")';
		echo '</script>';
		include 'add_product.html';
	
	}

	CloseCon($conn);

?>