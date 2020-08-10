<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel='stylesheet' href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Login</title>
</head> 
<body style="background-image:url(image/bl.jpg);background-size:cover" class="loginBody">
	<div class="topStyle">
		<h1>Wholesale DataBase Management</h1>
	</div>
	<div class="mybox" style="display:inline-block">
		<div id="userPrompt" style="display:block">
			<form method='post' action='login.php'>
				<h2>Login</h2>
				<input class="inputItem" type=text name='user' placeholder="Username" required><br><input class="inputItem" type=password name='pass' placeholder="Password" required><br><input type="submit" value="LOGIN" name="login" class="btn">
			</form>		
		</div>
		<button id='createAccount' name="createAcc" class='btn'><a href="createAccountPage.php" style="text-decoration:none;color:white"> Create New Account</a></button>	
	    </div>
</body>
</html>

