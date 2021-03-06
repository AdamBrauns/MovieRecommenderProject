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
			<div class="box-header">
				<h2>Create Account</h2>
			</div>
			<form method='post' action='createAccount.php'/>
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
	$('#c_password').focus(function() {
		$('label[for="c_password"]').addClass('selected');
	});
	$('#c_password').blur(function() {
		$('label[for="c_password"]').removeClass('selected');
	});
</script>

</html>