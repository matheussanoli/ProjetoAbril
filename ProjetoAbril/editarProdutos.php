<?php 
require_once('Classes/CrudProdutos.php');
require_once('cabecalho.html');

$Crud = new Crud();
$id = $_GET['id'];
$where = 'id = '.$id;
$result = $Crud->read($where);

if ($_POST) {
	
	$Crud->update($_POST,$id);
	header('Location: listarProdutos.php');
}
 ?>
 <div class="container">
 <div class="col-sm-12 col-lg-7">
 <h1>Edição de Produtos</h1>
 	<form class="" method="post" form="forminserir" action="">
 	<div class="form-group">
	<input type="text" class="form-control" name="nome" required value="<?php echo $result[0]['nome']; ?>"></div>
	<div class="form-group">
	<textarea name="descricao" class="form-control" required><?php echo $result[0]['descricao']; ?></textarea></div>
	<div class="col-sm-12 col-lg-4">
	<div class="input-group">
	 <label class="sr-only" for="preco"></label>		
 <div class="input-group-addon">$</div>
	<input type="text" name="preco" id="preco" class="form-control" value="<?php echo $result[0]['preco']; ?>" required pattern="\d+(\.\d{2})?" title="Use o formato correto exemplo: 1.00">
	<div class="input-group-addon">.00</div>
		</div></div><br><br><br>
	<div class="form-group">
	<input type="submit" class="btn btn-primary" value="Alterar" name=""></div>
 </div>
 
</form>
<?php 

require_once('rodape.html'); ?>