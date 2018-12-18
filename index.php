<?php
  session_start();

  $counter = 1;
  
  if (!isset($_SESSION['username'])) {
      $_SESSION['msg'] = "You must log in first";
      header('location: login.php');
  }
  if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['username']);
      header("location: login.php");
  }
  if (isset($_GET['add_movie'])) header("location: new_movie.php");
  if (isset($_GET['add_series'])) header("location: new_series.php");
  if (isset($_GET['add_tv_series'])) header("location: new_tv_series.php");
  if (isset($_GET['add_game'])) header("location: new_game.php");


?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Serwis Filmowy</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
		<div class="baner">
			<h1>"Serwis Filmowy"</h1>
		</div>
		<div class="navigateBar">
			<ul>
				<li><a href="main.php" target="iframe_a">Films</a></li>
				<li><a href="series.php" target="iframe_a">Series</a></li>
                <li><a href="tvseries.php" target="iframe_a">TV Series</a></li>
                <li><a href="games.php" target="iframe_a">Games</a></li>
				<li style="float:right">
					<a href="index.php?logout='1'" style="background-color: red;">Log out</a>
				</li>		
				<li style="float:right">
					<?php if ($_SESSION['email'] == "admin") :?>
					<div class="dropdown">
                        <button class="dropbtn">Choose Category</button>
                        <div class="dropdown-content">
                            <a href="index.php?add_movie" class="add">Add Movie</a>
							<a href="index.php?add_game" class="add">Add Game</a>
                            <a href="index.php?add_series" class="add">Add Series</a>
							<a href="index.php?add_tv_series" class="add">Add TV Series</a>
                        </div>
                    </div>
					<?php endif ?>
				</li>
				<li style="float:right">
					<?php  if (isset($_SESSION['username'])) : ?>
					<p> You are currently logged in as <?php echo $_SESSION['username']; ?></p>
					<?php endif ?>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-sm-4 col-md-8">
				<iframe name="iframe_a" class="main_iframe" src="main.php" width="100%" height="700em" scrolling="yes" frameborder="0"></iframe>
			</div>
		</div>
</body>

</html>