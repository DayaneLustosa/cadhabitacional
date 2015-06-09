<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('include_path', '../application/models:../application/views:../application/controllers');

defined('BASE_PATH') || define('BASE_PATH', realpath(dirname(__FILE__)) . '/../application');

$base_url_concat = (strstr('localhost', $_SERVER['SERVER_NAME'])) ? "/cadhabitacional/public/" : "";
defined('BASE_URL') || define('BASE_URL', sprintf("%s://%s",
	isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	$_SERVER['SERVER_NAME'] . $base_url_concat));
require_once('../library/Autoloader.php');

$init = new Library_Init();
?>