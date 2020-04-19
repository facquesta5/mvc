<?php

	class Core
	{
		public function start($urlGet)
		{

			if (isset($urlGet['metodo']) ){
				$acao = $urlGet['metodo'];
			} else{
				$acao = 'index'; //será o nome do método	
			}
			

			if(isset($urlGet['pagina'])){//verifica se a url acessada existe
				$controller = ucfirst($urlGet['pagina']).'Controller';//1//todas as páginas vão ter a inicial pagina para receber um parametro que será o nome da controller
			}else{//caso a url não exista ele direciona para a home do site
				$controller = 'HomeController';
			}
			
			
			
			if(!class_exists($controller)){
				$controller = 'ErroController';
			}
			
			if (isset($urlGet['id']) && $urlGet['id'] != null){
				$id = $urlGet['id'];
			} else{
				$id = null;
			}
			//echo $controller;
			call_user_func_array(array(new $controller, $acao), array('id'=> $id));
		}
	}

?>