<?php
	define('APPPATH', __DIR__.'/');
	define('ENV', 'development');
	if(ENV != 'development') {
		error_reporting(0);		
	}

	$GLOBALS['config'] = array();
	$GLOBALS['config']['base_file'] = 'index.php';
	$GLOBALS['config']['default_route']='home';
	$GLOBALS['config']['request_url'] = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$GLOBALS['config']['base_path'] = substr($GLOBALS['config']['request_url'], 0, strpos($GLOBALS['config']['request_url'],$GLOBALS['config']['base_file']));
	$GLOBALS['config']['base_url'] = $GLOBALS['config']['base_path'].'index.php/'; 

	// Encryption Key
	$GLOBALS['config']['encryption_key'] = 'a1a7d65cea216c5477b20495bb0b814fe2b40cb8';

	// Database
	$GLOBALS['config']['db']['host'] = 'localhost';
	$GLOBALS['config']['db']['username'] = 'root';
	$GLOBALS['config']['db']['password'] = '';
	$GLOBALS['config']['db']['database'] = 'cartify';

	$GLOBALS['db_connection'] = mysqli_connect($GLOBALS['config']['db']['host'],$GLOBALS['config']['db']['username'],$GLOBALS['config']['db']['password'],$GLOBALS['config']['db']['database']);

	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " . mysqli_connect_error());
	}

	// Required Files
	include APPPATH.'/system/functions.php';
	require APPPATH.'/system/Controller.php';

	// Route
	$parts = parse_url($GLOBALS['config']['request_url']);
	$currentFolder = explode('\\', APPPATH);
	$currentFolder = $currentFolder[count($currentFolder)-1];
	$_GET['r'] = substr($parts['path'], strpos($parts['path'], $currentFolder)+strlen($currentFolder)+1);
	if(strpos($parts['path'], $GLOBALS['config']['base_file'])) {
		$_GET['r'] = substr($parts['path'], strpos($parts['path'], $GLOBALS['config']['base_file'])+strlen($GLOBALS['config']['base_file'])+1);
	} 

	isset($_GET['r']) && $_GET['r']!= '' ? $route = strtolower(addslashes($_GET['r'])) : $route = $GLOBALS['config']['default_route'];
	$route = explode('/', $route);

	// Create instance
	$obj = sd_require_file('controllers', $route[0]);
	if(!$obj) {
		die('not a valid controller');
	}
	else {
		require $obj['path'];
	}
	$instance = new $obj['file'];
	array_splice($route, 0, 1);
	isset($route[0]) && $route[0] !='' ? $method =$route[0] : $method='index';
	array_splice($route, 0, 1);
	$params = array();
	foreach($route as $r) {
		array_push($params, urldecode($r));
	}

	// Call method
	if(!method_exists($instance, $method)) {
		die('method <tt>"'.$obj['file'].'::'.$method.'()"</tt> does not exist');
	}
	$paramCheck = new ReflectionMethod($instance, $method);
	$paramCheck = $paramCheck->getNumberOfRequiredParameters();
	if($paramCheck>count($params)) {
		for($i=count($params); $i<$paramCheck; $i++) {
			$params[$i]=null;
		}
		// die('params missing');
	}
	call_user_func_array(array($instance, $method), $params);
