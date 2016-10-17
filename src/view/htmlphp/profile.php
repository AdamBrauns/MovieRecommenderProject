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
      <h2>Account Information</h2>
      <h2>Username: </h2>
      <h2>Change Password:</h2>
      <form id="form_1" action="#" method="post">
          <div class="wrapper"> Old Password:
            <div class="bg">
              <input type="text" class="input input1" value="Enter Old Password" onBlur="if(this.value=='') this.value='Enter Full Name'" onFocus="if(this.value =='Enter Full Name' ) this.value=''">
            </div>
          </div>
          <div class="wrapper"> New Password:
            <div class="bg">
              <input type="text" class="input input1" value="Enter New Password" onBlur="if(this.value=='') this.value='Enter Email Address'" onFocus="if(this.value =='Enter Email Address' ) this.value=''">
            </div>
          </div>
          <div class="wrapper"> Confirm Password:
            <div class="bg">
              <input type="text" class="input input1" value="Validate New Password" onBlur="if(this.value=='') this.value='Enter Street Address, City'" onFocus="if(this.value =='Enter Street Address, City' ) this.value=''">
            </div>
          </div>
            <br>
            <a href="#" class="button2">Go!</a> </div>
        </form>
    </article>
  </section>
</div>
</body>
</html>