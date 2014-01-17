<?php

	class PHPGURU_bootloader{

		private function __construct(){} //Cannot be instantiated		

		private function getSiteAbsoluteHttpRoot(){

			$http_app_path = 'http://'.$_SERVER['HTTP_HOST'];
			if(isset($_SERVER['HTTP_PORT'])){
				$http_app_path .= ':'.$_SERVER['HTTP_PORT'];
			}
			$http_app_path .= preg_replace('/'.basename($_SERVER['PHP_SELF']).'/', '', $_SERVER['PHP_SELF']);
			return $http_app_path;
			
		}

		static function initSiteConstants(){				
			
			define('SITE_ABSOLUTE_HTTP_ROOT', PHPGURU_bootloader :: getSiteAbsoluteHttpRoot());
			define('SITE_ABSOLUTE_PLATFORM_ROOT', SITE_ABSOLUTE_FILE_ROOT . "/platform");
			define('SITE_ABSOLUTE_LIBRARY_ROOT', SITE_ABSOLUTE_PLATFORM_ROOT . "/library");			
			define('SITE_ABSOLUTE_CONTROLLER_ROOT', SITE_ABSOLUTE_PLATFORM_ROOT . "/controllers");
			define('SITE_ABSOLUTE_MODEL_ROOT', SITE_ABSOLUTE_PLATFORM_ROOT . "/models");
			define('SITE_ABSOLUTE_VIEW_ROOT', SITE_ABSOLUTE_PLATFORM_ROOT . "/views");
			return;

		}

		static function autoLoad(){

			// directory setup and class loading
			set_include_path('.' 
				. PATH_SEPARATOR . SITE_ABSOLUTE_LIBRARY_ROOT.'/'			
				. PATH_SEPARATOR . SITE_ABSOLUTE_CONTROLLER_ROOT . '/'				
				. PATH_SEPARATOR . SITE_ABSOLUTE_MODEL_ROOT . '/'
				. PATH_SEPARATOR . get_include_path()
			);
			
			function __autoload($class_name) {
				$class_name = preg_replace('/_/', '.', strtolower($class_name));
			    	include "class.".$class_name . ".php";
			}	
			return;		
			
		}

		static function staticIncludes(){

			require_once SITE_ABSOLUTE_FILE_ROOT . "/php-custom-ext/functions.php";
			require_once SITE_ABSOLUTE_FILE_ROOT . "/php-custom-ext/custom-definitions.php";
			require_once SITE_ABSOLUTE_LIBRARY_ROOT . "/adodb5/adodb.inc.php";
			
		}

		static function getDefaultModule(){
			
			define('SITE_DEFAULT_SITE_MODULE', 'index');
			return;

		}

		static function getDBConnection($dbDetails){
			
			for($i=0; $i< count($dbDetails); $i++){				
				$dbObject = new PHPGURU_dbloader();
				$db[$i] = $dbObject->getDBConnection($dbDetails, $i);
			}
			return $db;
	
		}

	}


?>
