<<<<<<< HEAD
﻿<?php include('server.php') ?>
=======
<?php include('server.php') ?>
>>>>>>> add_movie_panel
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
<<<<<<< HEAD
					<form method="post" action="register.php" class="logform">
						<?php include('errors.php'); ?>
						<label>Username</label>
						<input type="text" name="username" value="username" onfocus="if(this.value=='username')this.value='';" onblur="if(this.value=='')this.value='username';"><br><br>
						<label>Email</label>
						<input type="email" name="email" value="email" onfocus="if(this.value=='email')this.value='';" onblur="if(this.value=='')this.value='email';"><br><br>
						<label>Password</label>
						<input type="password" name="password_1" value="password_1" onfocus="if(this.value=='password_1')this.value='';" onblur="if(this.value=='')this.value='password_1';"><br><br>>
						<label>Confirm password</label>
						<input type="password" name="password_2" value="password_2" onfocus="if(this.value=='password_2')this.value='';" onblur="if(this.value=='')this.value='password_2';"><br><br>>>
						<button type="submit" class="btn" name="reg_user">Register</button>
			</div>
			<p> Already a member? <a href="login.php">Sign in</a>
			</p>
			</form>
		</div>
=======
				<form method="post" action="register.php" class="logform">
					<?php include('errors.php'); ?>
					<label>Username</label>
					<input type="text" name="username" value="username" onfocus="if(this.value=='username')this.value='';" onblur="if(this.value=='')this.value='username';"><br><br>
					<label>Email</label>
					<input type="email" name="email" value="email" onfocus="if(this.value=='email')this.value='';" onblur="if(this.value=='')this.value='email';"><br><br>
					<label>Password</label>
					<input type="password" name="password_1" value="password_1" onfocus="if(this.value=='password_1')this.value='';" onblur="if(this.value=='')this.value='password_1';"><br><br>
					<label>Confirm password</label>
					<input type="password" name="password_2" value="password_2" onfocus="if(this.value=='password_2')this.value='';" onblur="if(this.value=='')this.value='password_2';"><br><br>
					<button type="submit" class="btn" name="reg_user">Register</button>
					<p> Already a member? <a href="login.php">Sign in</a></p>
				</form>
				
			</div>
			
			
		</div>
		<div class="footer">
            Powered By SEKCJA1
        </div>
>>>>>>> add_movie_panel
	</div>

</body>

</html>