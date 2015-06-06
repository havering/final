<?php
	session_start();
	include('imp.php');
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gold Hills Soapery</title>
	<style>
		body {
			font-family: sans-serif;
			margin-left: 0px;
			margin-top: 0px;
			margin-right: 0px;
		}

		a {
			text-decoration: none;
			color: black;
		}

		a:hover {
			text-decoration: underline;
			color: black;
		}
		a:visited {
			text-decoration: underline;
			color: black;
		}

		#navbar {
			width: 100%;
			height: 80px;
			background-color: #d3d3d3;
			background-image: url(hills.png);
			background-repeat: no-repeat;
			margin-top: 0px;
			margin-left: none;
			padding: none;
			font-size: 14pt;
			text-align: center;
			line-height: 80px;
			background: url(hills.png) no-repeat, -webkit-linear-gradient(left, #FFB547 , black); /* For Safari 5.1 to 6.0 */
  			background: url(hills.png) no-repeat,, -o-linear-gradient(right, #FFB547, black); /* For Opera 11.1 to 12.0 */
  			background: url(hills.png) no-repeat,, -moz-linear-gradient(right, #FFB547, black); /* For Firefox 3.6 to 15 */
  			background: url(hills.png) no-repeat, linear-gradient(to right, #FFB547 , black); /* Standard syntax */
  		}

  		img {
			border-radius: 10px;
		}
		
		#left {
			width: 30%;
			float: left;
			margin-left: 20%;
			margin-top: 5%;
		}

		#right {
			width: 30%;
			float: left;
			margin-right: 20%;
			margin-top: 5%;
		}
		#displaybal {
			float: right;
			color: white;
			padding-right: 10px;
			font-size: 12pt;
		}
  			#display {
			color: red;
			display: inline;
			padding-left: 5px;
		}
  		</style>
  		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$(("#num")).keyup(function() {
				var numpicked = $('#num').val();
				var sname = "swirl";

				if(numpicked == "") {
					$("#display").html("");
				}
				else {
					$.ajax({
					type: "POST",
					url: "validate3.php",
					data: { num: numpicked, 
							name: sname
						},
					success: function(html){
					$("#display").empty();
					$("#display").append(html);
					}
				});
			return false;
			}
			});
		});
	</script>
  		</head>
<body>
	<div id="navbar">
		<a href="index.php">Home</a> |
		<a href="soaps.php">Soaps</a> | 
		<a href="cart.php">Cart</a> | 
		<a href="index.php?action=logout">Log Out</a>
		<div id="displaybal"><b>Balance:</b> $<?php echo $_SESSION['balance'] ?></div>
	</div>
<center><h3>Swirl</h3></center>

<div id="left">
<img src="swirl.jpg">
</div>
<div id="right">
<p>A description goes here a description goes here a description goes here a description goes here a description goes here a description goes here a description goes here 
<p><b>Price: $4.99</b>
<p><form action="cart.php?action=swirl" method="POST">
	Quantity: <input type="number" min="0" name="num" id="num"><div id="display"><input type="submit" value="Add to cart"></div>
</form>
<!--form should only appear if the user is logged in - no anonymous comments allowed-->
<?php
	if (isset($_SESSION['username'])) {

		echo '<div id="commentform">
			<p><i>We love feedback! Feel free to leave a comment:</i>
			<form action="comment.php" method="POST">
			<p>Name: ' . $_SESSION['name'];
		echo '<p>Comment:
			<br><textarea rows="8" cols="30" maxlength="255" name="comment" id="comment"></textarea>
			<input type="hidden" name="wherefrom" id="wherefrom" value="swirl">
			<input type="submit" value="Submit">
			</form>
			</div>';
	}


?>
</div>
</body>
</html>