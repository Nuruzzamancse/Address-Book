<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'address_book';

//Set DSN
$dsn = 'mysql:host='.$host .';dbname='.$dbname;

//Create a PDO instance

$DB = new PDO($dsn,$user,$password);

$DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
$DB->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

?>