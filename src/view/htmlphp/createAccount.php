<?php
/*
Adam Brauns

Final Project - Movie Recommender 

CompSci366 - Database Management Systems

*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Sign In</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="../css/loginPage.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo"></span></h1>
		</div>
		<div class="login-box animated fadeInUp">	
				<?php

					$servername = "mysql4.000webhost.com";
					$username = "a4803033_class";
					$password = "Compsci366";

					$db=mysql_connect  ($servername, $username,  $password) or die ('I cannot connect to the database  because: ' . mysql_error());

					$mydb=mysql_select_db("a4803033_class");

					$username = $_POST['username'];
					$u_len = strlen($username);
					$password = $_POST['password'];
					$c_password = $_POST['c_password'];
					$successful = 0;

					if($u_len < 5){
						$successful = $successful + 1;
					}

					if($password !== $c_password){
						$successful = $successful + 1;
					}

					$sql = "SELECT username FROM users WHERE username='".$username."'";

					$result = mysql_query($sql);

					if (mysql_num_rows($result) != 0){
						echo "<div class='box-header'>";
						echo "<h2>Error Creating Account!</h2>";
						echo "</div>";
      					echo "<label>Username already exists</label><br>";
      					echo "<label>Try again with a new username!</label>";
  					}else{
  						if($successful == 0){
  							$sql = "INSERT INTO users (username, password)	VALUES ('".$username."', '".$password."')";
  							mysql_query($sql);
  							echo "<div class='box-header'>";
							echo "<h2>Account Created!</h2>";
							echo "</div>";
      						echo "<label>Congrats! Your account was created successfully!</label><br>";
      						echo "<label><a href='../../index.html'>Sign in!</a></label>";
  						}else{
      						?>
  							<div class="box-header">
							<h2>Create Account</h2>
							</div>
							<form method='post' action='createAccount.php'/>
							<label style='color:red;'>Error Creating Account! Try Again!</label><br>
							<label for="username">Username</label><br>
							<label for="username">(at least 5 characters)</label>
							<br/>
							<input type="text" id="username" name="username">
							<br/>
							<label for="password">Password</label>
							<br/>
							<input type="password" id="password" name="password">
							<br/>
							<label for="password">Confirm Password</label>
							<br/>
							<input type="password" id="c_password" name="c_password">
							<br/>
							<button type="submit">Create Account</button>
							<p>Already have an account? <a href="../../index.html"><u>Sign in!</u></a></p>
							<?php
  						}	
  					}
				?>
			</form>
		</div>
	</div>
</body>
</html>