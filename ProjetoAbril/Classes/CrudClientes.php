
<?php 
	include_once('conexao.php');

	class CrudClientes
	{
		public function insert($nome,$email,$telefone)
		{
			$sql = "INSERT INTO cliente (nome,email,telefone) values (?,?,?)";

			$query = conexao::conectar()->prepare($sql);

			$query->execute(array($nome,$email,$telefone));

			$id = conexao::conectar()->lastInsertId();

			return $id;
		}
		public function read($where = null)
		{
			$sql = "SELECT * FROM cliente";

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
	$sql = "UPDATE cliente SET ";

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
$sql = "DELETE FROM cliente WHERE id = ?";
$query = conexao::conectar()->prepare($sql);
$query->execute(array($id));
}
	}

	 ?>	


