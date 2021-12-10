<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pswd = "";

$conn = mysql_connect($host,$user,$pswd) or 
die ("Error connecting to MySQL");
echo " ";

$dbname = "system1";
mysql_select_db($dbname) or die ("error connecting to Database : ".$dbname);
echo "";
?>