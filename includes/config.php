<?php
    
	error_reporting(E_ALL ^ E_DEPRECATED);
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'foodmenugenerator');
    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    set_exception_handler(function ($e) {
		error_log($e->getMessage());
        exit($e->getMessage());
    });
    $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset("utf8mb4");
?>