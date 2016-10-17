<?php
session_start();

$_SESSION['active'] == false;

//session_unset();
//setcookie(session_start(),'',time()-3600,'/');
session_destroy();

header("Location: ../../index.html");

?>