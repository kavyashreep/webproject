<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			* {box-sizing: border-box}
			body {font-family: Verdana, sans-serif; margin:0}
			.mySlides {display: none}
			img {vertical-align: middle;}

			/* Slideshow container */
			.slideshow-container {
			  max-width: 1300px;
			  position: relative;
			  margin: auto;
			}

			/* Next & previous buttons */
			.prev, .next {
			  cursor: pointer;
			  position: absolute;
			  top: 200px;
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
			/* Number text (1/3 etc) 
			.numbertext {
			  color: #f2f2f2;
			  font-size: 12px;
			  padding: 8px 12px;
			  position: absolute;
			  top: 0;
			}*/

			/* The dots/bullets/indicators */
			.dot {
			  cursor: pointer;
			  height: 15px;
			  width: 15px;
			  margin: 0 2px;
			  background-color: white;
			  border-radius: 50%;
			  display: inline-block;
			  transition: background-color 0.6s ease;
			}

			.active, .dot:hover {
			  background-color: white;
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
			
			h1{
				color:blue;
				font-family:verdana;
				font-size:250%;
			}
			.column {
				float: left;
				width: 30%;
				padding: 10px;
				height: 300px;
				position:absolute;
				left:200px;
				top:80px;
			}

			.column1 {
				float: left;
				width: 50%;
				padding: 10px;
				height: 300px;
				text-align:center;
				position:absolute;
				left:500px;
				top:80px;
			}
			.row:after {
				content: "";
				display: table;
				clear: both;
			}
			.checked {
				color: orange;
			}
			.button {
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
			}
			.dir {
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
			}
		</style>
	</head>
	<body>
		<?php
				include 'dbconnect.php';
				$conn = OpenCon();
				$tname=$_POST["search"];
				$sql="SELECT item_id,item_name,item_quant,item_brand,MRP,offer,item_price,DATE_FORMAT(Best_before, '%M %D %Y') as bdate,food_type,ratings,stock,item_image,direction FROM $tname";
				$result = $conn->query($sql);
				$item_count=0;
				$itemCount=0;
				$item_arr = [];
				$dotCount=1;
				if($result)
				{
					if ($result->num_rows > 0) {
						while($row = $result->fetch_array())
						{
							$item_arr[$item_count]=$row['item_id'];
							$itemName_arr[$item_count]=$row['item_name'];
							$quant_arr[$item_count]=$row['item_quant'];
							$brand_arr[$item_count]=$row['item_brand'];
							$dir_arr[$item_count]=$row['direction'];
							$item_count=$item_count+1;
						}
					}
				}
				$result = $conn->query($sql);
				if($result){
					if ($result->num_rows > 0) {
						echo "<h1 align='center'><i>Available ".ucfirst($tname)." Products</i></h1>";
						echo "<div class='slideshow-container'>";
						while($row = $result->fetch_array())
						{
							echo "<div class='mySlides fade'>";
					//		echo "<div class='numbertext'>1/". ($itemCount+1)."</div>";
							echo "<div class='row'>";
							echo "<div class='column'>";
							echo "<table>";
							echo " <tr><td style='color:blue;font-size:20px;'>" . $row['item_brand']." ".$row['item_name'] . "," . $row['item_quant'] . "</td></tr>";
							echo "<tr><td>by"." ". $row['item_brand'] . "</td></tr>";
							echo "<tr><td>M.R.P:"." "."<del><i class='fa fa-inr'></i>". $row['MRP'] . "</del></td></tr>";
							echo "<tr rowspan='2'><td>Price:"." "."<i class='fa fa-inr'></i>".$row['item_price'] ."</td></tr>";
							echo "<tr><td>You save:<i class='fa fa-inr'></i>".($row['MRP']-$row['item_price'])."(".$row['offer']."%)</td></tr>";
							echo "<tr><td>Inclusive of all taxes</td></tr>";
							echo "<tr><td>Best Before:".$row['bdate']."</td></tr>";
							$rateCount=0;
							echo "<tr><td>";
							while($rateCount!=($row['ratings'])){
								echo"<span class='fa fa-star checked'></span>";
								$rateCount=$rateCount+1;
							}
							if($rateCount<5)
							{
								while($rateCount!=5)
								{
									echo "<span class='fa fa-star'></span>";
									$rateCount=$rateCount+1;
								}
							}
							echo "</td></tr>";
							echo "<tr><td> " . $row['stock'] . "</td></tr>";
							echo "<tr><td style='color:green'>".$row['food_type']."</td></tr>";
							echo "</table>";
							echo "</div>";
							echo "<div class='column1'>";
							$path=$row['item_image'];
							echo "<img src='$path' height='300' width='300'>";
							echo "<table style='float:right;position:absolute;top:130px;left:600px'>";
							echo "<tr><td><button class='button' id='$itemCount' onclick='testFunc(this.id)'>BOOK</button></td></tr>";
							echo "<tr><td><button class='dir' id='$itemCount' onclick='testDir(this.id)'>DIRECTION</button></td></tr>";
							echo "</table>";
							echo "</div>";
							echo "</div>";
							echo "<a class='prev' onclick='plusSlides(-1)'>&#10094;</a>";
							echo "<a class='next' onclick='plusSlides(1)'>&#10095;</a>";
							echo "</div>";	
							echo "<script language='javascript'>
							
								function testFunc(a)
								{
									var pro_id = ".(json_encode($item_arr)).";
									var pro_name = ".(json_encode($itemName_arr)).";
									var pro_quant = ".(json_encode($quant_arr)).";
									var pro_brand= ".(json_encode($brand_arr)).";
									console.log(pro_id[a]);
									window.location.href='book_ui.php?item_id='+pro_id[a]+'&pro_type=$tname&item_name='+pro_name[a]+'&brand='+pro_brand[a]+'&quantity='+pro_quant[a];
								}
								
								function testDir(a)
								{
									var pro_dir = ".(json_encode($dir_arr)).";
									console.log(pro_dir[a]);
									window.location.href='Itemdirection.php?dir='+pro_dir[a];
								}";
							echo '</script>';
							$itemCount = $itemCount +1;
					}
					echo "<div style='text-align:center'>";
					while($dotCount<=$itemCount){
						echo "<span class='dot' onclick='currentSlide(".$dotCount.")'></span>";
						$dotCount=$dotCount+1;
					}
					echo "</div>";
				}else{
					echo "<p align='center' style='color:blue;font-family:verdana;font-size:250%;'><i>OOPS!!! PRODUCT NOT FOUND...</i></p>";
				}
			}else{
					echo "<p align='center' style='color:blue;font-family:verdana;font-size:250%;'><i>OOPS!!! PRODUCT NOT FOUND!!!!!!...</i></p>";
			}
			  CloseCon($conn)
		?>
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
			  var slides = document.getElementsByClassName('mySlides');
			  var dots = document.getElementsByClassName('dot');
			  if (n > slides.length) {slideIndex = 1}    
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
				  slides[i].style.display = 'none';  
			  }
			  for (i = 0; i < dots.length; i++) {
				  dots[i].className = dots[i].className.replace('active', "");
			  }
			  slides[slideIndex-1].style.display = 'block';  
			  dots[slideIndex-1].className += 'active';
			}
		</script>	
	</body>
</html> 
