<?php
$host = "localhost";
$port = "5432";
$dbname = "patient";
$user = "postgres";
$password = "Raghul@29";

$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

$conn = pg_connect($conn_string);

if (!$conn) {
    echo "Connection failed: " . pg_last_error();
    exit;

}else{
     "sucsses";
}
?>