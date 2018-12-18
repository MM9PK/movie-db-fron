<?php include('server.php') ?>
<?php

  if (!isset($_SESSION['username'])) {
      $_SESSION['msg'] = "You must log in first";
      header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<?php if ($_SESSION['email'] != "admin") : header('location: index.php');?><?php endif ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add TV Series</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<div class="container">
		<div class="baner">
			<h2>"Serwis Filmowy" - Add New TV Series</h1>
        </div>
    
		<div class="main" style="padding-bottom: 30px;">
			<div class="login">
				<form method="post" action="new_tv_series.php" enctype="multipart/form-data" class="logform">
					<?php include('errors.php'); ?>
					<label>Title:</label><br>
					<input id="input" type="text" name="title" placeholder="title"><br><br>
					<label>Studio:</label><br>
					<input id="input" type="text" name="studio" placeholder="studio"><br><br>
					<label>Actors:</label><br>
					<input id="input" type="text" name="actors" placeholder="actors"><br><br>
					<label>Release Year:</label><br>
					<input id="input" type="number" name="releaseYear" placeholder="1895"><br><br>
					<label>Description:</label><br>
					<input id="input" type="text" name="description" placeholder="description"><br><br>
					<label>Image:</label><br>
					<input type="file" name="img" accept="image/jpeg,image/gif"><br><br>
					<button type="submit" class="btn" name="add_tv_series">Submit</button>
                </form>
            </div>
        </div>
        <div class="footer">
            Powered By SEKCJA1
        </div>
	</div>
</body>
</html>