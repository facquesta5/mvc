<?php

	abstract class Connection
	{
		private static $conn;

		public static function getConn()
		{
			$options = array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
			if(self::$conn == null){//Este if serve para que o sistema crie apenas uma instancia da classe PDO, consequentemente usando menos memória
				//Utilizamos o self pois o atributo é estático
				self::$conn = new PDO('mysql: host=localhost; dbname=mvc_crud;', 'root', '',$options);
			}
			return self::$conn;
		}
	}