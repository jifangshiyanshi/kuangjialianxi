<?php
	function show_trace( ){
		
		$trace = debug_backtrace();
		foreach($trace as $key => $subtrace){
			echo "<br />";
			echo "file=>";
			echo	isset($subtrace['file'])?$subtrace['file']:' ';
			echo "&nbsp;&nbsp;&nbsp;";
			echo "function=>";
			echo    isset($subtrace['function'])?$subtrace['function']:' ';
			echo "<br />";
			/*
			 echo $key."=>";
			var_dump( $subtrace );
			echo "<br /><br />";
			*/
		}
	}
	
	
	function config( $name ,$value= ''){
		static $_config = array();
		if( is_string($name) ) {
			if( empty($value) ) return isset($_config[$name])?$_config[$name]:'';
			else  $_config[$name] = $value;			
		}elseif( is_array($name) ){
			$_config = array_merge( $_config, $name );
			return;
		}
		return;
	}