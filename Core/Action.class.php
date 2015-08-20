<?php
	abstract class Action{
		private $view = null;
		
		private $tVar = array();
		
		/*
		 * 显示模板
		 */
		public function display(){
			$this->view = new View();
			$this->view->display();
		}
		
		/*
		 * 给模板变量赋值
		 */
		public function assign( $_var, $_value ){
			if( is_string( $_var ) ) {
				$this->tVar[$_var] = isset($_value)?$_value:'';
				return;	
			}
			return;
		}
		
	}