<html>
	<head>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
				color:gray;
				font-family:verdana;
				font-size:250%;
			}
			input[type=submit]
			{
					color:white;
					background-color:green;
					font-size:20px;
			}

		</style>

	</head>
	<body bgcolor="white">
	<?php
		include 'dbconnect.php';
		$conn = OpenCon();
		$tname=$_POST["tname"];
		$sql="SELECT item_id,item_name,item_quant,item_brand,MRP,offer,item_price,ratings,stock FROM $tname";
		$result = $conn->query($sql);
		if($result){
			if ($result->num_rows > 0) {
				echo "<h1 align='center'><i>Available ".ucfirst($tname)." Products</i></h1>";
				echo"<form action='update1.php' method='POST'>";
				echo "<table><tr><th>SELECT</th><th>ID</th><th>NAME</th><th>QUANTITY</th><th>BRAND</th><th>MRP</th><th>OFFER</th><th>PRICE</th><th>RATINGS</th><th>STOCK</th></tr>";
				while($row = $result->fetch_array())
				{
					echo "<tr><td> <input type='radio' name='item_id' value=".$row['item_id']." id='item_id'</td>";
					echo "<input type='hidden' id='tname' name='tname' value=".$tname.">";
					echo "<td>".$row['item_id']."</td>";
					echo "<td>".$row['item_name']."</td>";
					echo "<td>".$row['item_quant']."</td>";
					echo "<td>".$row['item_brand']."</td>";
					echo "<td><i class='fa fa-inr'></i>".$row['MRP']."</td>";
					echo "<td></i>".$row['offer']."%</td>";
					echo "<td><i class='fa fa-inr'></i>".$row['item_price']."</td>";
					echo "<td>".$row['ratings']."</td>";
					echo "<td>".$row['stock']."</td></tr>";
				}
					echo"</table><br><br>";
					echo "<input type='submit' value='UPDATE'>";
					echo"</form>";
			}else{
				echo "<p align='center' style='color:blue;font-family:verdana;font-size:250%;'><i>OOPS!!! PRODUCT NOT FOUND...</i></p>";
			}
		}else{
				echo "<p align='center' style='color:blue;font-family:verdana;font-size:250%;'><i>OOPS!!! PRODUCT NOT FOUND!!!!!!...</i></p>";
		}
		  CloseCon($conn)
	?>
	</body>
</html>