<?php
/*
Adam Brauns

Final Project - Movie Recommender 

CompSci366 - Database Management Systems

*/
?>
<?php

session_start();

$servername = "mysql4.000webhost.com";
$username = "a4803033_class";
$password = "Compsci366";

$db=mysql_connect  ($servername, $username,  $password) or die ('I cannot connect to the database  because: ' . mysql_error());

$mydb=mysql_select_db("a4803033_class");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT password FROM users WHERE username='".$username."'";

$result = mysql_query($sql);

$row=mysql_fetch_array($result);

$returnedpassword  = $row['password'];

if(strlen($password) == 0){
	displayHTML();
}elseif ($password == $returnedpassword){
	$_SESSION['currentUser'] = $username;
	$_SESSION['active'] = true;
	header("Location: rater.php");
}else{
	displayHTML();
}

Function displayHTML(){
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
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<form method='post' action='signin.php'/>
			<label style='color:red;'>Username or password incorrect!</label>
			<label for="username">Username</label>
			<br/>
			<input type="text" id="username" name="username">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password" name="password">
			<br/>
			<button type="submit">Sign In</button>
			<p>Don't have an account? <a href="account.php"><u>Create one!</u></a></p>
			</form>
		</div>
	</div>
</body>

<script>
	$(document).ready(function () {
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>

<?php
}

?>