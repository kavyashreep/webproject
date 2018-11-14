<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
				body {
					font-family: Arial, Helvetica, sans-serif;
				}

				* {
					box-sizing: border-box;
				}

				input[type=text], select, textarea {
					width: 300px;
					padding: 12px;
					border: 1px solid #ccc;
					border-radius: 4px;
					box-sizing: border-box;
					margin-top: 6px;
					margin-bottom: 16px;
					resize: vertical;
				}

				input[type=submit] {
					background-color: #4CAF50;
					color: white;
					padding: 12px 20px;
					border: none;
					border-radius: 4px;
					cursor: pointer;
				}

				input[type=submit]:hover {
					background-color: #45a049;
				}

			h1{
					text-align:center;
					font-family:Comic Sans MS;
					font-size:20pt;
				}
				
			input[type=button]{
				background-color: #4CAF50;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				cursor: pointer;
				width: 10%;
			}
				
			/* Set a style for all buttons */
			button {
				background-color: #4CAF50;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				cursor: pointer;
				width: 50%;
			}

			button:hover {
				opacity: 0.8;
			}

			/* Extra styles for the cancel button */
			.cancelbtn {
				width: auto;
				padding: 10px 18px;
				background-color: #f44336;
			}

			/* Center the image and position the close button */
			.imgcontainer {
				text-align: center;
				margin: 24px 0 12px 0;
				position: relative;
			}


			.container {
				padding: 16px;
			}



			/* The Modal (background) */
			.modal {
				display: none; /* Hidden by default */
				position: fixed; /* Stay in place */
				z-index: 1; /* Sit on top */
				left: 0;
				top: 0;
				width: 100%; /* Full width */
				height: 100%; /* Full height */
				overflow: auto; /* Enable scroll if needed */
				background-color: rgb(0, 0, 0); /* Fallback color */
				background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
				padding-top: 60px;
			}

			/* Modal Content/Box */
			.modal-content {
				background-color: #fefefe;
				margin: 3% auto 10% auto;
				/* 5% from the top, 15% from the bottom and centered */
				border: 1px solid #888;
				width: 50%; /* Could be more or less, depending on screen size */
			}

			/* The Close Button (x) */
			.close {
				position: absolute;
				right: 25px;
				top: 0;
				color: #000;
				font-size: 35px;
				font-weight: bold;
			}

			.close:hover, .close:focus {
				color: red;
				cursor: pointer;
			}

			/* Add Zoom Animation */
			.animate {
				-webkit-animation: animatezoom 0.6s;
				animation: animatezoom 0.6s
			}

			@
			-webkit-keyframes animatezoom {
				from {-webkit-transform: scale(0)
			}

			to {
				-webkit-transform: scale(1)
			}

			}
			@
			keyframes animatezoom {
				from {transform: scale(0)
			}

			to {
				transform: scale(1)
			}

			}

			/* Change styles for span and cancel button on extra small screens */
			@media screen and (max-width: 300px) {
				.cancelbtn {
					width: 100%;
				}
			}
			ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color: #333;
			}

			li {
				float: left;
			}

			li a {
				display: block;
				color: white;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
			}

			li a:hover:not(.active) {
				background-color: #111;
			}

			.active {
				background-color: #4CAF50;
			}


		</style>
	</head>
	<body> 
	<ul>
		<li style="float:right"><a href="#contact">HELP</a></li>
		<li style="float:right"><a class="active" href="login.html">HOME</a></li>
	</ul>
		<h1>Book Item</h1>
					<form action="book.php" method="POST">		
					<?php
							$item_id=$_GET["item_id"];
							$item_type=$_GET["pro_type"];
							$item_name=$_GET["item_name"];
							$item_brand=$_GET["brand"];
							$item_quant=$_GET["quantity"];
							echo "<input type='hidden' id='pro_type' name='pro_type' value='".$item_type."'>";
							echo "<input type='hidden' id='item_id' name='item_id' value='".$item_id."'>";
							echo "<table>
									<tr>
										<td><label>Product</label></td> 
										<td><input type='text' value='".$item_name."' disabled></td>
								</tr>
								<tr>
									<td><label>Brand</label></td> 
									<td><input type='text' value='".$item_brand."' disabled></td>
								</tr>
								<tr>
									<td><label>Quantity(in kg)</label></td> 
									<td><input type='text' value='".$item_quant."' disabled></td>
								</tr>";
							?>
							<tr>
								<td><label for="quantity">Number of bags</label></td> 
								<td><input type="text" id="quantity" name="quantity" required></td>
							</tr>
							<tr>
								<td><label for="date">Required Date</label></td> 
								<td><input type="text" id="date" name="date" placeholder="YYYY-MM-DD"></td> 
							</tr>
							<tr>
								<td><label for="name">Your Name</label></td> 
								<td><input type="text" id="name" name="name" placeholder="Your name.." required></td>
							</tr>
							<tr>						
								<td><label for="contact">Your Contact Number</label></td> 
								<td><input type="text" id="contact" name="contact" placeholder="Your Contact Number" required></td>
							</tr>
						</table>
						<input type="button" value="BOOK" onclick="document.getElementById('id01').style.display='block'">
						<div id="id01" class="modal">

							<div class="modal-content animate">
								<div class="imgcontainer">
									<span
										onclick="document.getElementById('id01').style.display='none'"
										class="close" title="Close Modal">&times;</span> 
								</div>

								<div class="container" align="center">
									<p>Payment mode:Cash On Delivery</p><p>Thank you!!!!</p>
									<button type="submit">Confirm</button>
								</div>

								<div class="container" style="background-color: #f1f1f1">
									<button type="button"
										onclick="document.getElementById('id01').style.display='none'"
										class="cancelbtn">Cancel</button>
								</div>
							</div>
						</div>
					</form>
			<script>
			// Get the modal
			var modal = document.getElementById('id01');

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
			
		</script>

</body>
</html>
