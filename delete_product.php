<?php
	include 'dbconnect.php';

	$conn = OpenCon();

	$table_name=$_POST["tname"];
	
	$item_id=$_POST["item_id"];
	
	$sql = "DELETE FROM $table_name WHERE item_id='$item_id'";
	if ($conn->query($sql) === TRUE) {
		echo '<script language="javascript">';
		echo 'alert("Product deleted successfully!!!")';
		echo '</script>';
		include 'delete_product.html';	
	} else {
		echo '<script language="javascript">';
		echo 'alert("Product does not exist!!")';
		echo '</script>';
		include 'delete_product.html';
		
	}

	CloseCon($conn);

?>