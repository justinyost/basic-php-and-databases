<?php
require_once 'db_vars.php';

function openBasicConnection()
{
	$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if ($connection->connect_error) {
		die('Connection Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error . "\n");
	} else {
		echo "Connection successful\n";
	}

	return $connection;
}

function closeBasicConnection($connection)
{
	$connection->close();
}

$connection = openBasicConnection();
closeBasicConnection($connection);
