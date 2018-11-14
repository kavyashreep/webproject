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
		
	$sql = "UPDATE $table_name SET item_name='$item_name',item_quant='$item_quant',item_brand='$item_brand',MRP='$MRP',offer='$offer',item_price='$item_price',Best_before='$Best_before',food_type='$food_type',ratings='$ratings',stock='$stock',direction='$direction',item_image='$item_image' WHERE item_id='$item_id'";

	if ($conn->query($sql) === TRUE) {
		echo '<script language="javascript">';
		echo 'alert("Product Updated Successfully!!!")';
		echo '</script>';	
		include 'update_product.html';	
	} else {
		echo '<script language="javascript">';
		echo 'alert("Unexpected Error occured..Please try other some time")';
		echo '</script>';
		include 'update_product.html';
	}

	CloseCon($conn);

?>