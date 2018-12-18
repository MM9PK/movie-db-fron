<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Serwis Filmowy</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
	<div class="container">
		<div class="baner">
			<h1>"Serwis Filmowy" - Registration</h1>
		</div>
		<div class="main">
			<div class="login">
				<form method="post" action="register.php" class="logform">
					<?php include('errors.php'); ?>
					<label>Username:</label><br>
					<input id="input" type="text" name="username" placeholder="username"><br><br>
					<label>Email:</label><br>
					<input id="input" type="email" name="email" placeholder="email"><br><br>
					<label>Password:</label><br>
					<input id="input" type="password" name="password_1" placeholder="Password"><br><br>
					<label>Confirm password:</label><br>
					<input id="input" type="password" name="password_2" placeholder="Confirm Password"><br><br>
					<button type="submit" class="btn" name="reg_user">Register</button>
					<p> Already a member? <a href="login.php">Sign in</a></p>
				</form>
				
			</div>
			
			
		</div>
		<div class="footer">
            Powered By SEKCJA1
        </div>
	</div>

</body>

</html>