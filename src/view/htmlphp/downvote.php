<?php

session_start();

if(isset($_GET['id'])){
	$movie_id = $_GET['id'];
}else{
	$movie_id = $_SESSION['movie_id'];
}

$currentUser = $_SESSION['currentUser'];
$filters = $_SESSION['page'];

//echo "movie id = ".$movie_id;

$servername = "mysql4.000webhost.com";
$username = "a4803033_class";
$password = "Compsci366";

$db=mysql_connect  ($servername, $username,  $password) or die ('I cannot connect to the database  because: ' . mysql_error());

$mydb=mysql_select_db("a4803033_class");

//$sql = "INSERT INTO user_downvotes (username, movieID)	VALUES ('".$currentUser."', '".$movie_id."')";
$sql = "INSERT INTO user_ratings (username, movieID, rating)	VALUES ('".$currentUser."', '".$movie_id."', '0')";
mysql_query($sql);

header("location: ".$filters);

?>