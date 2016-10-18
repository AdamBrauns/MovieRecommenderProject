<?php

session_start();

$servername = "mysql4.000webhost.com";
$username = "a4803033_class";
$password = "Compsci366";

$db=mysql_connect  ($servername, $username,  $password) or die ('I cannot connect to the database  because: ' . mysql_error());

$mydb=mysql_select_db("a4803033_class");

$movieID = key($_POST['clicked']);

$table = "";
if($_SESSION['prevpage'] == "liked"){
	$table = "user_upvotes";
}elseif($_SESSION['prevpage'] == "disliked"){
	$table = "user_downvotes";
}else{
	header("Loaction: profile.php");
}

$sql = "DELETE FROM ".$table." WHERE username='".$_SESSION['currentUser']."' AND movieID='".$movieID."';";

mysql_query($sql);

header("Location: profile-".$_SESSION['prevpage'].".php");

?>