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
              <li><a href="rater.php">Movie Rater</a></li>
              <li id="menu_active"><a href="topMovies.php">Top 50</a></li>
              <li><a href="profile.php">Profile</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
  </div>
</div>
<div class="content">
  <div style="float: left; width: 30%">
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
      <h2>THIS IS A TEST</h2>
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

$sql = "SELECT * FROM  movies ORDER BY  rtAudienceScore DESC LIMIT 50"; //Any movie (includes foreign)
//$sql = "SELECT ID, title, country FROM movies, movie_countries WHERE movies.ID = movie_countries.movieID AND movie_countries.country =  'USA' ORDER BY RAND( )  LIMIT 1";

$result = mysql_query($sql);

//$row=mysql_fetch_array($result);
//echo $row['title'];

//if (mysql_num_rows($result) == 0){
  //echo "<h2> You did not dislike any movies yet</h2>";
//}else{
  echo "<table>";
  echo "<tr>";
  echo "<th width='150'>Title</th>";
  echo "<th width='150'>Poster</th>";
  echo "<th width='150'>Rating</th>";
  echo "<th width='150'>Delete?</th>";
  echo "</tr>";

  while($row2=mysql_fetch_array($result)){
    //echo $row2['title'];

    echo "<tr>";
    echo "<td style='text-align: center'>".$row2['title']."</td>";
    echo "<td style='text-align: center'><img src='".$row2['rtPictureURL']."' height='150' width='100' class='moviepic' alt='Poster unavailable at this time'></td>";
    echo "<td style='text-align: center'>".$row2['rtAudienceScore']."</td>";
    echo "<td style='text-align: center'><input type='submit' name='clicked[".$movieID."]' value='delete' href='rater.php'></td>";
    echo "</tr>";     
  }
  echo "</table>";
//}  
       
  
  //echo "</div>";
//echo "</div>";  
//echo "<div class='footer1'>";
  //echo "<div class='main'>";
    //echo "<footer>";
      //echo "<div class='footerlink'>";
?>
</div>
</body>
</html>