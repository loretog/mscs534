<?php

	require_once 'lib/router.php';
	require_once 'lib/database.php';
	require_once 'lib/controller.php';

	$path = isset( $_GET[ 'path' ] ) ? $_GET[ 'path' ] : 'default/index';
	$router = new Router( $path );

	// execute the class and renders page!
	//$router->go();


	$class = $router->get_class();
	/*if( file_exists( "controllers/" . $class. ".php" ) ) {
		require_once "controllers/" . $class. ".php";
	} else {
		echo "class not found.";
		exit;
	}*/
	require_once 'controllers/' . $class . '.php';
	$controller = new $class( $router );
	$method = $router->get_method();
	$controller->$method();