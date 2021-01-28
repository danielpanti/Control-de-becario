<?php
	include_once 'conexion.php';

	if(isset($_GET['NID'])){
		$NID=(int) $_GET['NID'];

		$buscar_id=$con->prepare('SELECT * FROM rellenar WHERE NID=:NID,nombre=:nombre,carrera=:carrera,plantel=:plantel,celular=:celular,programa=:programa,horas_cubrir=:horas_cubrir LIMIT 1');
		$buscar_id->execute(array(
			':NID'=>$NID
			':nombre'=>$nombre,
				':carrera'=>$carrera,
				':plantel'=>$plantel,
					':programa'=>$programa,
				':horas_cubrir'=>$horas_cubrir
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: registro.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$carrera=$_POST['carrera'];
		$plantel=$_POST['plantel'];
		$celular=$_POST['celular'];
		$programa=$_POST['programa'];
		$horas_cubrir=$_POST['horas_cubrir'];

		if(!empty($nombre) && !empty($carrera) && !empty($plantel) && !empty($celular) && !empty($programa)  && !empty($horas_cubrir) ){
			
			
				$consulta_update=$con->prepare(' UPDATE rellenar SET  
					nombre:nombre,
					carrera:carrera,
					plantel:plantel,
					celular:celular,
					programa:programa,
					horas_cubrir:horas_cubrir
					WHERE NID=:NID;'
				);
				$consulta_update->execute(array(
					':NID'=>$NID,
					':nombre'=>$nombre,
					':carrera'=>$carrera,
					':plantel'=>$plantel,
					':celular'=>$celular,
					':programa'=>$programa,
					':horas_cubrir'=>$horas_cubrir
					

				
				));
				header('Location: index.php');
			}
		}
		else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="carrera" value="<?php if($resultado) echo $resultado['carrera']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="plantel" value="<?php if($resultado) echo $resultado['plantel']; ?>" class="input__text">
				<input type="text" name="celular" value="<?php if($resultado) echo $resultado['celular']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="programa" value="<?php if($resultado) echo $resultado['programa']; ?>" class="input__text">
				<input type="text" name="horas_cubrir" value="<?php if($resultado) echo $resultado['horas_cubrir']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
