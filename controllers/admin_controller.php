<?php

	class Admin_Controller extends Controller {
		public function _init() {
			if( ! isset( $_SESSION[ 'Admin.id' ] ) ) {
				if( $this->Router->method_name != "login" ) {
					$this->redirect( 'admin/login' );
				}
			}
		}
		public function index() {
			$this->render( 'admin' );
		}
		public function products() {
			if( isset( $_POST ) && ! empty( $_POST ) ) {
				$products = "'" . implode( "','", $_POST[ 'products' ] ) . "'";
				if( $this->query( "DELETE FROM tbl_products WHERE SKU IN ( $products )" ) ) {
					$_SESSION[ 'message' ] = array( 'success', 'Record(s) successfully deleted.' );
				} else {
					$_SESSION[ 'message' ] = array( 'danger', 'Failed to delete record(s). ' . $this->error );
				}
			}

			$products = $this->query( "SELECT * FROM tbl_products AS P LEFT JOIN tbl_category AS C ON P.CategoryID = C.CategoryID ORDER BY P.ProductName ASC" );
			$this->set( 'products', $products );
			$this->render( 'admin' );
		}
		public function add_product() {
			if( isset( $_POST ) && ! empty( $_POST ) ) {
				$SKU = $_POST[ 'SKU' ];
				$ProductName = $_POST[ 'ProductName' ];
				$CategoryID = $_POST[ 'CategoryID' ];
				$Price = $_POST[ 'Price' ];
				$Cost = $_POST[ 'Cost' ];
				$Color = $_POST[ 'Color' ];
				$Height = $_POST[ 'Height' ];
				$Width = $_POST[ 'Width' ];
				$q = "INSERT INTO tbl_products ( SKU, ProductName, CategoryID, Price, Cost, Color, Height, Width ) VALUES( '$SKU', '$ProductName', '$CategoryID', $Price, $Cost, '$Color', $Height, $Width )";
				if( $this->query( $q ) ) {
					$_SESSION[ 'message' ] = array( 'success', 'Product added' );
				} else {
					$_SESSION[ 'message' ] = array( 'danger', 'Failed to add Product. ' . $this->error );
				}
			}
			$categories = $this->query( "SELECT * FROM tbl_category ORDER BY ProductCategory" );
			$this->set( 'categories', $categories );
			$this->render( 'admin' );	
		}
		public function orders() {
			$this->render( 'admin' );
		}		
		public function categories() {
			if( isset( $_POST ) && ! empty( $_POST ) ) {
				$categories = implode( ",", $_POST[ 'categories' ] );
				if( $this->query( "DELETE FROM tbl_category WHERE CategoryID IN ( $categories )" ) ) {
					$_SESSION[ 'message' ] = array( 'success', 'Record(s) successfully deleted.' );
				} else {
					$_SESSION[ 'message' ] = array( 'danger', 'Failed to delete record(s). ' . $this->error );
				}
			}

			$categories = $this->query( "SELECT * FROM tbl_category ORDER BY ProductCategory ASC" );
			$this->set( 'categories', $categories );
			$this->render( 'admin' );
		}
		public function add_category() {
			if( isset( $_POST ) && ! empty( $_POST ) ) {
				$ProductCategory = $_POST[ 'ProductCategory' ];
				$Description = $_POST[ 'Description' ];
				$q = "INSERT INTO tbl_category ( ProductCategory, Description ) VALUES( '$ProductCategory', '$Description')";				
				if( $this->query( $q ) ) {
					$_SESSION[ 'message' ] = array( 'success', 'Category added' );
				} else {
					$_SESSION[ 'message' ] = array( 'danger', 'Failed to add Category' . $this->error );
				}
			}
			$this->render( 'admin' );	
		}
		public function edit_category() {
			$param = $this->Router->get_params();
			$id = isset( $param[0] ) ? $param[0] : null;
			if( isset( $_POST ) && ! empty( $_POST ) ) {
				$ProductCategory = $_POST[ 'ProductCategory' ];
				$Description = $_POST[ 'Description' ];
				if( $this->query( "UPDATE tbl_category SET ProductCategory = '$ProductCategory', Description = '$Description' WHERE CategoryID = $id" ) ) {
					$_SESSION[ 'message' ] = array( 'success', 'Category updated' );
				} else {
					$_SESSION[ 'message' ] = array( 'danger', 'Failed to update Category' . $this->error );
				}
			}			
			$category = $this->query( "SELECT * FROM tbl_category WHERE CategoryID = $id LIMIT 1" )->fetch_object();
			$this->set( 'category', $category);
			$this->render( 'admin' );	
		}
		public function customers() {
			$this->render( 'admin' );
		}
		public function login() {
			if( isset( $_POST[ 'action' ] ) && ! empty( $_POST[ 'action' ] ) && $_POST[ 'action' ] == "admin_login" ) {
				$username = $_POST[ 'username' ];
				$password = md5( $_POST[ 'password' ] );
				$q = "SELECT * FROM tbl_admin WHERE Uname = '$username' AND PWord = '$password' LIMIT 1";
				$result = $this->query( $q );
				if( $result->num_rows ) {					
					$admin = $result->fetch_object();
					$_SESSION[ 'Admin.id' ] = $admin->UserID;
					$_SESSION[ 'Admin.username' ] = $admin->Uname;
					$this->redirect( 'admin' );					
				} else {					
					$_SESSION[ 'message' ] = array( "danger", "Invalid login." );
				}
			}
			$this->render( 'admin_login' );
		}
		public function logout() {
			session_destroy();
			$this->redirect( 'admin/login' );
		}
	}