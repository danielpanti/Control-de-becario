<?php

$con = mysqli_connect("localhost","root","","registro"); 

if(isset($_POST['enviar'])){
        $nombre=$_POST['nombre'];
       

        if(!empty($nombre) ){
            
$sql="INSERT INTO entrada2 (nombre) values ('$nombre')";
mysqli_query($con,$sql);
                
                
            
            
       } 
       else{
            echo "<script> alert('Los campos estan vacios');</script>";
        }


}



?>


<!DOCTYPE html>
<html>
<head>
	<title>salida</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <form method="post">
    	<h1>Salida</h1>
    	<input type="text" name="nombre" id="nombre" placeholder="registre su nombre">
    	<input type="submit" name="enviar">
    </form>
        
</body>
</html>