<?php
	include 'dbconnect.php';

	$conn = OpenCon();
	
	$item_id=$_POST["item_id"];
	$pro_type=$_POST["pro_type"];
	$quantity=$_POST["quantity"];
	$date=$_POST["date"];
	$cust_name=$_POST["name"];
	$contact=$_POST["contact"];
		
	$sql = 	"INSERT INTO Bookings (item_id,pro_type,quantity,date,cust_name,contact)VALUES".
			"('$item_id','$pro_type','$quantity','$date','$cust_name','$contact')";

	if ($conn->query($sql) === TRUE) {
		echo '<script language="javascript">';
		echo 'alert("Your Booking Registered successfully!!")';
		echo '</script>';	
		include 'book_ui.php';
	} else {
		echo '<script language="javascript">';
		echo 'alert("Sorry!!Try some other time")';
		echo '</script>';
		include 'login.html';
	}

	CloseCon($conn);

?>