<?php
  session_start();

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
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta lang="pl-PL">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Serwis Filmowy</title>
	<link rel="stylesheet" href="Styles.css" type="text/css">
</head>

<body>

	<div class="container">
		<div class="baner">
			<h1>"Serwis Filmowy"</h1>
		</div>
		<div class="navigateBar">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Films</a></li>
				<li><a href="#">Series</a></li>
				<li><a href="#">Animated Series</a></li>
				<li>
					<form action="/action_page.php">
						<input type="text" placeholder="Search.." name="search">
						<button type="submit">Search</button>
					</form>
				</li>
				<li style="float:right">
					<?php  if (isset($_SESSION['username'])) : ?>
					<p><strong> You are currently logged in as
							<?php echo $_SESSION['username']; ?></strong></p>
					<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
					<?php endif ?>
					<?php if ($_SESSION['email'] == "admin") :?>
					<!-- PAKO, na tej podstawie możesz zrobić dodawanie i usuwanie filmu -->
					Dodawanie filmu
					<?php endif ?>
				</li>
			</ul>
		</div>
		<div class="main">

			<div class="movie_1">

				<img src="<?php $_GET['0'];?>" />
				<?php
                for ($i = 0; $i < $_SESSION['moviesAmount']; $i++) {
                    echo $_SESSION['title'.$i];
                    echo $_SESSION['actors'.$i];
                    echo $_SESSION['releaseYear'.$i];
                    echo $_SESSION['description'.$i];
                    echo $_SESSION['director'.$i];
                }
                ?>
				<div class="desc_1">
					Tytuł: Killer <br />
					Reżyser: Juliusz Machulski <br />
					Główna Rola: Cezary Pazura <br />
					Opis: <br />
				</div>
			</div>

			<div class="movie_2">
				<img source="GłupiIGłupszy.jpg" height="150" width="150">
				<div class="desc_2">
					Tytuł: Głupi i Głupszy <br />
					Reżyser: Peter Farelly <br />
					Główne Role: Jim Carrey, Jeff Daniels <br />
					Opis: <br />
				</div>
			</div>

			<div class="movie_3">
				<img source="HarryPotter_I.jpg" height="150" width="150">
				<div class="desc_3">
					Tytuł: Harry Potter i Kamień Filozoficzny <br />
					Reżyser: Juliusz Machulski <br />
					Główne Role: Daniel Radcliffe, Rupert Grint, Emma Watson<br />
					Opis: <br />
				</div>
			</div>

		</div>
		<div class="footer">
			Powered By SEKCJA1
		</div>
	</div>
	<!-- notification message -->
	<?php if (isset($_SESSION['success'])) : ?>
	<?php
              unset($_SESSION['success']);
          ?>
	<?php endif ?>


</body>

</html>