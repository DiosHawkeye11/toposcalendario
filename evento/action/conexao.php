<?php
	class Database {
		private static $dbName 					= 'topos' ;
		private static $dbHost 					= 'localhost' ;
		private static $dbUsername = 'alex';
		private static $dbUserPassword 	= '12345';

		private static $cont  = null;



		public static function connect(){
		   // One connection through whole application
	    	if ( null == self::$cont ) {
		    	try {
		        	self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
		        }
		        catch(PDOException $e) {
		        	die($e->getMessage());
		        }
	       	}
	       	return self::$cont;
		}

		public static function disconnect() {
			self::$cont = null;
		}
	}
?>
