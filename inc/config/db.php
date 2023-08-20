<?php
	# Import Monolog module
	require_once realpath(__DIR__ . '/../../vendor/autoload.php');
	use Monolog\Level;
	use Monolog\Logger;
	use Monolog\Handler\StreamHandler;

	# NOTE: We want to make sure that each class loads the required modules like constants.php instead of main.
	# This makes sure that code is modular.
	require_once(__DIR__ . '/constants.php');

	# Create a log channel
	$logger = new Logger('db_connector');
	$logger->pushHandler(new StreamHandler("php://stdout"));

	# Wait for the database to become available
	$maxAttempts = DB_MAX_CONN_ATTEMPTS;
	$connAttempts = 0;

	// Connect to database
	$conn = null;
	$dsn = "mysql:host=" . DB_HOSTNAME . ";port=" . DB_PORT . ";dbname=" . DB_SCHEMA;
	$logger->info("Connecting to database host: " . DB_HOSTNAME . "\n");

	while ($connAttempts < $maxAttempts) {
		try{
			
			$conn = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$logger->info("Connected to database successfully\n");
			break;
		} catch(PDOException $e){
			$logger->error("Database connection failed. Retrying in 5 seconds...\n");
			$logger->error("ERROR: $e");
			sleep(5);
			$connAttempts++;
		}
	}

	if ($connAttempts >= $maxAttempts) {
		$logger->error("Failed to connect to the database after multiple attempts. Exiting...\n");
		if ($conn) {
			$conn = null;
		}
		exit(1);
	}
?>