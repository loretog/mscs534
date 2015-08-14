<?php

	class About_Controller extends Controller {
		public function __construct( $r ) {
			parent::__construct( $r );
		}
		public function index() {
			$p = $this->Router->get_params();
			echo $p[0];
			$this->render( 'about' );
		}
	}