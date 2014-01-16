<?php

	class PHPGURU_application{

		private function __construct(){} //Cannot be instantiated

		static function init(){
			
			$_default_controller = 'index';
			$_request_controller = isset($_REQUEST['c']) ? $_REQUEST['c'] : NULL;
			$_request_section = isset($_REQUEST['s']) ? $_REQUEST['s'] : 'index';

			//Pick the controller
			if(isset($_request_controller)){
				if(file_exists(SITE_ABSOLUTE_CONTROLLER_ROOT . '/class.' . $_request_controller . '.php')){
					$current_controller = new $_request_controller;
				} else {
					//$current_controller = NULL;
					//echo 'FILE class.'.$_request_controller.'.php does not exists.';

					$current_controller = new $_default_controller;
				}
			} else {
				$current_controller = new $_default_controller;
			}

			//Pick the controller Method
			$current_controller->$_request_section();

			return;
			
		}


	}

