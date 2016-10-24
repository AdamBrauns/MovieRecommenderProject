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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
        <p><a href="profile-disliked.php">Disliked Movies</a></p>
      </div>
    </article>
    <article class="col2 pad_left1">
      <?php
      if($_GET['error'] == "true"){
        echo "<h2 style='color:red;'>Error Changing Password! Try Again!</h2>";
      }elseif($_GET['error'] == "false"){
        echo "<h2 style='color:green;'>Password successfully changed!</h2>";
      }
      echo "<h2>Account Information</h2>";
      echo "<h2>Username: </h2>";
      echo "<h3>".$_SESSION['currentUser']."</h3>";
      ?>
      <h2>Change Password:</h2>
      <form action="profileScripts.php" method="POST">
          <div class="wrapper"> Old Password:
            <div class="bg">
              <input type="password" class="input input1" name="oldpass">
            </div>
          </div>
          <div class="wrapper"> New Password:
            <div class="bg">
              <input type="password" class="input input1" name="newpass">
            </div>
          </div>
          <div class="wrapper"> Confirm Password:
            <div class="bg">
              <input type="password" class="input input1" name="c_pass">
            </div>
          </div>
            <br>
            <input type='submit' name='clicked[password]' value='Change Password'>
        </form>
        <form action="profileScripts.php" method="POST">
          <h2>Delete all likes</h2>
          <input type='button' value='Remove All Liked' id='shownext1'>
          <input type='submit' name='clicked[rmliked]' style="display:none" id='shownextbutton1' value='Confirm?'>
        </form>
        <form action="profileScripts.php" method="POST">
          <h2>Delete all dislikes</h2>
          <input type='button' value='Remove All Disliked' id='shownext2'>
          <input type='submit' name='clicked[rmdisliked]' style="display:none" id='shownextbutton2' value='Confirm?'>
        </form>

        <script type="text/javascript">
          $(function(){
            $('#shownext1').click(function(){
              $('#shownextbutton1').css("display", "inline");
            });
            $('#shownext2').click(function(){
              $('#shownextbutton2').css("display", "inline");
            }); 
          });  
        </script>

    </article>
  </section>
</div>
</body>
</html>