<?php
	
	session_start();

	require_once 'lib/router.php';
	require_once 'lib/database.php';
	require_once 'lib/controller.php';
	require_once 'lib/auth.php';

	$path = isset( $_GET[ 'path' ] ) ? $_GET[ 'path' ] : 'default/index';
	$Router = new Router( $path );

	$class = $Router->get_class();	
	
	define( 'ROOT_URL', $Router->get_root_url() );


	/*
	 * INCLDE THE CONTROLLER
	 */

	require_once 'controllers/' . $class . '.php';

	$Controller = new $class( $Router );
	$Controller->_init();	
	$method = $Router->get_method( $Controller );	
	$Controller->$method();

	unset( $_SESSION[ 'message' ] );