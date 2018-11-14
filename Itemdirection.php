<!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		h2{
			font-size:40px;
			color:red;
			text-align:center;
		}
		p{
			font-size:80px;
			color:blue;
			text-align:center;
		}
		button{
			background-color: #4CAF50;
			border: none;
			color: white;
			float:right;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
			position:absolute;
			top:40px;
			left:1130px;
		}
	</style>
	<body>
		<h2>Hey!!!Here you get Required Product</h2>
		<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
		<?php
			$direction=$_GET["dir"];
			echo "<p id='demo'>".$direction."</p>";
			echo "<button class='button'  id='$direction' onclick='myFunction(this.id)'> GET DIRECTION</button>";
		?>
		
		<script>
			function myFunction(a)
			{
				responsiveVoice.speak(a);
			}
		</script>
	</body>
</html>
