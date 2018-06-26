<?php
$servername = "localhost";
$username = "matsihtjob_dbuser";
$password = "matsihtjob@54321";
$dbname = "matsihtjob_db";

$conn = mysql_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
	
}

else if ($conn)
{
	mysql_select_db($dbname);

}
?>



