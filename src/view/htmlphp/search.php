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
  //echo "<p>THERE WAS AN ERROR</p>";
  $sql = "SELECT DISTINCT m.title, m.rtPictureURL, m.rtAudienceScore FROM movie_usa m WHERE m.title LIKE '%".$_GET['search']."%'";  

  $result = mysql_query($sql) or die(mysql_error());
  //$result = mysql_query($sql) or die("<h2>ERROR OCCURED</h2>");
  if(mysql_num_rows($result) == 0){
    echo "<h2>Your search did not find a movie. Try again!";
  }else{  
    if(mysql_num_rows($result) > 50){
      echo "<h2>Your result returned more than 50 movies!<br><br> Consider refining your search!</h2>";
      $sql = "SELECT DISTINCT m.title, m.rtPictureURL, m.rtAudienceScore FROM movie_usa m WHERE m.title LIKE '%".$_GET['search']."%' LIMIT 50"; 
      $result = mysql_query($sql) or die(mysql_error());
    }

    echo "<table>";
    echo "<tr>";
    echo "<th width='150'>Rank</th>";
    echo "<th width='150'>Title</th>";
    echo "<th width='150'>Poster</th>";
    echo "<th width='150'>Rating</th>";
    //echo "<th width='150'>Delete?</th>";
    echo "</tr>";
    $counter = 1;
    while($row2=mysql_fetch_array($result)){
      echo "<tr>";
      echo "<td style='text-align: center'>".$counter."</td>";
      $counter = $counter + 1;
      echo "<td style='text-align: center'>".$row2['title']."</td>";
      echo "<td style='text-align: center'><img src='".$row2['rtPictureURL']."' height='150' width='100' class='moviepic' alt='Poster unavailable at this time'></td>";
      echo "<td style='text-align: center'>".$row2['rtAudienceScore']."</td>";
      //echo "<td style='text-align: center'><input type='submit' name='clicked[".$movieID."]' value='delete' href='rater.php'></td>";
      echo "</tr>";     
    }
    echo "</table>";
  }  
}else{
  echo "<h2>Search for a movie then click go!</h2>";
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