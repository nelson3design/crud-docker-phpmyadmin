<?php

$dbname='MYSQL_DATABASE';

$hostname='db';

$password="123456";

$username='root';

$pdo= new PDO("mysql:dbname=$dbname;host=$hostname", $username, $password);


?>