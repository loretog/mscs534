<?php

	class Router {

		private $path;
		private $class_name;
		private $method_name;
		private $params = array();

		public function __construct( $p ) {			
			$this->set_path( $p );
			$this->explode_path();
		}
		public function set_path( $p ) {
			$this->path = $p;
		}
		public function get_path() {
			return $this->path;
		}
		public function get_class() {
			return $this->class_name;
		}
		public function get_method() {
			return $this->method_name;
		}
		public function get_params() {
			return $this->params;
		}



		private function explode_path() {

			$the_path = explode( '/', $this->path );

			/* get class name */
			if( isset( $the_path[ 0 ] ) ) {
				$this->class_name = $the_path[ 0 ];
			}

			/* get method name */
			if( isset( $the_path[ 1 ] ) ) {
				$this->method_name = $the_path[ 1 ];
			} else {
				$this->method_name = 'index';
			}

			/* get query strings */
			if( isset( $the_path ) && count( $the_path ) > 2 ) {				
				for( $i = 2; $i < count( $the_path ); $i++ ) {
					$this->params[] = $the_path[ $i ];
				}
			}
		} /* END of explode_path */

	}