<?php

	class Products_Controller extends Controller {

		public function _init() {}

		public function index() {
			$x = "Hello World";
			$this->set( "x", $x );
			$this->render( "products" );
		}
	}