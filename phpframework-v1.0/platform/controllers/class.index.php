<?php

	class index extends PHPGURU_controller{

		public function __construct(){			
			
		}

		public function index(){ 

			$view = new PHPGURU_view('index');
			$view->param1 = 'secret';
			$view->render(true);

		}
		
		public function test(){ echo ' index';}


	}


?>
