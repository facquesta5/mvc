<?php

	class HomeController
	{
		public function index()
		{
			try{
				$ColecPostagens = Postagem::selecionaTodos();
				//Pelo fato do metodo ser estático ele vai conseguir acessar através dos dois ponto ::

				$loader = new \Twig\Loader\FilesystemLoader('app/View');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('home.html');

				$parametros = array();
				$parametros['postagens'] = $ColecPostagens;

				$conteudo = $template->render($parametros);
				echo $conteudo;
				
			} catch (Exception $e) {
				echo "<h6 class='coment'>". $e->getMessage() ."<h6>";
			}
			
		}
	}

?>