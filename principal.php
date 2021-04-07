<?php
	session_start();
	if (!isset($_GET["cerrar"]))
		$_GET["cerrar"]="";
	if ($_GET["cerrar"]==1)
		unset($_SESSION['user']);
		
	if (!isset($_SESSION["user"]))
		header ("Location:index.php"); 
		
	include("bd/conexion.php");
	$conex=conectarse();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="wrap">
	<div id="header">
		
	</div>
	<div id="contenido">
	  <?php
	  	if (!isset($_GET['link']))
			include("inicio.php");
		else
			include($_GET['link']);
	  ?>
  </div>
	<div id="footer"> 
	  <p><a href="principal.php?cerrar=1">cerrar sesion</a></p>
	  <p>Bolivariana de Puertos (BOLIPUERTOS), S.A. - Rif: 
							J-29759907-0<br />
Ministerio del Poder Popular para Transporte y 
	  Comunicaciones</p>
	  <p>2011<span lang="es-ve" xml:lang="es-ve"> ---</span> <span lang="es-ve" xml:lang="es-ve">Todos los Derechos</span>.</p>
	</div>
</div>

</body>
</html>
