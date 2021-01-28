<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$carrera=$_POST['carrera'];
		$plantel=$_POST['plantel'];
		$celular=$_POST['celular'];
		$programa=$_POST['programa'];
		$horas_cubrir=$_POST['horas_cubrir'];

		if(!empty($nombre) && !empty($carrera) && !empty($plantel) && !empty($celular) && !empty($programa)  && !empty($horas_cubrir) ){
			
			$consulta_insert=$con->prepare('INSERT INTO rellenar(nombre,carrera,plantel,celular,programa,horas_cubrir) VALUES(:nombre,:carrera,:plantel,:celular,:programa,:horas_cubrir)');
				$consulta_insert->execute(array(
					':nombre'=>$nombre,
					':carrera'=>$carrera,
					':plantel'=>$plantel,
					':celular'=>$celular,
					':programa'=>$programa,
					':horas_cubrir'=>$horas_cubrir
				
				));
				header('Location: registro.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="carrera" placeholder="carrera" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="plantel" placeholder="plantel" class="input__text">
				<input type="text" name="celular" placeholder="celular" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="programa" placeholder="programa" class="input__text">
				<input type="text" name="horas_cubrir" placeholder="horas_cubrir" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
