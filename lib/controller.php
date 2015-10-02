<?php 

	abstract class Controller extends Database {

		protected $Registry;
		public $Router;

		abstract protected function index();
		abstract protected function _init();

		public function __construct( $router ) {
			$this->Router = $router;
			parent::__construct();			
		}
		public function set( $key, $val ) {
			$this->Registry[ $key ] = $val;
		}

		/*
		 * Loads the content for the method
		 */
		public function render( $t ) {
			/*
			 * Load the variables!
			 */
			if( isset( $this->Registry ) && count( $this->Registry ) > 0 ) {
				foreach( $this->Registry as $key => $val ) {
					$$key = $val;
				}
			}

			/*
			 * Get the content of the view or the method
			 */
			$THE_VIEW = "";
			if( file_exists( "views/" . $this->Router->class_name . "/" . $this->Router->method_name . ".php" ) ) {
				ob_start();
				include "views/" . $this->Router->class_name . "/" . $this->Router->method_name . ".php";
				$THE_VIEW = ob_get_clean();
			}

			$THE_MESSAGE = "";
			if( isset( $_SESSION[ 'message' ] ) && ! empty( $_SESSION[ 'message' ] ) ) {
				$THE_MESSAGE = "<div class='alert alert-{$_SESSION[ 'message' ][ 0 ]}' role='alert'>{$_SESSION[ 'message' ][ 1 ]}</div>";
			}

			/*
			 * Load the template
			 */
			require_once 'templates/' . $t . '_template.php';
		}
		public function error_404() {
			echo "Page not found";
		}
		public function redirect( $url = '' ) {
			header( "Location: " . ROOT_URL . "/$url" ); exit;
		}
	}