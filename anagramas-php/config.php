<?php

define('DB_NAME', 'anagramas_php');

define('DB_USER', 'root');

define('DB_PASSWORD', 'novasenha');

define('DB_HOST', 'localhost');

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	

if ( !defined('BASEURL') )
	define('BASEURL', '/anagramas-php/');
	
if ( !defined('DBAPI') )
	define('DBAPI', ABSPATH . 'inc/database.php');

define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');

function getConnection() {
	// Instanciar uma conexão com PDO
	$conn = new PDO(
	    //'mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD
	    'mysql:host=localhost;dbname=anagramas_php', 'root', 'novasenha'
	);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $conn;
}
