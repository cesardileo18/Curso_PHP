<?php

require 'funciones.php';

$conexion = conexion('abmventas', 'root', '');
if (!$conexion) {
	// Terminamos con la ejecucion de la pagina si no pudimos conectar.
	// Normalmente lo que hariamos es redirigir a una pagina de error.
	die();
}


$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if (!$id) {
	header('Location: index.php');
}


// Traemos la foto
$statement = $conexion->prepare('SELECT * FROM autos WHERE idauto = :idauto');
$statement->execute(array('idauto' => $idauto));

$foto = $statement->fetch();

if (!$foto) {
	header('Location: index.php');
}

require 'views/foto.view.php';

?>