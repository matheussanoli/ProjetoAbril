<?php 
//falta terminar
session_start();
if (!isset($_SESSION['carrinho'])) {
	$_SESSION['carrinho'] = array();
}
//Adição dos Produtos
if (isset($_GET['acao'])) {
	
// Adicionar no Carrinho
	if ($_GET['acao'] == 'add') {
		$id = intval($_GET["id"]);
		if (!isset($_SESSION['carrinho'][$id])) {
			$_SESSION['carrinho'][$id] = 1;
		} else {
			$_SESSION['carrinho'][$id] += 1;
		}
	}
	
	//Remover do Carrinho
	if ($_GET['acao'] == 'apagar'){
		$id = intval($_GET["id"]);
		if (isset($_SESSION['carrinho'][$id]))	{
			unset ($_SESSION['carrinho'][$id]);
		}
	}	
}
$Crud = new Crud();
$id = $_GET['id'];
$where = 'id = '.$id;
$result = $Crud->read($where);
 
 echo '<tr>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$r['id'].'</td>
		 <td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$r['nome'].' </td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$r['email'].'</td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12">'.$r['telefone'].'</td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12"><a href="editaClientes.php?id='.$r['id'].'">Editar</a><td>
		<td class="col-lg-4 col-sm-4 col-md-4 col-xs-12"><a href="deletarClientes.php?id='.$r['id'].'">DELETAR</a><td>
		</tr>';

		?>