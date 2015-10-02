<?php

	class Database extends Mysqli {
		public function __construct() {
			@parent::__construct( DBHOST, DBUSER, DBPASS, DBNAME );			
			if ($this->connect_errno) {
    		die('Connect Error: ' . $this->connect_errno . " - " . $this->connect_error );
			}			
		}

		public function get_all_products() {
			return $this->query( "SELECT * FROM tbl_products" );
		}
	}