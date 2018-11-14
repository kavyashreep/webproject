<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			* {box-sizing: border-box}
			body {font-family: Verdana, sans-serif; margin:0}
			.mySlides {display: none}
			img {vertical-align: middle;}

			/* Slideshow container */
			.slideshow-container {
			  max-width: 1000px;
			  position: relative;
			  top:90px;
			  margin: auto;
			  border: 2px solid green;
			}

			/* Next & previous buttons */
			.prev, .next {
			  cursor: pointer;
			  position: absolute;
			  top: 50%;
			  width: auto;
			  padding: 16px;
			  margin-top: -22px;
			  color: black;
			  font-weight: bold;
			  font-size: 18px;
			  transition: 0.6s ease;
			  border-radius: 0 3px 3px 0;
			}

			/* Position the "next button" to the right */
			.next {
			  right: 0;
			  border-radius: 3px 0 0 3px;
			}

			/* On hover, add a black background color with a little bit see-through */
			.prev:hover, .next:hover {
			  background-color: rgba(0,0,0,0.8);
			}

			/* Caption text */
			.text {
			  color: black;
			  font-size: 15px;
			  padding: 8px 12px;
			  position: absolute;
			  bottom: 8px;
			  width: 100%;
			  text-align: center;
			}

			/* Number text (1/3 etc) */
			.numbertext {
			  color: black;
			  font-size: 12px;
			  padding: 8px 12px;
			  position: absolute;
			  top: 0;
			}

			/* The dots/bullets/indicators */
			.dot {
			  cursor: pointer;
			  height: 15px;
			  width: 15px;
			  margin: 0 2px;
			  position: relative;
			  top: 90px;
			  background-color: black;
			  border-radius: 50%;
			  display: inline-block;
			  transition: background-color 0.6s ease;
			}

			.active, .dot:hover {
			  background-color: green;
			}

			/* Fading animation */
			.fade {
			  -webkit-animation-name: fade;
			  -webkit-animation-duration: 1.5s;
			  animation-name: fade;
			  animation-duration: 1.5s;
			}

			@-webkit-keyframes fade {
			  from {opacity: .4} 
			  to {opacity: 1}
			}

			@keyframes fade {
			  from {opacity: .4} 
			  to {opacity: 1}
			}

			/* On smaller screens, decrease text size */
			@media only screen and (max-width: 300px) {
			  .prev, .next,.text {font-size: 11px}
			}
			.topnav {
			overflow: hidden;
			background-color: green;
			}
			p.head{
				text-align:center;
				color:white;
				font-size:18px;
			}
			p.product{
				color:Red;
				font-size:25px;
			}
			input[type=submit]
			{
				color:white;
				background-color:green;
				font-size:16pt;
				align:right;
			}
			input[type=text]
			{
				width:500px;
				height:30px;
				font-size:20px;
			}
			table.tab{
				    border-spacing: 15px 30px;
				}
			table.price{
				    border-spacing: 15px 20px;
				}
				textarea{
					width:500px;
					font-size:20px;
				}
			</style>
	</head>
	<body>
		<div class="topnav">
			<p class="head"><b>UPDATE PRODUCT DETAILS</b></p>
		</div>
		<div class="slideshow-container">
			<form action="update_product.php" method="POST">
				<div class="mySlides fade">
					<div class="numbertext">1 / 3</div><br>
					<p class="product"><b>Product Details</b></p>
					<p align="center">
					<?php
						include 'dbconnect.php';
						$conn = OpenCon();
						$tname=$_POST["tname"];
						$item_id=$_POST["item_id"];
						$sql="SELECT item_name,item_quant,item_brand,MRP,offer,item_price,Best_before,food_type,ratings,stock,item_image,direction FROM $tname where item_id='$item_id'";
						$result = $conn->query($sql);
						if($row = $result->fetch_array()){
						echo"<table align='center' class='tab'>";
						echo"<tr><td>Product type</td><td><input type='text' name='tname' value=".$tname."></td></tr>";
						echo"<tr><td>Product ID</td><td><input type='text' name='id' value=".$item_id."></td></tr>";
						echo"<tr><td>Product Name</td><td><input type='text' name='name' value='".$row['item_name']."'></td></tr>"; 
						echo"<tr><td>Direction</td><td><textarea name='dir' >".$row['direction']."</textarea></td></tr>"; 
						echo"</table>
					</p>	
				</div>

				<div class='mySlides fade'>
					<div class='numbertext'>2 / 3</div><br>
					<p class='product'><b>Quantity Details</b></p>
					<p align='center'> 
						<table align='center' class='tab'>";
						echo"<tr><td>Product Quantity</td><td><input type='text' name='quant' value=".$row['item_quant']."></td></tr>"; 
						echo"<tr><td>Product Barnd</td><td><input type='text' name='brand' value='".$row['item_brand']."'></td></tr>"; 
						echo"<tr><td>Best Before</td><td><input type='text' name='best' value='".$row['Best_before']."'></td></tr>"; 
						echo"<tr><td>Product Stock</td><td><input type='text' name='stock' value='".$row['stock']."'></td></tr>"; 
						echo"<tr><td>Food Type</td><td><input type='text' name='food' value='".$row['food_type']."'></td></tr>"; 
					echo"</table>
					</p>
				</div>

				<div class='mySlides fade'>
					<div class='numbertext'>3 / 3</div><br>
					<p class='product'><b>Price Details</b></p>
					<p align='center'>
						<table align='center' class='price'>";
						echo"<tr><td>Product Image</td><td><input type='file'  name='img' size='50' required></td></tr>";
						echo"<tr><td>MRP</td><td><input type='text' name='mrp' style='width:100px;text-align:right' value=".$row['MRP'].">Rs</td></tr>";
						echo"<tr><td>Offer</td><td><input type='text' name='off'style='width:100px;text-align:right' value=".$row['offer'].">%</td></tr>";
						echo"<tr><td>Price</td><td><input type='text' name='price'style='width:100px;text-align:right' value=".$row['item_price'].">Rs</td></tr>";
						echo"<tr><td>Ratings</td><td><input type='text' name='ratings'style='width:100px;text-align:right' value=".$row['ratings'].">/5</td></tr>";
						}
						?>
						</table>
					</p> 
					<p align="right"><input type="submit" value="SAVE"></p>
				</div>
		
				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>
			</form>
		</div><br>

		<div style="text-align:center">
		  <span class="dot" onclick="currentSlide(1)"></span> 
		  <span class="dot" onclick="currentSlide(2)"></span> 
		  <span class="dot" onclick="currentSlide(3)"></span> 
		</div>

		<script>
			var slideIndex = 1;
			showSlides(slideIndex);

			function plusSlides(n) {
			  showSlides(slideIndex += n);
			}

			function currentSlide(n) {
			  showSlides(slideIndex = n);
			}

			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("dot");
			  if (n > slides.length) {slideIndex = 1}    
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
				  slides[i].style.display = "none";  
			  }
			  for (i = 0; i < dots.length; i++) {
				  dots[i].className = dots[i].className.replace(" active", "");
			  }
			  slides[slideIndex-1].style.display = "block";  
			  dots[slideIndex-1].className += " active";
			}
		</script>

	</body>
</html> 
