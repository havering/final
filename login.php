<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<meta http-equiv="X-UA-Compatible" content="IE=8"></meta> 
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
  			background: url(hills.png) no-repeat, linear-gradient(to right, #FFB547, black); /* Standard syntax */
  		}

  		#login {
  			text-align: center;
  			margin-top: 5%;
  		}
	</style>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript">
		// check that values exist in the form before submitting
		function formCheck() {
			 var user = document.getElementById("username").value;
 			 var password = document.getElementById("password").value;
 
 		  	if(user == ""){
    			document.getElementById("output").innerHTML = "Please Enter a Username";
    			document.getElementById("loginform").reset();
   			return;
  			}
 
  			if(password == ""){
    			document.getElementById("output").innerHTML ="Please Enter a Password";
    			document.getElementById("loginform").reset();
    			return;
  			}
		}


		$(document).ready(function(){
			$(("#password")).keyup(function() {
				var ajname = $('#username').val();
				var ajpass = $('#password').val();

				if(ajname=="" || ajpass=="") {
					$("#display").html("");
				}
				else {
					$.ajax({
					type: "POST",
					url: "validate2.php",
					data: { username: ajname, 
							password: ajpass
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
	</div>
	<div id="output"></div>
	<div id="login">
	<form action="index.php?action=login" method="POST" id="loginform">
		<p>Enter username: <input type="text" name="username" id="username">
		<p>Enter password: <input type="password" name="password" id="password">
		<div id="display"><!-- <p><input type="submit" value="Submit" onclick="formCheck()"> --></div><br>
	</form>
</div>
</body>
</html>