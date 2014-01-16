<?php

	class PHPGURU_dbloader{

		public function getDBConnection($dbDetails, $i){			
			
			$db = ADONewConnection($dbDetails[$i]['driver']);
			$db->debug = true;
			$db->PConnect($dbDetails[$i]['server'], $dbDetails[$i]['user'], $dbDetails[$i]['password'], $dbDetails[$i]['database']);		
			return $db;
	
		}

	}


?>
