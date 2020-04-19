<?php 

class Comentario
{
	public static function selecionarComentarios($idPost)
	{
		$con = Connection::getConn();

		$sql = "SELECT * FROM comentario WHERE id_postagem = :id";
		$sql = $con->prepare($sql);
		$sql->bindValue(':id', $idPost, PDO::PARAM_INT);
		$sql->execute();

		$resultado = array();
		
		while($row = $sql->fetchObject('Comentario')){
			$resultado[] = $row;
		}
		
		return $resultado;
	}

	public static function inserir($reqPost)
	{
		$con = Connection::getConn();

$sql = "INSERT INTO comentario (nome, mensagem, id_postagem) VALUES (:nome, :mensagem, :id)";

		$sql = $con->prepare($sql);
		$sql->bindValue(':nome', $reqPost['nome']);
		$sql->bindValue(':mensagem', $reqPost['mensagem']);
		$sql->bindValue(':id', $reqPost['id']);
		$sql->execute();

		if ($sql->rowCount()){
			return	true;
		}	

		throw new Exception("Falha na inserção do comentário");
		

	}
}