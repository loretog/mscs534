<?php

	class Default_Controller extends Controller {

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			$x = "Hello World";
			$this->set( "x", $x );
			$this->render( "default" );
		}
	}