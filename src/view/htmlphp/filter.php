<?php
/*
Adam Brauns

Final Project - Movie Recommender 

CompSci366 - Database Management Systems

*/
?>
<?php

$goTo = "";

if($_POST['filter']=='rater'){
	$goTo = "rater";
}elseif($_POST['filter']=='topMovies'){
	$goTo = "topMovies";
}

if($_GET['search']==""){
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
	if($yearTo !=="" && $yearFrom > $yearTo){
		$errors = $errors + 1;
	}

	if(!is_numeric($yearFrom) && $yearFrom !==""){
		$errors = $errors + 1;
	}

	if(!is_numeric($yearTo) && $yearTo !==""){
		$errors = $errors + 1;
	}

	if($errors !== 1){
		header("Location: ".$goTo.".php?error=true&genre=".$genre."&yearFrom=".$yearFrom."&yearTo=".$yearTo);
	}elseif($genre == "" && $yearFrom == "" && $yearTo == ""){
		header("location: ".$goTo.".php");
	}elseif($genre ==! "" && $yearFrom == "" && $yearTo == ""){
		header("location: ".$goTo.".php?genre=".$genre);
	}elseif($errors == 1){
		header("Location: ".$goTo.".php?genre=".$genre."&yearFrom=".$yearFrom."&yearTo=".$yearTo);
	}else{
		echo "You broke it...";
	}
}else{
	header("Location: search.php?search=".$_POST['search']);
}

?>