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
              <li><a href="rater.php">Movie Rater</a></li>
              <li><a href="topMovies.php">Top 50</a></li>
              <li id="menu_active"><a href="search.php">Search</a></li>
              <li><a href="profile.php">Profile</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
  </div>
</div>
<div class="content">
  <div class='search'>
    <h2>Search Movies</h2>
    <form method='post' action='filter.php?search=true'>
      <label>Search: </label><br>
      <input type='text' id='search' name='search' <?php if($_GET['search']==''){echo "value=''";}else{echo "value='".$_GET['search']."'";};?>/>
      <button type='submit'>Go!</button>  
    <h2>Current Filter's In Use:</h2>
    <?php
      if(!$_GET['search']==''){
        echo "<h2>You searched for:</h2>";
        echo "<p>".$_GET['search']."</p>";
      }
    ?>
  </form>
  </div>    
  <div class='results'>
<?php

$servername = "mysql4.000webhost.com";
$username = "a4803033_class";
$password = "Compsci366";

$db=mysql_connect  ($servername, $username,  $password) or die ('I cannot connect to the database  because: ' . mysql_error());

$mydb=mysql_select_db("a4803033_class");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "";
if(!$_GET['search']==''){
  $sql = "SELECT DISTINCT m.ID, m.title, m.rtPictureURL, m.rtAudienceScore FROM movie_usa m WHERE m.title LIKE '%".$_GET['search']."%'";  

  $result = mysql_query($sql) or die(mysql_error());
  if(mysql_num_rows($result) == 0){
    echo "<h2>Your search did not find a movie. Try again!";
  }else{  
    if(mysql_num_rows($result) > 75){
      echo "<h2>Your result returned more than 50 movies!<br><br> Consider refining your search!</h2>";
      $sql = "SELECT DISTINCT m.ID, m.title, m.rtPictureURL, m.rtAudienceScore FROM movie_usa m WHERE m.title LIKE '%".$_GET['search']."%' LIMIT 75"; 
      $result = mysql_query($sql) or die(mysql_error());
    }

    echo "<table>";
    echo "<tr>";
    echo "<th width='50'>Rank</th>";
    echo "<th width='250'>Title</th>";
    echo "<th width='250'>Poster</th>";
    echo "<th width='75'>Rating</th>";
    echo "<th width='75'>Like/Dislike</th>";
    echo "</tr>";
    $movie_array = array();
    $counter = 1;
    $_SESSION['page'] = $_SERVER['REQUEST_URI'];

    while($row2=mysql_fetch_array($result)){
    
      if($counter <= 50){
        $find = array_search($row2['title'], $movie_array);
        if($find == ""){
          array_push($movie_array, $row2['title']);  

          echo "<tr>";
          echo "<td width='50' style='text-align: center' valign='middle'>".$counter."</td>";
          echo "<td width='250' style='text-align: center' valign='middle'>".$row2['title']."</td>";
          echo "<td width='250' style='text-align: center' valign='middle'><a href='movieInfo.php?movie=".$row2['ID']."'><img src='".$row2['rtPictureURL']."' height='135' width='90' class='moviepic' alt='Poster unavailable at this time'></a></td>";
          echo "<td width='75' style='text-align: center' valign='middle'>".$row2['rtAudienceScore']."</td>";
          $innersql = "select * from user_ratings where username='".$_SESSION['currentUser']."' and movieID=".$row2['ID'].";";
          $innerResult = mysql_query($innersql);
          if(mysql_num_rows($innerResult) == 0){  
            echo "<td width='75' style='text-align: center' valign='middle'>";
            echo "<a href='upvote.php?id=".$row2['ID']."'><img src='../images/Thumbs_Up.png' height='50' width='50' class='thumb'></a><br>";
            echo "<a href='downvote.php?id=".$row2['ID']."'><img src='../images/Thumbs_Down.png' height='50' width='50' class='thumb'></a></td>";
          }else{
            $fetch = mysql_fetch_array($innerResult);
            if($fetch['rating']==0){
              echo "<td width='75' style='text-align: center' valign='middle'><a href='profileScripts.php?rm=".$row2['ID']."'><button class='testbutton'>Remove Dislike</button></a></td>";
            }else{
              echo "<td width='75' style='text-align: center' valign='middle'><a href='profileScripts.php?rm=".$row2['ID']."'><button class='testbutton'>Remove Like</button></a></td>";
            }
          }      
          echo "</tr>"; 
          $counter = $counter + 1;    
        }
      }
    }
    echo "</table>";
  }    
}else{
  echo "<h2>Search for a movie then click go!</h2>";
}

?>
</div>
</body>
</html>