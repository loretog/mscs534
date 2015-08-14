<?php 


	class Controller extends Database {

		protected $Registry;
		protected $Router;

		public function __construct( $r ) {
			parent::__construct();
			$this->Router = $r;			
		}
		public function set( $key, $val ) {
			$this->Registry[ $key ] = $val;
		}
		public function render( $t ) {
			if( isset( $this->Registry ) && count( $this->Registry ) > 0 ) {
				foreach( $this->Registry as $key => $val ) {
					$$key = $val;
				}
			}
			require_once 'templates/' . $t . '_template.php';
		}
	}