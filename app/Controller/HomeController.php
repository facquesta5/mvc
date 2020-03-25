<?php

	class HomeController
	{
		public function index()
		{
			$ColecPostagens = Postagem::selecionaTodos(); //Pelo fato do metodo ser estático ele vai conseguir acessar através dos dois ponto ::

			//var_dump($ColecPostagens);
		}
	}

?>