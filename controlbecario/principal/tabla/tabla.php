<?php
///// CONEXION A LA BASE DE DATOS /////////
$usuario='root';
$contraseña='';
$host='localhost';
$base='registro';

try {
   		$conexion = new PDO('mysql:host='.$host.';dbname='.$base, $usuario, $contraseña);
	} 
	catch (PDOException $e) 
	{
	    print "¡Error!: " . $e->getMessage() . "<br/>";
	    die();
	}
?>

<html lang="es">
	<head> 
		<title>ITIC TUTORIALES</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h3>entradas y salidas de los becarios</h3>
			</div>
		</header>

		<section>
			<table class="col-md-12">
				<tr class="bg-primary">
					<th class="pad-basic">ID </th>
					<th class="pad-basic">Nombre </th>
					<th class="pad-basic">Fecha </th>
					<th class="pad-basic">Entrada </th>
					<th class="pad-basic">Salida</th>

				<tr>

				<?php

				$query="SELECT En.ID,En.fecha,En.entrada,En.nombre,
							   Sa.ID,Sa.salida
						FROM entrada En
						INNER JOIN entrada2 Sa ON  En.ID= Sa.ID";
						
				$consulta=$conexion->query($query);
				while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
					{
					echo'
						<tr>
						<td>'.$fila['ID'].'</td>
						<td>'.$fila['nombre'].'</td>
						<td>'.$fila['fecha'].'</td>
						<td>'.$fila['entrada'].'</td>
						<td>'.$fila['salida'].'</td>
						
						</tr>
						';
					}


				?>

			</table>
		</section>
</body>
</html>

