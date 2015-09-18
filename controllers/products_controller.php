<?php

	class Products_Controller extends Controller {

		/*public function __construct( $r ) {
			parent::__construct( $r );
		}*/

		public function index() {
			$x = "Hello World";
			$this->set( "x", $x );
			$this->render( "products" );
		}
	}