<?php
	define("CORE_PATH",dirname(__FILE__).'/');
	define("MODEL_PATH",CORE_PATH."../Model/");
	define("ACTION_PATH",CORE_PATH."../Action/");
	define("VIEW_PATH",CORE_PATH."../View/");
	define("TMPL_PATH",CORE_PATH."../Tpl/");
	define("CORE_CONFIG_PATH",CORE_PATH."Conf/");
	
	
	function load_runtime_file( ) {
		$file = array(
				CORE_PATH."MVCCore.class.php",
				CORE_PATH."App.class.php",
				CORE_PATH."URLDispatch.class.php",
				CORE_PATH."functions.php",
				CORE_PATH."Action.class.php",
				VIEW_PATH."View.class.php"
		);
		
		foreach( $file as $val ){
			require_once $val;
		}
		
		config( require_once( CORE_CONFIG_PATH."coreconfig.php") );
	}
	
	
	load_runtime_file();
	
	MVCCore::init();
	App::start();
	App::exec();
	
?>