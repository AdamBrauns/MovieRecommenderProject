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

//movies(); //working
//movieActors(); //working
//movieCountries(); //working
//movieDirectors(); //working
//movieGenres(); //working
//movieTags(); //working
//tags(); //working
user_ratedmovies();

Function movies(){ //working
	@ $fp = fopen("Data/movies_comma.txt", "r");
	if(!$fp){
        echo "Could not open the file!\n";
        exit();
	}
	while (($data = fgets($fp, 500)) !== FALSE) {
		$array = preg_split("/[\t]/", $data);
		//echo "<p>line: ".$array[1]."</p>";

		$ID = $array[0];
		$title = $array[1];
		$imdbID = $array[2];
		$spanishTitle = $array[3];
		$imdbPictureURL = $array[4];
		$year = $array[5];
		$rtID = $array[6];
		$rtAllCriticsRating = $array[7];
		$rtAllCriticsNumReviews = $array[8];
		$rtAllCriticsNumFresh = $array[9];
		$rtAllCriticsNumRotten = $array[10];
		$rtAllCriticsScore = $array[11];
		$rtTopCriticsRating = $array[12];
		$rtTopCriticsNumReviews = $array[13];
		$rtTopCriticsNumFresh = $array[14];
		$rtTopCriticsNumRotten = $array[15];
		$rtTopCriticsScore = $array[16];
		$rtAudienceRating = $array[17];
		$rtAudienceNumRatings = $array[18];
		$rtAudienceScore = $array[19];
		$rtPictureURL = $array[20];

		$sql = "INSERT INTO movies (ID, title, imdbID, spanishTitle, imdbPictureURL, year, rtID, rtAllCriticsRating, rtAllCriticsNumReviews, rtAllCriticsNumFresh, rtAllCriticsNumRotten, rtAllCriticsScore, rtTopCriticsRating, rtTopCriticsNumReviews, rtTopCriticsNumFresh, rtTopCriticsNumRotten, rtTopCriticsScore, rtAudienceRating, rtAudienceScore, rtPictureURL) 
			VALUES ('".$ID."', '".$title."', '".$imdbID."', '".$spanishTitle."', '".$imdbPictureURL."', '".$year."', '".$rtID."', '".$rtAllCriticsRating."', '".$rtAllCriticsNumReviews."', '".$rtAllCriticsNumFresh."', '".$rtAllCriticsNumRotten."', '".$rtAllCriticsScore."', '".$rtTopCriticsRating."', '".$rtTopCriticsNumReviews."', '".$rtTopCriticsNumFresh."', '".$rtTopCriticsNumRotten."', '".$rtTopCriticsScore."', '".$rtAudienceRating."', '".$rtAudienceScore."', '".$rtPictureURL."')";
		//$sql = "INSERT INTO test_table2 (movieID, actorID, actorName, ranking) VALUES ('1', '1', '1', '1')";
		mysql_query($sql);
	}
	echo "<p style='color:green;'>Movie actor table populated</p>";
}

Function movieActors(){ //working 
	@ $fp = fopen("Data/movie_actors_comma.csv", "r");
	if(!$fp){
        echo "Could not open the file!\n";
        exit();
	}
	while (($data = fgetcsv($fp, 255, ",")) !== FALSE) {
		$movieID = $data[0];
		$actorID = $data[1];
		$actorName = $data[2];
		$ranking = $data[3];

		$sql = "INSERT INTO movie_actors (movieID, actorID, actorName, ranking) VALUES ('".$movieID."', '".$actorID."', '".$actorName."', '".$ranking."')";
		//$sql = "INSERT INTO test_table2 (movieID, actorID, actorName, ranking) VALUES ('1', '1', '1', '1')";
		mysql_query($sql);
	}
	echo "<p style='color:green;'>Movie actor table populated</p>";
}

Function movieCountries(){ //working
	@ $fp = fopen("Data/movie_countries_comma.csv", "r");
	if(!$fp){
        echo "Could not open the file!\n";
        exit();
	}
	while (($data = fgetcsv($fp, 255, ",")) !== FALSE) {
    	//echo "<p>{$data[0]}</p>";
		$movieID = $data[0];
		$country = $data[1];
		$sql = "INSERT INTO movie_countries (movieID, country)	VALUES ('".$movieID."', '".$country."')";
		mysql_query($sql);
	}
	echo "<p style='color:green;'>Movie country table populated</p>";
}

