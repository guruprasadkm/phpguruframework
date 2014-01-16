<?php


	class PHPGURU_view{
		
		private $currentview = NULL;
		private $internalData = NULL;

		public function __construct($viewfile, $modulename = NULL){

			$requestView = isset($_REQUEST['c']) ? $_REQUEST['c'] : SITE_DEFAULT_SITE_MODULE;
			$modulename = isset($modulename) ? $modulename : $requestView;	
			$this->viewRequestCheck($modulename);			
			$this->currentview = SITE_ABSOLUTE_VIEW_ROOT . '/' . $modulename . '/' . $viewfile . '.php';
			$this->viewRequestFileCheck();

		}

		public function viewRequestFileCheck(){
						
			if(file_exists($this->currentview)){
				return true;
			} else {
				echo "Invalid View";
			}
			return false;			

		}	

		public function viewRequestCheck($modulename){

			if($modulename == NULL){
				echo "Invalid Request";
			} else {
				return true;
			}
			return false;

		}

		public function render($flag){
			
			foreach($this->internalData as $key=>$val){
				$$key = $val;
			}
			if($flag){
				require_once($this->currentview);
			} else {
				return file_get_contents($this->currentview);
			}
			
		}
		
		public function __get($name) {

			return $this->internalData[$name];

		}

		public function __set($name, $value) {

			$this->internalData[$name] = $value;

		}
	

	}
