<?php

	class HomeController
	{
		public function index()
		{
			try{
				$ColecPostagens = Postagem::selecionaTodos();
				//Pelo fato do metodo ser estático ele vai conseguir acessar através dos dois ponto ::
				var_dump($ColecPostagens);
			} catch (Exception $e) {
				echo "<h6 class='coment'>". $e->getMessage() ."<h6>";
			}
			
		}
	}

?>