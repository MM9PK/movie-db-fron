<?php include('server.php') ?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Serwis Filmowy</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <div class="baner">
            <h1>"Serwis Filmowy" - Logowanie</h1>
        </div>
        <div class="main">
            <div class="login">
                <form method="post" action="login.php" class="logform">
                    <?php include('errors.php'); ?>
                    <label>E-mail:</label><br>
                    <input id="input" type="text" name="email" placeholder="email"><br><br>
                    <label>Password:</label><br>
                    <input id="input" type="password" name="password" placeholder="Password"><br><br>
                    <button type="submit" class="btn" name="login_user">Login</button>
                    <p>
                        Not yet a member? <a href="register.php">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
        <div class="footer">
            Powered By SEKCJA1
        </div>
    </div>
</body>
</html>