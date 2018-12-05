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
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<div class="container">
		<div class="baner">
			<h1>"Serwis Filmowy" - Add</h1>
		</div>
		<div class="main">
			<div class="add-new-movie">
				<form method="post" action="new_movie.php" enctype="multipart/form-data" class="logform">
					<?php include('errors.php'); ?>
					<label>Title: </label>
					<input type="text" name="title" value="title" onfocus="if(this.value=='title')this.value='';" onblur="if(this.value=='')this.value='title';"><br><br>
					<label>Director:</label>
					<input type="text" name="director" value="director" onfocus="if(this.value=='director')this.value='';" onblur="if(this.value=='')this.value='director';"><br><br>
					<label>Actors: </label>
					<input type="text" name="actors" value="actors" onfocus="if(this.value=='actors')this.value='';" onblur="if(this.value=='')this.value='actors';"><br><br>
					<label>Release Year: </label>
					<input type="number" name="releaseYear" value="releaseYear" onfocus="if(this.value=='releaseYear')this.value='';" onblur="if(this.value=='')this.value='releaseYear';"><br><br>
					<label>Description: </label>
					<input type="text" name="description" value="description" onfocus="if(this.value=='description')this.value='';" onblur="if(this.value=='')this.value='description';"><br><br>
					<label>Image: </label>
					<input type="file" name="img" accept="image/jpeg,image/gif"><br><br>
					<button type="submit" class="btn" name="add">Submit</button>
                </form>
            </div>
        </div>
        <div class="footer">
            Powered By SEKCJA1
        </div>
	</div>
</body>
</html>3