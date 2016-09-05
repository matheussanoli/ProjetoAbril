<?php
require_once('cabecalho.html');
	require_once('Classes/CrudClientes.php');
	$Crud = new CrudClientes();
if ($_POST !=null) {
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$id=$Crud->insert($nome,$email,$telefone);
		$where = 'id = '.$id;
	$listar = $Crud->read($where);

	}  else{
$listar = null;}
	?>


	        <div class="container">
	         <div class="col-sm-12 col-lg-7">
<h1>Insira um Cliente novo aqui!</h1>
	<form class="" method="post" id="forminserir" action="">
		
		<div class="form-group">
		<input  type="text" name="nome" placeholder="Digite o nome do Cliente" class="form-control" required=""></div>
		<div class="input-group">
		<label class="sr-only" for="email">A</label>
		 <div class="input-group-addon">@</div>
	<input type="email" name="email" id="email" class="form-control" required="">
	</div><br>
		<div class="form-group">
		<input  type="text"  class="form-control" name="telefone"  id="telefone" placeholder="Digite o Telefone" required title="Apenas numeros exemplo: xxxxxxxxxx" maxlength="9" minlength="9"  pattern="[0-9]+$" />	
		
		</div>
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
	<th>E-mail</th>
	<th>Telefone</th>
	<th colspan="4">Opções</th>
	</tr>
	
		 <tr>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$listar[0]['id'].'</td>
		 <td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$listar[0]['nome'].' </td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$listar[0]['email'].'</td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$listar[0]['telefone'].'</td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12"><a href="editarCliente.php?id='.$listar[0]['id'].'">Editar</a><td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12"><a href="deletarClientes.php?id='.$listar[0]['id'].'">DELETAR</a><td>
		</tr>';
	}
	else{

		echo '<tr><td><label class="label label-info">Será mostrado o ultimo produto inserido quando incluir um novo.</label></td></tr>';
	}
	?>
	</table>
	</div>
	</div>
	<?php 

require_once('rodape.html'); ?>