<?php

	class Postagem 
	{
		public static function selecionaTodos()
		{
			$con = Connection::getConn();

			$sql = "SELECT * FROM postagem ORDER BY id DESC";
			$sql = $con->prepare($sql);
			$sql->execute();

			$resultado = array();

			while ($row = $sql->fetchObject('Postagem')) {
				$resultado[] = $row;
				 
			}
			if (!$resultado) {
				throw new Exception("Não foi encontrado nenhum registro no banco de dados");
			}
			return $resultado;
		}


		public static function selecionaPorId($idPost){
			$con = Connection::getConn();

			$sql = "SELECT * FROM postagem WHERE id = :id";
			$sql = $con->prepare($sql);
			$sql->bindValue(':id', $idPost, PDO::PARAM_INT); //faz a troca do parametro da função :id por $idPost  
			$sql->execute();

			$resultado = $sql->fetchObject('Postagem');

			if (!$resultado) {
				throw new Exception("Não foi encontrado nenhum registro no banco de dados");
			}else{
				$resultado->comentarios = Comentario::selecionarComentarios($resultado->id);

			}
			return $resultado;
		}


		public static function insert($dadosPost)
		{

			if(empty($dadosPost['titulo']) OR empty($dadosPost['conteudo']) ){
			throw new Exception("Preencha todos os campos");

			return false;
			}
			$con = Connection::getConn();

			$sql = $con->prepare('INSERT INTO postagem (titulo, conteudo) VALUES ( :titulo, :conteudo )');
			$sql->bindValue(':titulo', $dadosPost['titulo']);
			$sql->bindValue(':conteudo', $dadosPost['conteudo']);
			$insert_resultado = $sql->execute();

			if ($insert_resultado == 0){
				throw new Exception("Falha ao inserir publicação");
				
			}
			return true;
		}

		public static function update($params){

			$con = Connection::getConn();
			$sql = "UPDATE postagem SET tiulo = :titulo, conteudo = :conteudo WHERE id = :id";
			$sql = $con->prepare($sql);
			$sql->bindValue(':titulo', $params['titulo']);
			$sql->bindValue(':conteudo', $params['conteudo']);
			$sql->bindValue(':id', $params['id']);

			$resultado = $sql->execute();

			if($resultado == 0){
				throw new Exception("Falha ao alterar publicação");
				return false;
			}
			return true;
		}

		public static function delete($id)
		{
			$con = Connection::getConn();

			$sql = "DELETE FROM postagem WHERE id = :id";
			$sql = $con->prepare($sql);
			$sql->bindValue(':id', $id);

			$resultado = $sql->execute();

			if($resultado == 0){
				throw new Exception("Falha ao deletar publicação");
				return false;
			}
			return true;
		}

	}




?>