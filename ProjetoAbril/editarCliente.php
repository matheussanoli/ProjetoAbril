<?php 
require_once('Classes/CrudClientes.php');
require_once('cabecalho.html');

$Crud = new CrudClientes();
$id = $_GET['id'];
$where = 'id = '.$id;
$result = $Crud->read($where);

if ($_POST) {
	
	$Crud->update($_POST,$id);
	header('Location: listarProdutos.php');
}
 ?>
 <form class="form-control" method="post" form="forminserir" action="">
	<input type="text" name="nome" value="<?php echo $result[0]['nome']; ?>">
	<input type name="descricao" value="<?php echo $result[0]['email']; ?>">	 
	<input type="text" name="preco" value="<?php echo $result[0]['telefone']; ?>">
	<input type="submit" class="btn btn-primary" name="">
</form>