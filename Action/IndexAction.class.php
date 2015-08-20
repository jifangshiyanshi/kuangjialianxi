<?php
	class IndexAction extends Action{
		function __construct(){
			
		}

		public function index(){
			echo "这个就是首页";
		}
		
		public function show( ) {
			echo "这个又是另外一个页面";
			
		}
			
		
	}