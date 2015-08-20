<?php
	class View {
		private $tags = array();
		private $left_delimiter = "<{";
		private $right_delimiter = "}>";
		private $tVar = array();
		//--找到模板地址  默认就要找到对应的模板地址
		
		public function __construct($var ){
			$this->tVar = $var;
			
		}
		
		/*
		 * 
		 */ 
		public function display(){
			
			$content = $this->getTpl();
			$content = $this->parseTpl($content);
			echo $content;
									
		}	
		
		/*
		 * 为变量赋值
		 */
		public function assign($_var,$_value ) {
			
		}
		
		/*
		 * 获取模板  类名  方法名 如果有分组 还有分组名  这个就是常量的好处
		 */
		public function getTpl( $suffix = null) {
			$_suffix = isset($suffix)?$suffix:config('TMPL_SUFFIX');
			$separator = config('URL_PATH_SEPARATOR');
			$_separator = isset( $separator )?$separator:'_';

			$tplPath = TMPL_PATH._MODEL_.$_separator._ACTION_.$_suffix;
			return  file_get_contents( $tplPath );
		}
		
		//--正则表达式匹配$符号要双斜线转意
		public function parseTpl( $content ){
			$_regular = "/".$this->left_delimiter."\\$([a-zA-Z0-9]+)".$this->right_delimiter."/i";
			$content = preg_replace( $_regular,'${1}'',$content);
			
			return $content;
		}
	}