<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=UTF-8');

$mysqli = new mysqli("localhost", "root", "", "mydb");
mysqli_set_charset($mysqli,"utf8");
/* comprobar la conexión */
		if ($mysqli->connect_errno) {
		    printf("Falló la conexión: %s\n", $mysqli->connect_error);
		    exit();
		}

		if ($mysqli) {						
			$sql  =" SELECT f.id,f.nombre,f.cantidad,f.precio,f.imagen_id,c.nombre";
			$sql  .=" AS categoria,i.file_name AS image";
			$sql  .=" FROM flores f";
			$sql  .=" LEFT JOIN categorias c ON c.id = f.categorias_id";
			$sql  .=" LEFT JOIN imagen i ON i.id = f.imagen_id";
			$sql  .=" ORDER BY f.id ASC";
			$flores = $mysqli->query($sql);		
			

		}else{
		die('No pudo conectarse: ' . mysqli_error());
		}

?>