<?php

$genre = $_POST['genre'];
$yearFrom = $_POST['yearFrom'];
$yearTo = $_POST['yearTo'];

$errors = 1;
if($yearFrom !== "" && $yearFrom < 1903){
	$errors = $errors + 1;
}
if($yearTo !== "" && $yearTo > 2011){
	$errors = $errors + 1;
}

if($errors !== 1){
	header("Location: topMovies.php?error=true");
}elseif($genre == "" && $yearFrom == "" && $yearTo == ""){
	//hits here when all are on default
	header("location: topMovies.php");
}elseif($genre ==! "" && $yearFrom == "" && $yearTo == ""){
	header("location: topMovies.php?genre=".$genre);
}elseif($genre ==! "" & $errors == 1){
	header("Location: topMovies.php?genre=".$genre."&yearFrom=".$yearFrom."&yearTo=".$yearTo);
}else{
	echo "error";
}

?>