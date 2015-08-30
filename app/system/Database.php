<?php

/*
* Class Database
*
* Use it like this:
* $database = DatabaseFactory::getFactory()->getConnection();
*
* http://stackoverflow.com/questions/130878/global-or-singleton-for-database-connection
*/

class Database {

	private static $factory;
	private $database;

	public static function getFactory()
	{
		if (!self::$factory) {
			self::$factory = new Database();
		}
		return self::$factory;
	}

	public function getConnection() {
		if (!$this->database) {
      try {
			  $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
			  $this->database = new PDO(
				  Config::get('DB_TYPE') . ':host=' . Config::get('DB_HOST') . ';dbname=' .
				  Config::get('DB_NAME') . ';port=' . Config::get('DB_PORT') . ';charset=' . Config::get('DB_CHARSET'),
				  Config::get('DB_USER'), Config::get('DB_PASS'), $options
			  );
		  } catch(PDOException $e) {
		    return false;
      }
		}
		return $this->database;
	}
}
