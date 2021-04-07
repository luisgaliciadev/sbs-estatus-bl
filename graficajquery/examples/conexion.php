<?php
	function conectarse(){
	//$dsn = "Driver={SQL Server};Server=bppc-sql2008;Database=ARIES;Integrated Security=SSPI;Persist Security Info=False;";//"bppc";
	$dsn = "bppc";
	//debe ser de sistema no de usuario
	$usuario = "aries";
	$clave="aries";
	
	//realizamos la conexion mediante odbc
	$cid=odbc_connect($dsn, $usuario, $clave);
	
		if (!$cid){
			exit("<strong>Ha ocurrido un error tratando de conectarse con el origen de datos.</strong>");
		}else{
			return $cid;
		}
	}
?>

