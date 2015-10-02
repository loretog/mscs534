<?php

	class Default_Controller extends Controller {

		public function _init() {}

		public function index() {			
			$this->render( "default" );
		}
	}