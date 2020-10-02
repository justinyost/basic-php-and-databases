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

$statement = 'INSERT INTO `notes` (`text`, `title`) VALUES(:text, :title);';
$preparedStatement = $pdo_connection->prepare($statement);
$preparedStatement->execute([
	':title' => 'This is a PDO title',
	':text' => 'This is a brand new pdo text',
]);

$result = $preparedStatement->fetchAll();
var_dump($pdo_connection->lastInsertId());
var_dump($result);

$statement = "SELECT * FROM `notes` ORDER BY `id` DESC LIMIT 5;";

foreach ($pdo_connection->query($statement) as $row) {
	var_dump($row);
}

closePDOConnection($pdo_connection);
