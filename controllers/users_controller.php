<?php

	class Users_Controller extends Controller {
		public function _init() {}

		public function index() {
			$products = $this->get_all_products();
			
			$this->set( 'products', $products );
			$this->render( 'users' );
		}

		public function view() {
			echo $this->Router->class_name;			
			$this->render( 'users' );
		}
	}