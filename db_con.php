<?php
/* Database config  

$db_host		= getenv('DB_HOSTNAME_UWR');
$db_user		= getenv('DB_USER_UWR');
$db_pass		= getenv('DB_PASS_UWR');
$db_database	= getenv('DB_SCHEMA_UWR'); 


Database=;Data Source=us-cdbr-azure-southcentral-f.cloudapp.net;User Id=b90cc7dd1debdf;Password=a049a30e
// End config  

$db_host		= "localhost";
$db_user		= "root";
$db_pass		= "";
$db_database	= "uwrdb";

*/


$db_host		= "us-cdbr-azure-southcentral-f.cloudapp.net";
$db_user		= "b90cc7dd1debdf";
$db_pass		= "a049a30e";
$db_database	= "uwrdb";



$con = mysqli_connect($db_host,$db_user,$db_pass,$db_database);

if (mysqli_connect_errno()){
die("Database connection failed: ". 
mysqli_connect_error()."(".mysqli_connect_errno().")"
);
}
?>