<?php

	abstract class Connection
	{
		private static $conn;

		public static function getConn()
		{
			if(self::$conn == null){//Este if serve para que o sistema crie apenas uma instancia da classe PDO, consequentemente usando menos memória
				//Utilizamos o self pois o atributo é estático
				self::$conn = new PDO('mysql: host=localhost; dbname=mvc_crud;', 'root', '');
			}
			return self::$conn;
		}
	}