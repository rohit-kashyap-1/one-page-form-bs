<?php

/*
$host = "localhost";
$user = "";
$password = '';
$dbname = "";

*/


$host = "localhost";
$user = "root";
$password = '';
$dbname = "mh";

//set DSN
$dsn = 'mysql:host='.$host.';dbname='.$dbname;

//create PDO instance

$pdo = new PDO($dsn,$user,$password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

?>