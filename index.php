<?php
	session_start();
	if (isset($_SESSION["user"]))
		header ("Location:principal.php?cerrar=0"); 
?>
<?php
	include("bd/conexion.php");
	$conex=conectarse();
	if (isset($_POST['btn'])){
		$sql = "select cedula from usuarios where login='".$_POST['login']."' and clave=dbo.fn_encripta('".$_POST['pass']."')";
		$rs=odbc_exec($conex,$sql)or die(exit("Error en odbc_exec"));
		
		while ( odbc_fetch_row($rs) )
		{ $resultado=odbc_result($rs,"cedula");
			 
			$_SESSION["user"]=$resultado;
			header ("Location:principal.php?cerrar=0"); 
		}
		if (!empty($rs))
			$res="Disculpe login o clave incorrecta.";
	}
	odbc_close($conex);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />

<link href="stilo_acordion.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="inicio" >
		<div  id="formulario">
		  <form id="" name="form1" method="post" action="" >
		  <fieldset>
			<label>Login:</label>
			<input type="text" id="login" name="login"/>
			<label>Clave:</label>
			<input type="password" id="pass" name="pass"/>
		</fieldset>
		  <input  id="btn" type="submit" name="btn" value="Entrar" />
		  </form>
	</div>
	</div>
</body>
</html>
