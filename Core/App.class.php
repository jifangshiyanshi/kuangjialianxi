<?php
	class App{
		
		public static function start(){
			//--获取要访问的类
			//--执行类中的的方法
			URLDispatch::dispatch();
			
		}
		
		public static function exec(){

			if( defined('_MODEL_')&& defined('_ACTION_') ) {
				$rc = new ReflectionClass(_MODEL_.'Action');
				$action = $rc->newInstance();
				$function = new ReflectionMethod($action,_ACTION_);
				$function ->invoke($action);
			}
		}
	}
	
	
?>