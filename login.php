<?php
	include 'dbconnect.php';
	$user=$_POST["uname"];
	$pass=$_POST["psw"];
	$conn = OpenCon();
	session_start();
	$sql = "SELECT username,password FROM Login where username='$user' and password='$pass'";
	$val=$conn->query($sql);
	if($val->num_rows==1)
	{
		$row = $val->fetch_assoc();
		$_SESSION["uname"] = $row['username'];
		echo "<script> location.href='Product_Operation.html'; </script>";
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Invalid User...\nPlease Enter valid username and password")';
		echo '</script>';
		echo "<script> location.href='login.html'; </script>";
	}
?>
