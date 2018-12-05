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
      $seriesAmount = 5 * $page;
      $query = "SELECT * FROM series";
      $results = mysqli_query($db, $query);
      $count = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM series"));
      $total = $count[0];
      if ($total > 0) {
          for ($i = 0; $i < $total; $i++) {
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
                        Director: <?php echo  $director[$i];?><br />
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