<?php

	require_once 'lib/router.php';
	require_once 'lib/database.php';
	require_once 'lib/controller.php';

	$path = isset( $_GET[ 'path' ] ) ? $_GET[ 'path' ] : 'default/index';
	$router = new Router( $path );

	// execute the class and renders page!
	//$router->go();


	$class = $router->get_class() . "_Class";
	require_once "controllers/" . $class. ".php";
	$controller = new $class();
	$method = $router->get_method();
	$controller->$method();