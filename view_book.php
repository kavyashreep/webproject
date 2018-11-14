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
				font-size:250%;
			}
			.bg {
					/* The image used */
				/*	background-image: url("ProjectImages/feedb.jpg");*/

					/* Full height */	
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
		$sql="SELECT item_id,pro_type,quantity,date,cust_name,contact FROM Bookings";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo"<h1 align='center'><i>Just go through your bookings</i></h1>";
			echo "<table><tr><th>ID</th><th>Type</th><th>Quantity</th><th>Date</th><th>Customer Name</th><th>Contact Number</th></tr>";
			while($row = $result->fetch_array())
			{
				echo "<tr><td>".$row['item_id']."</td>";
				echo "<td>".$row['pro_type']."</td>";
				echo "<td>".$row['quantity']."</td>";
				echo "<td>".$row['date']."</td>";
				echo "<td>".$row['cust_name']."</td>";
				echo "<td>".$row['contact']."</td>";
				echo "</tr>";
			}
			echo"</table>";
		}
		CloseCon($conn)
	?>
	<div>
	</body>
</html>