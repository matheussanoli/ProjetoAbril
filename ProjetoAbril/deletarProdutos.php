<?php
require_once('Classes/CrudProdutos.php');
$Crud = new Crud();
if ($_GET) {
	$id = $_GET['id'];
	$Crud->delete($id);
	header("Location: listarProdutos.php");
}


  ?>