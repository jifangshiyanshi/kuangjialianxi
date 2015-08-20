<?php
	class URLDispatch {
		
		
		private $url_separate = "/";
		
		
		public static function dispatch(){
			
			 if(isset($_SERVER['PATH_INFO'])){
			 	$pathinfo = $_SERVER['PATH_INFO'];
			 	$path = explode('/',$pathinfo);
			 	define('_MODEL_',  isset($path[1])?$path[1]:null );
			 	define('_ACTION_',  isset($path[2])?$path[2]:null );
			 }
		}
		
		
		public static function getModel( ) {
			
			
		}
		
	}
?>