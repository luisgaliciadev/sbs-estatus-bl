<?php


function conectarce() 
   { 
     
  
$con = mysql_connect('localhost', 'root', '');
if (!$con){
echo "Fallo la Conexión al Servidor";
$sqlerror = mysql_error($con);
echo "$sqlerror";
}

$dbSelect = mysql_select_db('web_seniat', $con);
if (!$dbSelect) {
die('No se pudo seleccionar la Base de Datos:' .mysql_error());
}

return ($con);

}



		

