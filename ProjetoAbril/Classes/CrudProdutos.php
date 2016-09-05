	<?php 
	include_once('conexao.php');

	class Crud
	{
		public function insert($nome,$descricao,$preco)
		{
			$sql = "INSERT INTO produto (nome,descricao,preco) values (?,?,?)";

			$query = conexao::conectar()->prepare($sql);

			$query->execute(array($nome,$descricao,$preco));

			$id = conexao::conectar()->lastInsertId();

			return $id;
		}
		public function read($where = null)
		{
			$sql = "SELECT * FROM produto";

	if (!empty($where))
	 {
		$sql .=" WHERE " . $where;
	}
			
			$query = conexao::conectar()->prepare($sql);

			$query->execute();

			if($query->rowCount()>0)
			{
			while($res = $query->fetch(PDO::FETCH_ASSOC))
			 {
				$r[]=$res;
			}
		
		return $r;

		}else
		{
					return false;
		}
	}
	public function update($dados,$id){
	$sql = "UPDATE produto SET ";

	 foreach ($dados as $key => $val){
	 	$col[] = $key. ' = ?';
	 	$valores[] = $val;
	 	 }

	 	 $str = implode(",",$col);

		 	 $sql .= $str;

		 	 $sql.= "WHERE id = ?";

		 	 $valores[] = $id;

		 	 $query = conexao::conectar()->prepare($sql);

		 	 $query->execute($valores);

	}
public function delete($id){
$sql = "DELETE FROM produto WHERE id = ?";
$query = conexao::conectar()->prepare($sql);
$query->execute(array($id));
}
	}

	 ?>	
