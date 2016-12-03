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
              <li id="menu_active"><a href="topMovies.php">Top 50</a></li>
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
    <button type='submit' name='filter' value='topMovies'>Go!</button>  
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
if($_GET['error']==''){
  //echo "<p>THERE WAS AN ERROR</p>";
  if($_GET['genre']=='' && $_GET['yearFrom']=='' && $_GET['yearTo']==''){
    $sql = "SELECT m.ID, m.title, m.rtPictureURL, m.rtAudienceScore FROM  movie_usa m ORDER BY rtAudienceScore DESC LIMIT 75";
  }elseif($_GET['genre']!=='' && $_GET['yearFrom']=='' && $_GET['yearTo']==''){
    $sql = "SELECT DISTINCT m.ID, m.title, m.rtPictureURL, m.rtAudienceScore FROM movie_usa m JOIN movie_genres g ON m.ID=g.movieid WHERE g.genre='".$_GET['genre']."' ORDER BY m.rtAudienceScore DESC LIMIT 75";
  }elseif($_GET['genre']!=='' && $_GET['yearFrom']=='' && $_GET['yearTo']!==''){
    $sql = "SELECT DISTINCT m.ID, m.title, m.rtPictureURL, m.rtAudienceScore FROM movie_usa m JOIN movie_genres g ON m.ID=g.movieid WHERE g.genre='".$_GET['genre']."' AND m.year <= ".$_GET['yearTo']." ORDER BY m.rtAudienceScore DESC LIMIT 75";
  }elseif($_GET['genre']!=='' && $_GET['yearFrom']!=='' && $_GET['yearTo']==''){
    $sql = "SELECT DISTINCT m.ID, m.title, m.rtPictureURL, m.rtAudienceScore FROM movie_usa m JOIN movie_genres g ON m.ID=g.movieid WHERE g.genre='".$_GET['genre']."' AND m.year >= ".$_GET['yearFrom']." ORDER BY m.rtAudienceScore DESC LIMIT 75";
  }elseif($_GET['genre']!=='' && $_GET['yearFrom']!=='' && $_GET['yearTo']!==''){
    $sql = "SELECT DISTINCT m.ID, m.title, m.rtPictureURL, m.rtAudienceScore FROM movie_usa m JOIN movie_genres g ON m.ID=g.movieid WHERE g.genre='".$_GET['genre']."' AND m.year >= ".$_GET['yearFrom']." AND m.year <= ".$_GET['yearTo']." ORDER BY m.rtAudienceScore DESC LIMIT 75";
  }elseif($_GET['genre']=='' && $_GET['yearFrom']=='' && $_GET['yearTo']!==''){
    $sql = "SELECT DISTINCT m.ID, m.title, m.rtPictureURL, m.rtAudienceScore FROM movie_usa m  WHERE m.year <= ".$_GET['yearTo']." ORDER BY m.rtAudienceScore DESC LIMIT 75";
  }elseif($_GET['genre']=='' && $_GET['yearFrom']!=='' && $_GET['yearTo']==''){  
    $sql = "SELECT DISTINCT m.ID, m.title, m.rtPictureURL, m.rtAudienceScore FROM movie_usa m  WHERE m.year >= ".$_GET['yearFrom']." ORDER BY m.rtAudienceScore DESC LIMIT 75";
  }elseif($_GET['genre']=='' && $_GET['yearFrom']!=='' && $_GET['yearTo']!==''){  
    $sql = "SELECT DISTINCT m.ID, m.title, m.rtPictureURL, m.rtAudienceScore FROM movie_usa m  WHERE m.year >= ".$_GET['yearFrom']." AND m.year <= ".$_GET['yearTo']." ORDER BY m.rtAudienceScore DESC LIMIT 75";
  }    

  $result = mysql_query($sql) or die(mysql_error());

  echo "<table>";
  echo "<tr>";
  echo "<th width='50'>Rank</th>";
  echo "<th width='250'>Title</th>";
  echo "<th width='250'>Poster</th>";
  echo "<th width='75'>Rating</th>";
  echo "<th width='75'>Like/Dislike</th>";
  echo "</tr>";
  $movie_array = array();
  $rank = 1;
  $_SESSION['page'] = $_SERVER['REQUEST_URI'];
  while($row2=mysql_fetch_array($result)){
    if($rank <= 50){
      $find = array_search($row2['title'], $movie_array);
      if($find == ""){
        array_push($movie_array, $row2['title']);
    
        echo "<tr>";
        echo "<td width='30' style='text-align: center' valign='middle'>".$rank."</td>";
        echo "<td width='250'style='text-align: center' valign='middle'>".$row2['title']."</td>";
        echo "<td width='250'style='text-align: center' valign='middle'><img src='".$row2['rtPictureURL']."' height='135' width='90' class='moviepic' alt='Poster unavailable at this time'></td>";
        echo "<td width='75'style='text-align: center' valign='middle'>".$row2['rtAudienceScore']."</td>";
        $innersql = "select * from user_ratings where username='".$_SESSION['currentUser']."' and movieID=".$row2['ID'].";";
        $innerResult = mysql_query($innersql);
        if (mysql_num_rows($innerResult) == 0){  
          echo "<td width='75' style='text-align: center' valign='middle'>";
          echo "<a href='upvote.php?id=".$row2['ID']."'><img src='../images/Thumbs_Up.png' height='50' width='50' class='thumb'></a><br>";
          echo "<a href='downvote.php?id=".$row2['ID']."'><img src='../images/Thumbs_Down.png' height='50' width='50' class='thumb'></a></td>";
        }else{
          $fetch = mysql_fetch_array($innerResult);
          if($fetch['rating']==0){
            echo "<td width='75' style='text-align: center' valign='middle'><a href='profileScripts.php?rm=".$row2['ID']."'><button>Remove dislike</button></a></td>";
          }else{
            echo "<td width='75' style='text-align: center' valign='middle'><a href='profileScripts.php?rm=".$row2['ID']."'><button>Remove like</button></a></td>";
          }
        }  
        echo "</tr>";     
        $rank = $rank + 1;
      }
    }
  }
  echo "</table>";




/*
    echo "<tr>";
    echo "<td style='text-align: center'>".$rank."</td>";
    echo "<td style='text-align: center'>".$row2['title']."</td>";
    echo "<td style='text-align: center'><img src='".$row2['rtPictureURL']."' height='150' width='100' class='moviepic' alt='Poster unavailable at this time'></td>";
    echo "<td style='text-align: center'>".$row2['rtAudienceScore']."</td>";
    $innersql = "select * from user_ratings where username='".$_SESSION['currentUser']."' and movieID=".$row2['ID'].";";
    $innerResult = mysql_query($innersql);
    if (mysql_num_rows($innerResult) == 0){  
      echo "<td style='text-align: center'>";
      echo "<a href='upvote.php?id=".$row2['ID']."'><img src='../images/Thumbs_Up.png' height='50' width='50' class='thumb'></a><br>";
      echo "<a href='downvote.php?id=".$row2['ID']."'><img src='../images/Thumbs_Down.png' height='50' width='50' class='thumb'></a></td>";
    }else{
      $fetch = mysql_fetch_array($innerResult);
      if($fetch['rating']==0){
        echo "<td style='text-align: center'><a href='profileScripts.php?rm=".$row2['ID']."'><button>Remove dislike</button></a></td>";
      }else{
        echo "<td style='text-align: center'><a href='profileScripts.php?rm=".$row2['ID']."'><button>Remove like</button></a></td>";
      }
    }  
    echo "</tr>";     
  }
  echo "</table>";
*/


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