<?php
/* Database config  

$db_host		= getenv('DB_HOSTNAME');
$db_user		= getenv('DB_USER');
$db_pass		= getenv('DB_PASS');
$db_database	= getenv('DB_SCHEMA'); 

 End config  


*/
$db_host		= "localhost";
$db_user		= "root";
$db_pass		= "";
$db_database	= "uwr";


$con = mysqli_connect($db_host,$db_user,$db_pass,$db_database);

if (mysqli_connect_errno()){
die("Database connection failed: ". 
mysqli_connect_error()."(".mysqli_connect_errno().")"
);
}
?>