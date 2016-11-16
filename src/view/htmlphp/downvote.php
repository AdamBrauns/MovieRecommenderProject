<?php

session_start();

$movie_id = $_SESSION['movie_id'];
$currentUser = $_SESSION['currentUser'];
$filters = $_SESSION['page'];

echo "movie id = ".$movie_id;

$servername = "mysql4.000webhost.com";
$username = "a4803033_class";
$password = "Compsci366";

$db=mysql_connect  ($servername, $username,  $password) or die ('I cannot connect to the database  because: ' . mysql_error());

$mydb=mysql_select_db("a4803033_class");

$sql = "INSERT INTO user_downvotes (username, movieID)	VALUES ('".$currentUser."', '".$movie_id."')";
mysql_query($sql);

header("location: ".$filters);

?>