<?php

$servername = "mysql4.000webhost.com";
$username = "a4803033_class";
$password = "Compsci366";

$db=mysql_connect  ($servername, $username,  $password) or die ('I cannot connect to the database  because: ' . mysql_error());

$mydb=mysql_select_db("a4803033_class");

$sql = "SELECT * FROM  `test_table`";

$result = mysql_query($sql);

while($row=mysql_fetch_array($result)){
			$ID  = $row['ID'];
			$Name = $row['Name'];
			//-display the result of the array
			echo "<ul>\n";
			echo  "<li>".$ID . " " . $Name . "</a></li>\n";
			echo "</ul>";
}

//movieActors();

Function movieActors(){ //working 
	@ $fp = fopen("Data/movie_actors_comma.csv", "r");
	if(!$fp){
        echo "Could not open the file!\n";
        exit();
	}
	while (($data = fgetcsv($fp, 255, ",")) !== FALSE) {
    	//echo "<p>{$data[0]}</p>";
		$movieID = $data[0];
		$actorID = $data[1];
		$actorName = $data[2];
		$ranking = $data[3];

		$sql = "INSERT INTO test_table2 (movieID, actorID, actorName, ranking) VALUES ('".$movieID."', '".$actorID."', '".$actorName."', '".$ranking."')";
		//$sql = "INSERT INTO test_table2 (movieID, actorID, actorName, ranking) VALUES ('1', '1', '1', '1')";
		mysql_query($sql);
	}
	echo "<p style='color:green;'>Movie actor table populated</p>";
}

Function movieCountries(){
	@ $fp = fopen("Data/movie_actors_comma.csv", "r");
	if(!$fp){
        echo "Could not open the file!\n";
        exit();
	}
	$successful = false;
	while (($data = fgetcsv($fp, 255, ",")) !== FALSE) {
    	//echo "<p>{$data[0]}</p>";
		$movieID = $data[0];
		$country = $data[1];
		$sql = "INSERT INTO test_table2 (movieID, actorID, actorName, ranking) VALUES ('".$movieID."', '".$country."')";
		//$sql = "INSERT INTO test_table2 (movieID, actorID, actorName, ranking) VALUES ('1', '1', '1', '1')";
		if(mysql_query($sql) === TRUE){
			$successful = true;
		}else{
			$successful = false;
		}
	}
	if($successful){
		echo "<p>Movie countries table populated</p>";
	}else{
		echo "<p style='color:red;'>Movie countrie table <b>unsuccessful</b></p>";
	}
}

Function other(){
	@ $fp = fopen("Data/movie_actors_comma.csv", "r");
	if(!$fp){
        echo "Could not open the file!\n";
        exit();
	}

	while (($data = fgetcsv($fp, 255, ",")) !== FALSE) {
    	//echo "<p>{$data[0]}</p>";
		$movieID = $data[0];
		$country = $data[1];

		$sql = "INSERT INTO test_table2 (movieID, actorID, actorName, ranking) VALUES ('".$movieID."', '".$country."')";
		//$sql = "INSERT INTO test_table2 (movieID, actorID, actorName, ranking) VALUES ('1', '1', '1', '1')";
		if(mysql_query($sql) === TRUE){
			echo "<p>".$actorName." added successfully</p>";
		}else{
			echo "Error adding";
		}
	}
}




?>