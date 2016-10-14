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

//movieActors(); //working
movies();

Function movies(){
	@ $fp = fopen("Data/movies_comma.txt", "r");
	if(!$fp){
        echo "Could not open the file!\n";
        exit();
	}
	while (($data = fgets($fp, 500)) !== FALSE) {
    	//echo "<p>{$data[0]}</p>";
		$ID = $data;
		$array = explode("\t", $data);
		echo "<p>line: ".$array[0]."</p>";
		//$sql = "INSERT INTO test_table2 (movieID, actorID, actorName, ranking) VALUES ('".$movieID."', '".$actorID."', '".$actorName."', '".$ranking."')";
		//$sql = "INSERT INTO test_table2 (movieID, actorID, actorName, ranking) VALUES ('1', '1', '1', '1')";
		//mysql_query($sql);
	}
	//echo "<p style='color:green;'>Movie actor table populated</p>";
}

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
		mysql_query($sql);
	}
	echo "<p style='color:green;'>Movie country table populated</p>";
}





?>