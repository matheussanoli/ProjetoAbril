<?php
require_once('cabecalho.html');
	require_once('Classes/CrudProdutos.php');
	$Crud = new Crud();

	
	$result = $Crud->read();
  ?><div class="container">
  <h1>Todos os produtos cadastrados</h1>
<table class="table table-hover">

	<?php
	if ($result != null ) {
		echo '<tr>
	<th>ID</th>
	<th>Nome</th>
	<th>Descrição</th>
	<th>Preço</th>
	<th colspan="4">Opções</th>
	</tr>';
	foreach ($result as $r) {
		echo '<tr>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$r['id'].'</td>
		 <td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$r['nome'].' </td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$r['descricao'].'</td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$r['preco'].'</td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12"><a href="editarProdutos.php?id='.$r['id'].'">Editar</a><td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12"><a href="deletarProdutos.php?id='.$r['id'].'">DELETAR</a><td>
		</tr>';
	}	
	}else{
		echo '<tr><td>Não existem itens para serem exibidos</td></tr>';
	}
	?>
	</table></div>
	<?php 

require_once('rodape.html'); ?>