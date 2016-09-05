<?php
require_once('Classes/CrudClientes.php');
$Crud = new CrudClientes();
if ($_GET) {
	$id = $_GET['id'];
	$Crud->delete($id);
	header("Location: listarClientes.php");
}


  ?>