Function movieDirectors(){ //working
	@ $fp = fopen("Data/movie_directors_comma.csv", "r");
	if(!$fp){
        echo "Could not open the file!\n";
        exit();
	}
	while (($data = fgetcsv($fp, 255, ",")) !== FALSE) {
		$movieID = $data[0];
		$directorID = $data[1];
		$directorName = $data[2];

		$sql = "INSERT INTO movie_directors (movieID, directorID, directorName) VALUES ('".$movieID."', '".$directorID."', '".$directorName."')";
		//$sql = "INSERT INTO test_table2 (movieID, actorID, actorName, ranking) VALUES ('1', '1', '1', '1')";
		mysql_query($sql);
	}
	echo "<p style='color:green;'>Movie director table populated</p>";
}

Function movieGenres(){ //working
	@ $fp = fopen("Data/movie_genres_comma.csv", "r");
	if(!$fp){
        echo "Could not open the file!\n";
        exit();
	}
	while (($data = fgetcsv($fp, 255, ",")) !== FALSE) {
    	//echo "<p>{$data[0]}</p>";
		$movieID = $data[0];
		$genre = $data[1];
		$sql = "INSERT INTO movie_genres (movieID, genre)	VALUES ('".$movieID."', '".$genre."')";
		mysql_query($sql);
	}
	echo "<p style='color:green;'>Movie genre table populated</p>";
}

Function movieTags(){ //working
	@ $fp = fopen("Data/movie_tags_comma.csv", "r");
	if(!$fp){
        echo "Could not open the file!\n";
        exit();
	}
	while (($data = fgetcsv($fp, 255, ",")) !== FALSE) {
		$movieID = $data[0];
		$tagID = $data[1];
		$tagWeight = $data[2];

		$sql = "INSERT INTO movie_tags (movieID, tagID, tagWeight) VALUES ('".$movieID."', '".$tagID."', '".$tagWeight."')";
		//$sql = "INSERT INTO test_table2 (movieID, actorID, actorName, ranking) VALUES ('1', '1', '1', '1')";
		mysql_query($sql);
	}
	echo "<p style='color:green;'>Movie tags table populated</p>";
}

Function tags(){ //working  
	@ $fp = fopen("Data/tags_comma.csv", "r");
	if(!$fp){
        echo "Could not open the file!\n";
        exit();
	}
	while (($data = fgetcsv($fp, 255, ",")) !== FALSE) {
		$ID = $data[0];
		$value = $data[1];
		$sql = "INSERT INTO tags (ID, value) VALUES ('".$ID."', '".$value."')";
		mysql_query($sql);
	}
	echo "<p style='color:green;'>Tags table populated</p>";
}

Function user_ratedmovies(){ 
	@ $fp = fopen("Data/user_ratedmovies_comma.csv", "r");
	if(!$fp){
        echo "Could not open the file!\n";
        exit();
	}
	while (($data = fgetcsv($fp, 255, ",")) !== FALSE) {
		$UserID = $data[0];
		$movieID = $data[1];
		$rating = $data[2];
		$date_day = $data[3];
		$date_month = $data[4];
		$date_year = $data[5];
		$date_hour = $data[6];
		$date_minute = $data[7];
		$date_second = $data[8];

		echo "<p> ".$UserID."</p>";
		//$sql = "INSERT INTO user_ratedmovies (UserID, movieID, rating, date_day, date_month, date_year, date_hour, date_minute, date_second) VALUES ('".$UserID."', '".$movieID."', '".$rating."', '".$date_day."', '".$date_month."', '".$date_year."', '".$date_hour."', '".$date_minute."', '".$date_second."')";
		//$sql = "INSERT INTO test_table2 (movieID, actorID, actorName, ranking) VALUES ('1', '1', '1', '1')";
		//mysql_query($sql);
	}
	echo "<p style='color:green;'>User rated movies table populated</p>";
}

?>