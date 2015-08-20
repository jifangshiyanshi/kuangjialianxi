<?php
	class MVCCore{
		
		static function init(){
			set_exception_handler("MVCCore::exception");
			set_error_handler("MVCCore::error");
			register_shutdown_function("MVCCore::shutdown");
			
			spl_autoload_register("MVCCore::autoload");
		}
		
		static function autoload($class){
			$suffix = '.class.php';
			if(substr($class,-6,6)=='Action'){
				if(is_file(ACTION_PATH.$class.$suffix)){				
					require_once ACTION_PATH.$class.$suffix;
				}else{
					echo "没有这个类";
					exit();
				}
			}else if(substr($class,-5,5)=='Model'){
				if(is_file(MODEL_PATH.$class.$suffix)){
					require_once MODEL_PATH.$class.$suffix;
				}else{
					echo "没有".MODEL_PATH.$class.$suffix;	
				}
			}else{
				if(defined('AUTOLOAD_PATH')&&AUTOLOAD_PATH!=''){
					if(is_file(AUTOLOAD_PATH.$class.$suffix)){
						require_once AUTOLOAD_PATH.$class.$suffix;
					}else{
						echo "没有".AUTOLOAD_PATH.$class.$suffix;
					}
				}
			}
		}
		
		/*
		 *  自定义错误处理
		 */
		
		static function error( $msg ) {
			$error = error_get_last();
			print_r($error);
			//echo "出错误了";
			//print_r( $msg );
			
		}
		
		/*
		 * 自定义异常处理
		 */
		static function exception( $msg ) {
			echo "出异常了";
			exit();
		}
		
		static function shutdown(  ) {
			$error = error_get_last( );
			if( isset($error) ) {
				var_dump( $error );
			}
		}
		
	}
	
?>