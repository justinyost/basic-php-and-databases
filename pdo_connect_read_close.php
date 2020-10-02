<?php
require_once 'db_vars.php';

function openPDOConnection()
{
	$dsn_connection_string = DATABASE . ":dbname=" . DB_NAME . ";host=" . DB_HOST;
	try {
		$pdo_connection = new PDO( $dsn_connection_string, DB_USERNAME, DB_PASSWORD ) ;
	} catch (Exception $e) {
		die('Connection Error (' . $e->getCode() . ') ' . $e->getMessage() . "\n");
	}

	echo "Connection successful\n";
	return $pdo_connection;
}

function closePDOConnection($connection)
{
	unset($connection);
}

$pdo_connection = openPDOConnection();
$statement = "SELECT * FROM `notes` LIMIT 5;";

foreach ($pdo_connection->query($statement) as $row) {
	var_dump($row);
}

closePDOConnection($pdo_connection);
