<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Serwis Filmowy</title>
        <link rel="stylesheet" href="Styles.css" type="text/css">
    </head>
    <body>  
        <div class="container">
            <div class="baner">
                <h1>Serwis Filmowy - Logowanie</h1>
            </div>

            <div class="main">
			
                <div class="login">
                    <form class="logform">
                        E-mail:<br>
                        <input type="email" name="Email" value="e-mail" onfocus="if(this.value=='e-mail')this.value='';" onblur="if(this.value=='')this.value='e-mail';"><br><br>
                        Password:<br>
                        <input type="password" name="Password" value="Hasło" onfocus="if(this.value=='Hasło')this.value='';" onblur="if(this.value=='')this.value='Hasło';"><br><br>
                        <input class="button" type="submit" value="Log In"><br><br>
						You don't have account?
						<a href="register_page.html">Register</a>
                    </form>
                </div>

            </div>

            <div class="footer">
                Powered By SEKCJA1
            </div>
        </div>
    </body>
</html>