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
  } else {
      $db = mysqli_connect('localhost', 'root', '', 'movie-db');
      mysqli_set_charset($db, 'utf8');
      $page = 1;
      $moviesAmount = 5 * $page;
      $query = "SELECT * FROM movies TOP LIMIT $moviesAmount";
      $results = mysqli_query($db, $query);
      if ($rows = mysqli_num_rows($results) > 0) {
          for ($i = 0; $i < $rows; $i++) {
              $row = $results->fetch_assoc();
              $title[$i] = $row['title'];
              $actors[$i] = $row['actors'];
              $releaseYear[$i] = $row['releaseYear'];
              $description[$i] = $row['description'];
              $director[$i] = $row['director'];
              $img[$i] = $row['img'];
          }
      }
  }

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

	<div class="container">
		<div class="baner">
			<h1>"Serwis Filmowy"</h1>
		</div>
		<div class="navigateBar">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Films</a></li>
				<li><a href="#">Series</a></li>
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
				<?php
                for ($i = 0; $i < $rows; $i++) {
                    echo  $title[$i];
                    echo  $actors[$i];
                    echo  $releaseYear[$i];
                    echo  $description[$i];
                    echo  $director[$i];
					echo  '<img src="data:image/jpeg;base64,'.base64_encode($img[$i]).'" width="150" height="150"/>';
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
</body>

</html>