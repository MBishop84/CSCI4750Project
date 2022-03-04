<?php

$dsn = 'mysql:host=localhost;dbname=easy_insure_db';
$username = 'easyinsure1';
$password = 'easyinsureisgreat';

try {
	$db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
	$error_message = $e->getMessage();
	include('errors/easy_insure_database_error.php');
	exit();
}
?>