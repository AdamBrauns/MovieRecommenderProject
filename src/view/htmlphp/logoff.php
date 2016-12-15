<?php
/*
Adam Brauns

Final Project - Movie Recommender 

CompSci366 - Database Management Systems

*/
?>
<?php
session_start();

$_SESSION['active'] == false;

session_destroy();

header("Location: ../../index.html");

?>