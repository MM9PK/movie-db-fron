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
      
      $recordperpage = 3;
      if(isset($_GET['page']) & !empty($_GET['page']))
        {
            $currentpage = $_GET['page'];
        }
        else
        {
            $currentpage = 1;
        }
        $recordSkip = ($currentpage * $recordperpage) - $recordperpage;
        $query1 = "SELECT * FROM games";
        $totalpageCounted = mysqli_query($db, $query1);
        $totalresult = mysqli_num_rows($totalpageCounted);

        $lastpage = ceil($totalresult/$recordperpage);
        $recordSkippage = 1; 
        $nextpage = $currentpage + 1;
        $previouspage = $currentpage - 1;
        //It will select only required pages from database
        $query2 = "SELECT * FROM games LIMIT $recordSkip, $recordperpage";
        $results = mysqli_query($db, $query2);
      
  }
?>

<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
</head>
<body>
    <div class="container">
        <div class="main_in_iframe">
            <?php while($row = mysqli_fetch_assoc($results)) { ?>
            <div >
                <div class="onetitle">
                    <?php echo  '<img src="data:image/jpeg;base64,'.base64_encode($row['img']).'" width="150" height="150"/>';?>
                    <div class="movieinfo">                      
                        <h1>Title: <?php echo  $row['title'];?></h1>   
                        Developer: <?php echo  $row['developer'];?><br />
                        Genre: <?php echo  $row['genre'];?><br />
                        Release Year: <?php echo  $row['releaseYear'];?><br />
                    </div>
                    <button class="collapsible">Description</button>
                    <div class="description">
                        <br /><?php echo  $row['description'];?>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div> 
        <ul class="pagination">
   <?php if($currentpage != $recordSkippage){ ?>     <li class="page-item">
      <a class="page-link" href="?page=<?php echo $recordSkippage ?>" tabindex="-1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">First</span>
      </a>
    </li>
    <?php } ?>
    <?php if($currentpage >= 2){ ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
    <?php } ?>
    <li class="page-item active"><a class="page-link" href="?page=<?php echo $currentpage ?>"><?php echo $currentpage ?></a></li>
    <?php if($currentpage != $lastpage){ ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $lastpage ?>" aria-label="Next"> 
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Last</span>
      </a>
     </li>
     <?php } ?>
    </ul>
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