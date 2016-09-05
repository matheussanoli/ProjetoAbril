<?php
public function insert($nome,$descricao,$preco)
		{
			$sql = "INSERT INTO pedido ($id_pedido,$id_cliente) values (?,?)";

			$query = conexao::conectar()->prepare($sql);

			$query->execute(array($id_pedido,$id_cliente));

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
  ?>