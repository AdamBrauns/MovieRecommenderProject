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

if(key($_POST['clicked']) == "password"){
	
	$oldpass = $_POST['oldpass'];
	$newpass = $_POST['newpass'];
	$c_pass =  $_POST['c_pass'];

	$errors = 0;
	if($newpass != $c_pass){
		$errors = $errors + 1;
	}

	if(strlen($oldpass) < 1 or strlen($newpass) < 1 or strlen($c_pass) < 1){
		$errors = $errors + 1;
	}

	$sql = "SELECT * FROM users WHERE username='".$_SESSION['currentUser']."';";
	$result = mysql_query($sql);

	$row=mysql_fetch_array($result);

	if($row['password'] != $oldpass){
		$errors = $errors + 1;
	}

	if($errors == 0){
		$sql = "UPDATE users SET password='".$newpass."' WHERE username='".$_SESSION['currentUser']."';";
		mysql_query($sql);
		echo "SUCCESS";
		header("Location: profile.php?error=false");
	}else{
		header("Location: profile.php?error=true");
	}
}elseif(key($_POST['clicked']) == "rmliked"){
	$sql = "DELETE FROM user_ratings WHERE username='".$_SESSION['currentUser']."' AND rating=1;";
	mysql_query($sql);
	header("Location: profile.php?delete=likes");
}elseif(key($_POST['clicked']) == "rmdisliked"){
	$sql = "DELETE FROM user_ratings WHERE username='".$_SESSION['currentUser']."' AND rating=0;";
	mysql_query($sql);
	header("Location: profile.php?delete=dislikes");
}elseif(isset($_GET['rm'])){
	$filters = $_SESSION['page'];
	$movieID = $_GET['rm'];
	$sql = "DELETE FROM user_ratings WHERE username='".$_SESSION['currentUser']."' AND movieID='".$movieID."';";
	mysql_query($sql);
	header("location: ".$filters);
}else{
	$movieID = key($_POST['clicked']);
	$sql = "DELETE FROM user_ratings WHERE username='".$_SESSION['currentUser']."' AND movieID='".$movieID."';";
	mysql_query($sql);
	header("Location: profileMovies.php?movies=".$_SESSION['prevpage']);
}

?>