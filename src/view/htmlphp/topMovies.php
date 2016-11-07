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
    <h2>Filter Movies</h2>
    <form method='post' action='filter.php'>
    <table>
    <tr><td>Genre:</td>
      <td>
      <select id='genre' name='genre'>
        <option value="">-Select-</option>
        <option value="Action">Action</option>
        <option value="Adventure">Adventure</option>
        <option value="Animation">Animation</option>
        <option value="Children">Children</option>
        <option value="Comedy">Comedy</option>
        <option value="Crime">Crime</option>
        <option value="Documentary">Documentary</option>
        <option value="Drama">Drama</option>
        <option value="Fantasy">Fantasy</option>
        <option value="Filmnoir">Film-Noir</option>
        <option value="Horror">Horror</option>
        <option value="Imax">IMAX</option>
        <option value="Musical">Musical</option>
        <option value="Mystery">Mystery</option>
        <option value="Romance">Romance</option>
        <option value="Scifi">Sci-Fi</option>
        <option value="Short">Short</option>
        <option value="Thriller">Thriller</option>
        <option value="War">War</option>
        <option value="Western">Western</option>
      </select>
      </td></tr>
      <tr><td><label>Year From </label><br><label>(earliest 1903):</label></td>
      <td><br><input type='text' id='yearFrom' name='yearFrom' placeholder='Year From'/></td><tr>
      <tr><td><label>Year To </label><br><label>(latest 2011):</label></td>
      <td><br><input type='text' id='yearTo' name='yearTo' placeholder='Year To'/></td></tr>
      <tr>
    </table>
    <button type='submit'>Go!</button>  
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
  //echo "<p>THERE WAS AN ERROR</p>";
  if($_GET['genre']=='' && $_GET['yearFrom']=='' && $_GET['yearTo']==''){
    $sql = "SELECT * FROM  movies ORDER BY rtAudienceScore DESC LIMIT 50";
  }elseif($_GET['genre']!=='' && $_GET['yearFrom']=='' && $_GET['yearTo']==''){
    //echo "SELECT * FROM movies m JOIN movie_genres g ON m.ID=g.movieid WHERE g.genre='".$_GET['genre']."' ORDER BY m.rtAudienceScore DESC LIMIT 50";
    $sql = "SELECT DISTINCT * FROM movies m JOIN movie_genres g ON m.ID=g.movieid WHERE g.genre='".$_GET['genre']."' ORDER BY m.rtAudienceScore DESC LIMIT 50";
  }



  $result = mysql_query($sql);
  
  echo "<table>";
  echo "<tr>";
  echo "<th width='150'>Rank</th>";
  echo "<th width='150'>Title</th>";
  echo "<th width='150'>Poster</th>";
  echo "<th width='150'>Rating</th>";
  echo "<th width='150'>Delete?</th>";
  echo "</tr>";
  $rank = 1;
  while($row2=mysql_fetch_array($result)){
    echo "<tr>";
    echo "<td style='text-align: center'>".$rank."</td>";
    $rank = $rank + 1;
    echo "<td style='text-align: center'>".$row2['title']."</td>";
    echo "<td style='text-align: center'><img src='".$row2['rtPictureURL']."' height='150' width='100' class='moviepic' alt='Poster unavailable at this time'></td>";
    echo "<td style='text-align: center'>".$row2['rtAudienceScore']."</td>";
    echo "<td style='text-align: center'><input type='submit' name='clicked[".$movieID."]' value='delete' href='rater.php'></td>";
    echo "</tr>";     
  }
  echo "</table>";
}else{
  echo "<h2>There was an error with your filter!</h2>";
  echo "<h2>Please edit and try again!<h2>";
}

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