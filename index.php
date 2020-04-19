<?php
require_once 'app/Core/Core.php';
require_once 'lib/Database/Connection.php';

require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';
require_once 'app/Controller/PostController.php';
require_once 'app/Controller/PostController.php';
require_once 'app/Controller/SobreController.php';
require_once 'app/Controller/AdminController.php';

require_once 'app/Model/Postagem.php';
require_once 'app/Model/Comentario.php';

require_once 'vendor/autoload.php';



$template = file_get_contents('app/Template/estrutura.php');

ob_start();//Inicio * Função para pegar o retorno do método e armazenar em uma variável
	$core = new Core;
	$core->start($_GET);//Global $_GET captura o index e o valor ['index'=>'valor'] no dominio que esta sendo acessado
	$saida = ob_get_contents();//para pegar o conteúdo que retornou da linha $core->start($_GET)
ob_end_clean();//Encerra * o trecho de código

$template_pronto = str_replace('{{area_dinamica}}', $saida, $template);

echo $template_pronto;
?>