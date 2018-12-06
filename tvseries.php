<?php

  $counter = 1;

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
	  $count = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM tvseries"));
	  $buffquery = mysqli_query($db, "SELECT * FROM tvseries");
	  $num_rows = mysqli_num_rows($buffquery);
	  
	   if(isset($_POST['showMore']))
		{
			$_SESSION['test'] += 1;
			$counter = ((int)$_SESSION['test']);
			echo $counter;
		}
	  
	   if(isset($_POST['hide']))
		{
			$_SESSION['test'] =1 ;
			if($_SESSION['test'] < 1)
			{
			  $_SESSION['test'] = 1;
			}
			$counter = ((int)$_SESSION['test']);
			echo $counter;
		}
	  
      $page = 0;
      $tvseriesAmount = 5 * $counter;
	  if($tvseriesAmount > $num_rows) 
	  {
		  $tvseriesAmount = $num_rows;
	  }
      $query = "SELECT * FROM tvseries LIMIT 0,".$tvseriesAmount;
      $results = mysqli_query($db, $query);
      $total = $tvseriesAmount;
      if ($total > 0) {
          for ($i = 0; $i < $total; $i++) {
              $row = $results->fetch_assoc();
              $title[$i] = $row['title'];
              $actors[$i] = $row['actors'];
              $releaseYear[$i] = $row['releaseYear'];
              $description[$i] = $row['description'];
              $studio[$i] = $row['studio'];
              $img[$i] = $row['img'];
          }
      }
  }
?>

<head>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div class="container">
        <div class="main_in_iframe">
        <?php for ($i = 0; $i < $total; $i++) { ?>
            <div >
                
                <div class="onetitle">
                    <?php echo  '<img src="data:image/jpeg;base64,'.base64_encode($img[$i]).'" width="150" height="150"/>';?>
                    <div class="movieinfo">
                        <h1>Title: <?php echo  $title[$i];?></h1>   
                        Studio: <?php echo  $studio[$i];?><br />
                        Actors: <?php echo  $actors[$i];?><br />
                        Release Year: <?php echo  $releaseYear[$i];?><br />
                    </div>
                    <button class="collapsible">Description</button>
                    <div class="description">
                        <br /><?php echo  $description[$i];?>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div> 
        <div class="footer">
				Powered By SEKCJA1
		</div>
		<form method="post" action="">
			<input type="submit" name="showMore" value="Wyświetl Więcej" />
			<input type="submit" name="hide" value="Ukryj" />
		</form>
    </div>
</body>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}
</script>