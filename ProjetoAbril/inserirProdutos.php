<?php
require_once('cabecalho.html');
	require_once('Classes/CrudProdutos.php');
	$Crud = new Crud();
if ($_POST !=null) {
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$preco = $_POST['preco'];
	$id=$Crud->insert($nome,$descricao,$preco);
		$where = 'id = '.$id;
	$listar = $Crud->read($where);

	}  else{
$listar = null;}
	?>


	      <div class="container">
<h1>Insira um produto novo aqui!</h1>
	<form class="" method="post" id="forminserir" action="">
		 <div class="col-sm-12 col-lg-7">
		<div class="form-group">
		<input  type="text" name="nome" placeholder="Digite o nome do produto" class="form-control" required=""></div>
		<div class="form-group">
		<textarea name="descricao" class="form-control" placeholder="Digite a descrição aqui" cols="50" rows="10" form="forminserir" required=""></textarea></div>  
		<div class="input-group">
 <label class="sr-only" for="preco">Amount (in dollars)</label>		
 <div class="input-group-addon">$</div>
		<input  type="text" width="10px" class="form-control" name="preco"  id="preco" placeholder="Digite o Valor do Produto" required pattern="\d+(\.\d{2})?" title="Use o formato correto exemplo: 1.00" >
		<div class="input-group-addon">.00</div>
		</div><br>
		<div class="form-group">
		<input  class="btn btn-primary" type="submit"></div>
	</form>
 </div>
	<table class="table table-hover">

	<?php
if ($listar != null ) {

		echo '<tr>
	<th>Código</th>
	<th>Nome</th>
	<th>Descrição</th>
	<th>Preço</th>
	<th colspan="4">Opções</th>
	</tr>
	
		 <tr>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$listar[0]['id'].'</td>
		 <td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$listar[0]['nome'].' </td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$listar[0]['descricao'].'</td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$listar[0]['preco'].'</td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12"><a href="editarProdutos.php?id='.$listar[0]['id'].'">Editar</a><td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12"><a href="deletarProdutos.php?id='.$listar[0]['id'].'">DELETAR</a><td>
		</tr>';
	}
	else{

		echo '<tr><td><label class="label label-info">Será mostrado o ultimo produto inserido quando incluir um novo.</label></td></tr>';
	}
	?>
	</table>
	</div>
	</div>