<?php

	class Router {

		private $path;
		public $class_name;
		public $method_name;
		private $params = array();
		private $root_url = "";

		public function __construct( $p ) {
			$this->set_path( $p );
			$this->set_root_url();
			$this->explode_path();
		}
		private function set_root_url() {
			$folder = dirname( $_SERVER[ 'PHP_SELF' ] );
			$port = isset( $_SERVER[ 'SERVER_PORT' ] ) && ! empty( $_SERVER[ 'SERVER_PORT' ] ) ? ':' . $_SERVER[ 'SERVER_PORT' ] : '';
			$protocol = isset( $_SERVER[ 'HTTPS' ] ) ? $_SERVER[ 'HTTPS' ] : 'http://';
			$this->root_url = $protocol . $_SERVER[ 'SERVER_NAME' ] . $port . $folder;
		}
		public function get_root_url() {
			return $this->root_url;
		}
		public function set_path( $p ) {
			$this->path = $p;
		}
		public function get_path() {
			return $this->path;
		}
		public function get_class() {
			if( file_exists( "controllers/" . $this->class_name . "_Controller.php" ) ) {
				return $this->class_name . "_Controller";
			} else {
				echo "Class Not Found!";
				exit;
			}
		}
		public function get_method( $controller ) {
			if( method_exists( $controller, $this->method_name ) ) {
				return $this->method_name;
			} else {
				return 'error_404';
			}
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
			if( isset( $the_path[ 1 ] ) AND ! empty( $the_path[ 1 ] ) ) {				
				$this->method_name = $the_path[ 1 ];
			} else {
				$this->method_name = 'index';				
			}

			/* get query strings */
			/*
			 * Will add will remaining vars here
			 *	
			 */
			if( isset( $the_path ) && count( $the_path ) > 2 ) {
				for( $i = 2; $i < count( $the_path ); $i++ ) {
					$this->params[] = $the_path[ $i ];
				}
			}
		} /* END of explode_path */

	}