<?php 

	include_once 'conexion.php';
	if(isset($_GET['NID'])){
		$NID=(int) $_GET['NID'];
		$delete=$con->prepare('DELETE FROM rellenar WHERE NID=:NID');
		$delete->execute(array(
			':NID'=>$NID,
				
		));
		header('Location: registro.php');
	}else{
		header('Location: registro.php');
	}
 ?>