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

	if($newpass != $c_pass){
		//header("Location: profile.php?error=true");
	}

	if(strlen($oldpass) < 1 or strlen($newpass) < 1 or strlen($c_pass) < 1){
		//header("Location: profile.php?error=true");
	}

	$sql = "SELECT * FROM users WHERE username='".$_SESSION['currentUser']."';";
	$result = mysql_query($sql);

	$row=mysql_fetch_array($result);

	if($row['password'] != $oldpass){
		//header("Location: profile.php?error=true");
	}else{
		$sql = "UPDATE users SET password='".$newpass."' WHERE username='".$_SESSION['currentUser']."';";
		mysql_query($sql);
		//header("Location: profile.php");
	}
}else{

	$movieID = key($_POST['clicked']);

	$table = "";
	if($_SESSION['prevpage'] == "liked"){
		$table = "user_upvotes";
	}elseif($_SESSION['prevpage'] == "disliked"){
		$table = "user_downvotes";
	}else{
		header("Location: profile.php");
	}

	$sql = "DELETE FROM ".$table." WHERE username='".$_SESSION['currentUser']."' AND movieID='".$movieID."';";

	mysql_query($sql);

	header("Location: profile-".$_SESSION['prevpage'].".php");

}

?>