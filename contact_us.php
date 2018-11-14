<?php
	include 'dbconnect.php';

	$conn = OpenCon();

	$cust_name=$_POST["name"];
	$cust_email=$_POST["mail"];
	$sub=$_POST["sub"];
	$msg=$_POST["msg"];
	
	$sql = 	"INSERT INTO Contact_Us (cust_name,cust_email,sub,msg)VALUES".
			"('$cust_name','$cust_email','$sub','$msg')";

	if ($conn->query($sql) === TRUE) {		
		echo '<script language="javascript">';
		echo 'alert("Your Response has been recorded...")';
		echo '</script>';
		echo "<script> location.href='login.html'; </script>";
		} 
		else {
		echo '<script language="javascript">';
		echo 'alert("Sorry!!!Some Problem has occured")';
		echo '</script>';
		echo "<script> location.href='contact_us.html'; </script>";
	}

	CloseCon($conn);

?>