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
	</div><div id='goBtn' >
        <form action="index.php" method="">
	        <input type="submit" value="Go Back" class="goBtn">
        </form>		
    </div>	
	<div id='createAccountPrompt' >
			<form id='createAccountForm' style="margin:0px 620px" method='post' action='createAccount.php'>
				<h3 style="color:#fff">Create A New Account</h3>
				<input id='newUserUserName' class="inputItem" type=text name='newUserName' placeholder="Pick a Username" required><br>
				<input id='newUserName' class="inputItem" type=text name='newName' placeholder="Name" required><br>
				<input id='newUserEmail' class="inputItem" type=text name='newEmail' placeholder="Email-ID" required><br>
				<input id='newUserPassword' class="inputItem" type=password name='newPass' placeholder="New Password" required>
				<br><input id="newUserConfirmPassword" class="inputItem" type=password name='newConfirmPass' placeholder="Confirm Password" required><br><input type="submit" value="Create" class="btn">
			</form>	
		</div>
</body>
</html>