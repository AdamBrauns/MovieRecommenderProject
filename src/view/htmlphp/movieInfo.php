<?php
/*
Adam Brauns

Final Project - Movie Recommender 

CompSci366 - Database Management Systems

*/
?>
<?php

session_start();

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

  $sql = "select * from movies where ID=".$_GET['movie']; 

  $result = mysql_query($sql);

  $row=mysql_fetch_array($result);

  $movie_imageurl = $row['rtPictureURL'];
  $movie_title = $row['title'];
  $movie_id = $row['ID'];
  echo "<div>";
    echo "<h2 style='padding-left: 20px;'>".$row['title']."</h2>";
  echo "</div>";
  echo "<div>";
  echo "<div style='float: left; width: 30%; padding-top: 40px;'>";
  echo "<p  style='text-align: center;'><img src='".$movie_imageurl."' height=250 width='200' class='moviepic'></p>";
    $_SESSION['movie_id'] = $movie_id;
    $_SESSION['page'] = $_SERVER['REQUEST_URI'];

    $innersql = "select * from user_ratings where username='".$_SESSION['currentUser']."' and movieID=".$row['ID'].";";
    $innerResult = mysql_query($innersql);
    if (mysql_num_rows($innerResult) == 0){  
      echo "<p style='text-align: center;'><a href='upvote.php'><img src='../images/Thumbs_Up.png' height='100' width='100' class='thumb'></a>";
      echo "<a href='downvote.php'><img src='../images/Thumbs_Down.png' height='100' width='100' class='thumb'></a></p>";
    }else{
      $fetch = mysql_fetch_array($innerResult);
      if($fetch['rating']==0){
        echo "<p width='75' style='text-align: center' valign='middle'><a href='profileScripts.php?rm=".$row['ID']."'><button class='testbutton'>Remove Dislike</button></a></p>";
      }else{
        echo "<p width='75' style='text-align: center' valign='middle'><a href='profileScripts.php?rm=".$row['ID']."'><button class='testbutton'>Remove Like</button></a></p>";
      }
    }

  echo "</div>";
  echo "</div>";  
  echo "<div class='main'>";

}else{
  echo "<h2>There was an error with your filter!</h2>";
  echo "<h2>Please edit and try again!<h2>";
}
echo "</div>";
echo "<div style='float: right; width: 30%'>";

echo "<br><h3>Actors:</h3>";

$sql2 = "select * from movies m join movie_actors a on m.ID=a.movieID where ID=".$_GET['movie']." order by a.ranking"; 
$result2 = mysql_query($sql2) or die(mysql_error());

$limit = 1; 
$tableSorter = 0;
echo "<table>";
while($row2=mysql_fetch_array($result2)){
  if($limit <= 26){
    if($tableSorter%2==0){
      echo "<tr><td width='200' height='30'>".$row2['actorName']."</td>";
    }else{
      echo "<td width='200' height='30'>".$row2['actorName']."</td></tr>";
    }
    $tableSorter += 1;
  }
  $limit += 1;
}  
echo "</table>";
echo "</div>";
echo "<div style='float: right; width: 30%'>";

echo "<br><h3>Year Produced:</h3>";
echo "<p>".$row['year']."</p>";
echo "<h3>Rating:</h3>";
echo "<p>".$row['rtAudienceScore']."</p>";

$sql3 = "SELECT d.directorName FROM movies m join movie_directors d on m.ID=d.movieID where m.ID=".$_GET['movie']; 
$result3 = mysql_query($sql3) or die(mysql_error());
$row3 = mysql_fetch_array($result3);
echo "<h3>Director:</h3>";
echo "<p>".$row3['directorName']."</p>";

$sql4 = "SELECT DISTINCT g.genre FROM movies m JOIN movie_genres g ON m.ID = g.movieID WHERE m.ID=".$_GET['movie']; 
$result4 = mysql_query($sql4) or die(mysql_error());

echo "<h3>Genre(s):</h3>";
while($row4=mysql_fetch_array($result4)){
  echo "<p>".$row4['genre']."</p>";
}  
?> 
<div class='footer1'>
</div>         
</div>
</body>
</html>