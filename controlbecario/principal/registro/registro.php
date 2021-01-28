<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM rellenar ORDER BY NID DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM rellenar WHERE NID LIKE :campo OR nombre LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<a href="index.html"> <input type="submit"></a>
	<div class="contenedor">
		<h2>REGISTRAR</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar nombre " 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>NID</td>
				<td>Nombre</td>
				<td>carrera</td>
				<td>plantel</td>
				<td>celular</td>
				<td>programa</td>
				<td>horas_cubrir</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['NID']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['carrera']; ?></td>
					<td><?php echo $fila['plantel']; ?></td>
					<td><?php echo $fila['celular']; ?></td>
					<td><?php echo $fila['programa']; ?></td>
					<td><?php echo $fila['horas_cubrir']; ?></td>
					<td><a href="update.php?NID=<?php echo $fila['NID']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?NID=<?php echo $fila['NID']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>