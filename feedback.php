<html>
	<head>
		<style>

			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 100%;
			}

			td, th {
				border: 1px solid black;
				text-align: left;
				padding: 8px;
			}

			tr:nth-child(even) {
				background-color: #dddddd;
			}
			h1{
				color:green;
				font-family:verdana;
				font-size:40px;
			}
			.bg {
/*					background-image: url("ProjectImages/feedb.jpg");*/

					height: 100%; 

					/* Center and scale the image nicely */
					background-position: center;
					background-repeat: no-repeat;
					background-size: cover;
			}

		</style>

	</head>
	<body>
	<div class="bg">
	<?php
		include 'dbconnect.php';
		$conn = OpenCon();
		$sql="SELECT cust_name,cust_email,sub,msg FROM contact_us";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo"<h1 align='center'><i>Hey!Here is a feedback from customers</i></h1>";
			echo "<table><tr><th>Customer Name</th><th>Email ID</th><th>Subject</th><th>Message</th></tr>";
			while($row = $result->fetch_array())
			{
				echo "<tr><td>".$row['cust_name']."</td>";
				echo "<td><a href='mailto:".$row['cust_email']."?Subject=Hello' target='_top'>".$row['cust_email']."</td>";
				echo "<td>".$row['sub']."</td>";
				echo "<td>".$row['msg']."</td>";
				echo "</tr>";
			}
			echo"</table>";
		}
		CloseCon($conn)
	?>
	<div>
	</body>
</html>