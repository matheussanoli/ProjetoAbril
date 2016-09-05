<?php
require_once 'config.php';
class conexao{
	private static $con;
	public static function conectar(){
		if(!isset(self::$con)){
			try {
				self::$con = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
				self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		return self::$con;
	}
 	
	public static function prepare($sql){
		return self::getInstance()->prepare($sql);
	}
}