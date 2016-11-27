<?php

session_start();

//if(!isset($_SESSION['currentUser'])){
if($_SESSION['active'] == false){
  header("Location: ../../index.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Movie Recommender</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/testcss.css" type="text/css" media="all">
<!--
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
<script type="text/javascript" src="../js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cufon-replace.js"></script>
<script type="text/javascript" src="../js/Myriad_Pro_italic_600.font.js"></script>
<script type="text/javascript" src="../js/Myriad_Pro_italic_400.font.js"></script>
<script type="text/javascript" src="../js/Myriad_Pro_400.font.js"></script>
-->
</head>
<body>
<div class="body1">
  <div class="main">
    <header>
      <div class="wrapper">
        <h1><a href="rater.php" id="logo"></a><span id="slogan">Movie Recommender</span></h1>
        <div class="right">
          <nav>
            <ul id="top_nav">
              <li style="color: white;"><?php echo $_SESSION['currentUser']?></li><li><a href="logoff.php">Logoff</a></li>
            </ul>
          </nav>
          <nav>
            <ul id="menu">
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li id="menu_active"><a href="rater.php">Movie Rater</a></li>
              <li><a href="topMovies.php">Top 50</a></li>
              <li><a href="search.php">Search</a></li>
              <li><a href="profile.php">Profile</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
  </div>
</div>
<div class="content">
  <div class='filter'>
    <h2>Filter Movies</h2>
    <form method='post' action='filter.php'>
    <table>
    <tr><td width='200' height='20'>Genre:</td>
      <td width='200' height='20'>
      <select id='genre' name='genre'>
        <option value="">All</option>
        <option <?php if($_GET['genre']=='Action'){echo "selected";};?> value="Action">Action</option>
        <option <?php if($_GET['genre']=='Adventure'){echo "selected";};?> value="Adventure">Adventure</option>
        <option <?php if($_GET['genre']=='Animation'){echo "selected";};?> value="Animation">Animation</option>
        <option <?php if($_GET['genre']=='Children'){echo "selected";};?> value="Children">Children</option>
        <option <?php if($_GET['genre']=='Comedy'){echo "selected";};?> value="Comedy">Comedy</option>
        <option <?php if($_GET['genre']=='Crime'){echo "selected";};?> value="Crime">Crime</option>
        <option <?php if($_GET['genre']=='Documentary'){echo "selected";};?> value="Documentary">Documentary</option>
        <option <?php if($_GET['genre']=='Drama'){echo "selected";};?> value="Drama">Drama</option>
        <option <?php if($_GET['genre']=='Fantasy'){echo "selected";};?> value="Fantasy">Fantasy</option>
        <option <?php if($_GET['genre']=='Film-Noir'){echo "selected";};?> value="Film-Noir">Film-Noir</option>
        <option <?php if($_GET['genre']=='Horror'){echo "selected";};?> value="Horror">Horror</option>
        <option <?php if($_GET['genre']=='IMAX'){echo "selected";};?> value="Imax">IMAX</option>
        <option <?php if($_GET['genre']=='Musical'){echo "selected";};?> value="Musical">Musical</option>
        <option <?php if($_GET['genre']=='Mystery'){echo "selected";};?> value="Mystery">Mystery</option>
        <option <?php if($_GET['genre']=='Romance'){echo "selected";};?> value="Romance">Romance</option>
        <option <?php if($_GET['genre']=='Sci-Fi'){echo "selected";};?> value="Scifi">Sci-Fi</option>
        <option <?php if($_GET['genre']=='Short'){echo "selected";};?> value="Short">Short</option>
        <option <?php if($_GET['genre']=='Thriller'){echo "selected";};?> value="Thriller">Thriller</option>
        <option <?php if($_GET['genre']=='War'){echo "selected";};?> value="War">War</option>
        <option <?php if($_GET['genre']=='Western'){echo "selected";};?> value="Western">Western</option>
      </select>
      </td></tr>
      <tr><td height='20'><label>Year From </label><br><label>(earliest 1903):</label></td>
      <td height='20'><br><input type='text' id='yearFrom' name='yearFrom' <?php if($_GET['yearFrom']==''){echo "value=''";}else{echo "value='".$_GET['yearFrom']."'";};?>/></td><tr>
      <tr><td height='20'><label>Year To </label><br><label>(latest 2011):</label></td>
      <td height='20'><br><input type='text' id='yearTo' name='yearTo' <?php if($_GET['yearTo']==''){echo "value=''";}else{echo "value='".$_GET['yearTo']."'";};?>/></td></tr>
      <tr>
    </table>
    <button type='submit' name='filter' value='rater'>Go!</button>  
    <h2>Current Filter's In Use:</h2>
    <?php

      if($_GET['error']=='true'){
        echo "<p>You have an error, no filters in use";
      }else{
          if($_GET['genre']=='' && $_GET['yearFrom']=='' && $_GET['yearTo']==''){
            echo "<p>All movies</p>";
          }elseif($_GET['genre']!=='' && $_GET['yearFrom']=='' && $_GET['yearTo']==''){
            echo "<h2>Genre:</h2>";
            echo "<p>".$_GET['genre']."</p>";  
          }elseif($_GET['genre']!=='' && $_GET['yearFrom']!=='' && $_GET['yearTo']==''){
            echo "<h2>Genre:</h2>";
            echo "<p>".$_GET['genre']."</p>";
            echo "<h2>Year From:</h2>";
            echo "<p>".$_GET['yearFrom']."</p>";
          }elseif($_GET['genre']!=='' && $_GET['yearFrom']=='' && $_GET['yearTo']!==''){
            echo "<h2>Genre:</h2>";
            echo "<p>".$_GET['genre']."</p>";
            echo "<h2>Year To:</h2>";
            echo "<p>".$_GET['yearTo']."</p>";
          }elseif($_GET['genre']!=='' && $_GET['yearFrom']!=='' && $_GET['yearTo']!==''){
            echo "<h2>Genre:</h2>";
            echo "<p>".$_GET['genre']."</p>";
            echo "<h2>Year From:</h2>";
            echo "<p>".$_GET['yearFrom']."</p>"; 
            echo "<h2>Year To:</h2>";
            echo "<p>".$_GET['yearTo']."</p>";
          }elseif($_GET['genre']=='' && $_GET['yearFrom']=='' && $_GET['yearTo']!==''){   
            echo "<h2>Year To:</h2>";
            echo "<p>".$_GET['yearTo']."</p>";
          }elseif($_GET['genre']=='' && $_GET['yearFrom']!=='' && $_GET['yearTo']==''){   
            echo "<h2>Year From:</h2>";
            echo "<p>".$_GET['yearFrom']."</p>";
          }elseif($_GET['genre']=='' && $_GET['yearFrom']!=='' && $_GET['yearTo']!==''){  
            echo "<h2>Year From:</h2>";
            echo "<p>".$_GET['yearFrom']."</p>";
            echo "<h2>Year To:</h2>";
            echo "<p>".$_GET['yearTo']."</p>";
          }  
      }

    ?>
  </form>
  </div> 
  <div style="float: right; width: 70%">
<?php

$servername = "mysql4.000webhost.com";
$username = "a4803033_class";
$password = "Compsci366";

$db=mysql_connect  ($servername, $username,  $password) or die ('I cannot connect to the database  because: ' . mysql_error());

$mydb=mysql_select_db("a4803033_class");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "";
if($_GET['error']==''){

  //SQL STATEMENT TO GET MOVIES NOT YET RATED
  //select a.* from movies AS a left join (select x.* from movies x left join user_ratings y on x.ID=y.movieid WHERE y.username='Adam Brauns') AS b on a.ID=b.ID WHERE b.ID IS NULL;
/*
select a.* 
from movies AS a
left join (
  select x.*
  from movies x
  left join user_ratings y
  on x.ID=y.movieid
  WHERE y.username='Adam Brauns'
) AS b
on a.ID=b.ID
WHERE b.ID IS NULL
*/

/* V2
select a.* 
from movie_usa AS a
left join (
  select x.*
  from movie_usa x
  left join user_ratings y
  on x.ID=y.movieid
  WHERE y.username='Adam Brauns'
) AS b
on a.ID=b.ID
WHERE b.ID IS NULL
ORDER BY RAND()
LIMIT 1
*/

  //$sql = "SELECT * FROM movies ORDER BY RAND() LIMIT 1"; //Any movie (includes foreign)
  //$sql = "SELECT ID, title, country FROM movies, movie_countries WHERE movies.ID = movie_countries.movieID AND movie_countries.country =  'USA' ORDER BY RAND( )  LIMIT 1";
  $sql = "SELECT a.* 
          FROM movie_usa AS a
          LEFT JOIN (
            SELECT x.*
            FROM movie_usa x
            LEFT JOIN user_ratings y
            ON x.ID=y.movieid
            WHERE y.username='".$_SESSION['currentUser']."'
          ) AS b
          ON a.ID=b.ID
          WHERE b.ID IS NULL
          ORDER BY RAND()
          LIMIT 1";

  if($_GET['genre']=='' && $_GET['yearFrom']=='' && $_GET['yearTo']==''){
    //$sql = "SELECT * FROM  movie_usa m ORDER BY RAND() LIMIT 1";
      $sql = "SELECT a.* 
          FROM movie_usa AS a
          LEFT JOIN (
            SELECT x.*
            FROM movie_usa x
            LEFT JOIN user_ratings y
            ON x.ID=y.movieid
            WHERE y.username='".$_SESSION['currentUser']."'
          ) AS b
          ON a.ID=b.ID
          WHERE b.ID IS NULL
          ORDER BY RAND()
          LIMIT 1";
  }elseif($_GET['genre']!=='' && $_GET['yearFrom']=='' && $_GET['yearTo']==''){
    //$sql = "SELECT DISTINCT * FROM movie_usa m JOIN movie_genres g ON m.ID=g.movieid WHERE g.genre='".$_GET['genre']."' ORDER BY RAND() LIMIT 1";

    $sql = "SELECT DISTINCT movies.* 
            FROM movie_usa AS movies
            JOIN movie_genres g 
            ON movies.ID=g.movieid     

            LEFT JOIN (
              SELECT x.*
              FROM movie_usa x
              LEFT JOIN user_ratings y
              ON x.ID=y.movieid
              WHERE y.username='".$_SESSION['currentUser']."'
            ) AS b
            ON movies.ID=b.ID
            WHERE b.ID IS NULL
            AND g.genre='".$_GET['genre']."' 
            ORDER BY RAND() LIMIT 1";

  }elseif($_GET['genre']!=='' && $_GET['yearFrom']=='' && $_GET['yearTo']!==''){
    //$sql = "SELECT DISTINCT * FROM movie_usa m JOIN movie_genres g ON m.ID=g.movieid WHERE g.genre='".$_GET['genre']."' AND m.year <= ".$_GET['yearTo']." ORDER BY RAND() LIMIT 1";

    $sql = "SELECT DISTINCT movies.* 
            FROM movie_usa AS movies
            JOIN movie_genres g 
            ON movies.ID=g.movieid     

            LEFT JOIN (
              SELECT x.*
              FROM movie_usa x
              LEFT JOIN user_ratings y
              ON x.ID=y.movieid
              WHERE y.username='".$_SESSION['currentUser']."'
            ) AS b
            ON movies.ID=b.ID
            WHERE b.ID IS NULL
            AND g.genre='".$_GET['genre']."' 
            ORDER BY RAND() LIMIT 1";    

  }elseif($_GET['genre']!=='' && $_GET['yearFrom']!=='' && $_GET['yearTo']==''){
    //$sql = "SELECT DISTINCT * FROM movie_usa m JOIN movie_genres g ON m.ID=g.movieid WHERE g.genre='".$_GET['genre']."' AND m.year >= ".$_GET['yearFrom']." ORDER BY RAND() LIMIT 1";
  
    $sql = "SELECT DISTINCT movies . * 
            FROM movie_usa AS movies
            JOIN movie_genres g ON movies.ID = g.movieid
            LEFT JOIN (

              SELECT x . * 
              FROM movie_usa x
              LEFT JOIN user_ratings y ON x.ID = y.movieid
              WHERE y.username =  'testusername'
            ) AS b ON movies.ID = b.ID
            WHERE b.ID IS NULL 
            AND g.genre =  'Action'
            AND movies.year >= ".$_GET['yearFrom']."
            ORDER BY RAND( ) 
            LIMIT 1";

  }elseif($_GET['genre']!=='' && $_GET['yearFrom']!=='' && $_GET['yearTo']!==''){
    //$sql = "SELECT DISTINCT * FROM movie_usa m JOIN movie_genres g ON m.ID=g.movieid WHERE g.genre='".$_GET['genre']."' AND m.year >= ".$_GET['yearFrom']." AND m.year <= ".$_GET['yearTo']." ORDER BY RAND() LIMIT 1";
  
    $sql = "SELECT DISTINCT movies . * 
            FROM movie_usa AS movies
            JOIN movie_genres g ON movies.ID = g.movieid
            LEFT JOIN (

              SELECT x . * 
              FROM movie_usa x
              LEFT JOIN user_ratings y ON x.ID = y.movieid
              WHERE y.username =  'testusername'
            ) AS b ON movies.ID = b.ID
            WHERE b.ID IS NULL 
            AND g.genre =  'Action'
            AND movies.year >= ".$_GET['yearFrom']."
            AND m.year <= ".$_GET['yearTo']."
            ORDER BY RAND( ) 
            LIMIT 1";

  }elseif($_GET['genre']=='' && $_GET['yearFrom']=='' && $_GET['yearTo']!==''){
    //$sql = "SELECT DISTINCT * FROM movie_usa m  WHERE m.year <= ".$_GET['yearTo']." ORDER BY RAND() LIMIT 1";
      $sql = "SELECT a.* 
          FROM movie_usa AS a
          LEFT JOIN (
            SELECT x.*
            FROM movie_usa x
            LEFT JOIN user_ratings y
            ON x.ID=y.movieid
            WHERE y.username='".$_SESSION['currentUser']."'
          ) AS b
          ON a.ID=b.ID
          WHERE b.ID IS NULL
          AND a.year <= ".$_GET['yearTo']."
          ORDER BY RAND()
          LIMIT 1";  

  }elseif($_GET['genre']=='' && $_GET['yearFrom']!=='' && $_GET['yearTo']==''){  
    //$sql = "SELECT DISTINCT * FROM movie_usa m  WHERE m.year >= ".$_GET['yearFrom']." ORDER BY RAND() LIMIT 1";
      $sql = "SELECT a.* 
          FROM movie_usa AS a
          LEFT JOIN (
            SELECT x.*
            FROM movie_usa x
            LEFT JOIN user_ratings y
            ON x.ID=y.movieid
            WHERE y.username='".$_SESSION['currentUser']."'
          ) AS b
          ON a.ID=b.ID
          WHERE b.ID IS NULL
          AND a.year >= ".$_GET['yearFrom']."
          ORDER BY RAND()
          LIMIT 1";   

  }elseif($_GET['genre']=='' && $_GET['yearFrom']!=='' && $_GET['yearTo']!==''){  
    $sql = "SELECT DISTINCT * FROM movie_usa m  WHERE m.year >= ".$_GET['yearFrom']." AND m.year <= ".$_GET['yearTo']." ORDER BY RAND() LIMIT 1";

    $sql = "SELECT a.* 
        FROM movie_usa AS a
        LEFT JOIN (
          SELECT x.*
          FROM movie_usa x
          LEFT JOIN user_ratings y
          ON x.ID=y.movieid
          WHERE y.username='".$_SESSION['currentUser']."'
        ) AS b
        ON a.ID=b.ID
        WHERE b.ID IS NULL
        AND a.year >= ".$_GET['yearFrom']."
        AND a.year <= ".$_GET['yearTo']."
        ORDER BY RAND()
        LIMIT 1";     

  } 

  $result = mysql_query($sql);

  $row=mysql_fetch_array($result);

  $movie_imageurl = $row['rtPictureURL'];
  $movie_title = $row['title'];
  $movie_id = $row['ID'];

  echo "<div style='position: absolute; top: 40%; transform: translateY(-40%)';>";
  echo "<p class='movietitle'>".$movie_title."</p>";
  echo "<p class='movietitle'><a href='".$_SERVER['REQUEST_URI']."'>Skip Movie</a></p>";
    $_SESSION['movie_id'] = $movie_id;
    $_SESSION['page'] = $_SERVER['REQUEST_URI'];
    echo "<a href='upvote.php'><img src='../images/Thumbs_Up.png' height='200' width='200' class='thumb'></a>";
    echo "<img src='".$movie_imageurl."' height='200' width='150' class='moviepic'>";
    echo "<a href='downvote.php'><img src='../images/Thumbs_Down.png' height='200' width='200' class='thumb'></a>";
  echo "</div>";
  echo "</div>";  
  echo "<div class='footer1'>";
  echo "<div class='main'>";
    echo "<footer>";
      echo "<p style='color:white;''>Movie Information</p>";
      echo "<div class='footerlink'>";
        echo "<table style='color:white;''>";
          echo "<tr>";
          echo "<th width='100'>Title</th>";
          echo "<th width='100'>Director</th>"; 
          echo "<th width='100'>Actors</th>";
          echo "<th width='100'>Ratings</th>";
          echo "</tr>";
          echo "<tr>";
            echo "<td>".$movie_title."</td>";
            echo "<td>Steven Speilberg</td>"; 
            echo "<td>Batman<br> robin</td>";
            echo "<td>9.8</td>";
}else{
  echo "<h2>There was an error with your filter!</h2>";
  echo "<h2>Please edit and try again!<h2>";
}
?>            
          </tr>
        </table>
      </div>
    </footer>
  </div>
</div>
</body>
</html>