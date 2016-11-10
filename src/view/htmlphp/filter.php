<?php

$genre = $_POST['genre'];
$yearFrom = $_POST['yearFrom'];
$yearTo = $_POST['yearTo'];

$errors = 1;
if($yearFrom !== "" && $yearFrom < 1903){
	$errors = $errors + 1;
	//echo "hit1";
}
if($yearTo !== "" && $yearTo > 2011){
	$errors = $errors + 1;
	//echo "hit2";
}
if($yearTo !=="" && $yearFrom > $yearTo){
	$errors = $errors + 1;
	//echo "hit3";
}

if(!is_numeric($yearFrom) && $yearFrom !==""){
	$errors = $errors + 1;
	//echo "hit4";
}

if(!is_numeric($yearTo) && $yearTo !==""){
	$errors = $errors + 1;
	//echo "hit5";
}

if($errors !== 1){
	header("Location: topMovies.php?error=true&genre=".$genre."&yearFrom=".$yearFrom."&yearTo=".$yearTo);
}elseif($genre == "" && $yearFrom == "" && $yearTo == ""){
	//hits here when all are on default
	header("location: topMovies.php");
}elseif($genre ==! "" && $yearFrom == "" && $yearTo == ""){
	header("location: topMovies.php?genre=".$genre);
}elseif($errors == 1){
	header("Location: topMovies.php?genre=".$genre."&yearFrom=".$yearFrom."&yearTo=".$yearTo);
}else{
	echo "You broke it...";
}

?>