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
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
<script type="text/javascript" src="../js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cufon-replace.js"></script>
<script type="text/javascript" src="../js/Myriad_Pro_italic_600.font.js"></script>
<script type="text/javascript" src="../js/Myriad_Pro_italic_400.font.js"></script>
<script type="text/javascript" src="../js/Myriad_Pro_400.font.js"></script>
</head>
<body id="page1">
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
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li id="menu_active"><a href="rater.php">Movie Rater</a></li>
              <li><a href="profile.php">Profile</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
  </div>
</div>
<div class="content" id="middle">
  <div class="filter">
    Genre: &nbsp;
      <select>
        <option value="">-Select-</option>
        <option value="action">Action</option>
        <option value="adventure">Adventure</option>
        <option value="animation">Animation</option>
        <option value="children">Children</option>
        <option value="comedy">Comedy</option>
        <option value="crime">Crime</option>
        <option value="documentary">Documentary</option>
        <option value="drama">Drama</option>
        <option value="fantasy">Fantasy</option>
        <option value="filmnoir">Film-Noir</option>
        <option value="horror">Horror</option>
        <option value="imax">IMAX</option>
        <option value="musical">Musical</option>
        <option value="mystery">Mystery</option>
        <option value="romance">Romance</option>
        <option value="scifi">Sci-Fi</option>
        <option value="short">Short</option>
        <option value="thriller">Thriller</option>
        <option value="war">War</option>
        <option value="western">Western</option>
      </select>
  <div>
<?php

$servername = "mysql4.000webhost.com";
$username = "a4803033_class";
$password = "Compsci366";

$db=mysql_connect  ($servername, $username,  $password) or die ('I cannot connect to the database  because: ' . mysql_error());

$mydb=mysql_select_db("a4803033_class");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM movies ORDER BY RAND() LIMIT 1";

$result = mysql_query($sql);

$row=mysql_fetch_array($result);

$movie_imageurl = $row['rtPictureURL'];
$movie_title = $row['title'];
$movie_id = $row['ID'];
//echo "<h2>TEST".$imageurl."</h2>";

  echo "<p class='movietitle'>".$movie_title."</p>";
  echo "<p style='text-align:center;''><a href='rater.php'>Skip Movie</a></p>";
  echo "<div class='movie'>";
    $_SESSION['movie_id'] = $movie_id;
    echo "<a href='upvote.php'><img src='../images/Thumbs_Up.png' height='200' width='200' class='thumb'></a>";
    //echo "<img src='../images/movie_poster.jpg' height='200' width='150' class='moviepic'>";
    echo "<img src='".$movie_imageurl."' height='200' width='150' class='moviepic'>";
    echo "<a href='downvote.php'><img src='../images/Thumbs_Down.png' height='200' width='200' class='thumb'></a>";
  echo "</div>";
echo "<div>";
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
?>            
          </tr>
        </table>
      </div>
    </footer>
  </div>
</div>
</body>
</html>