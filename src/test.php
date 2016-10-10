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

?>