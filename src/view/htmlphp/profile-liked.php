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
<title>Profile</title>
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
              <li style="color: white;"><?php echo $_SESSION['currentUser'];?></li><li><a href="logoff.php">Logoff</a></li>
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
              <li><a href="rater.php">Movie Rater</a></li>
              <li id="menu_active"><a href="profile.php">Profile</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
  </div>
</div>
<div class="main">
  <section id="content">
    <article class="col1">
      <div class="pad_1">
        <h2>Your Profile</h2>
        <p><strong>From your prifile</strong> you can view and edit your liked/disliked movies. You can also view your account and change your password.</p>
        <p><a href="profile.php">Account information</a></p>
        <p><a href="profile-liked.php">Liked Movies</a></p>
        <p><a href="">Disliked Movies</a></p>
      </div>
    </article>
    <article class="col2 pad_left1">

      <?php

      session_start();
      $currentUser = $_SESSION['currentUser'];

      echo "<h2>Upvoted Movies</h2>";

      $servername = "mysql4.000webhost.com";
      $username = "a4803033_class";
      $password = "Compsci366";

      $db=mysql_connect  ($servername, $username,  $password) or die ('I cannot connect to the database  because: ' . mysql_error());

      $mydb=mysql_select_db("a4803033_class");

      $sql = "SELECT movieID FROM user_upvotes WHERE username='".$currentUser."'";

      $result = mysql_query($sql);

      if (mysql_num_rows($result) == 0){
        echo "<h2> You did not like any movies yet</h2>";
      }else{
        echo "<table>";
        echo "<th width='100'>Title</th>";
        echo "<th width='100'>Director</th>";
        echo "<th width='100'>Rating</th>";
        echo "<th width='100'>Delete?</th>";

        $bigString = "";
        while($row=mysql_fetch_array($result)){
          $movieID  = $row['movieID'];
          $sql = "SELECT * FROM movies WHERE ID='".$movieID."'";
          $result = mysql_query($sql);

          $row2 = mysql_fetch_array($result);

          $bigString = $bigString + "<tr><td>".$row2."</td></tr>";
        }
        echo $bigString;
      }

      





      ?>
      </table>  
    </article>
  </section>
</div>
</body>
</html>