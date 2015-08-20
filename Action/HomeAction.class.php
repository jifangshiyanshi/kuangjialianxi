<?php
	class HomeAction extends Action{
		public function index(){
			$this->assign('haha','test');
			$this->display();
		}
	} 
?>