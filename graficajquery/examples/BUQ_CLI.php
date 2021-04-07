 <?php
include("conexion.php");
$con = conectarse();
$dsn = "bppc";
	//debe ser de sistema no de usuario
	$usuario = "aries";
	$clave="aries";
$connect= odbc_connect($dsn, $usuario, $clave);
/*$query="SELECT DISTINCT(DS_PRODUCTO) FROM VIEW_GRAPH_DESC_BUQ_X_CLI ";
$stmt    = odbc_prepare($connect,$query);
$j=1;
while ($row = odbc_fetch_array($stmt)) {
$categories[$j] = $row['DS_PRODUCTO'];
}*/

$categories[1] = 'DESCARGADO';
// QUERY PARA FALLAS ANULADAS Y ACTIVAS (1)

$query="SELECT SUM(PESO_NETO) AS DESCARGADO,DS_PRODUCTO FROM VIEW_GRAPH_DESC_BUQ_X_PROD GROUP BY DS_PRODUCTO";
$stmt    = odbc_prepare($connect,$query);
$donnee=odbc_execute($stmt) or die(exit("Error en odbc_exec"));
//$donnee = odbc_exec($query,$connect);

				
$i=0;
$products[0]=a;
while ($row = odbc_fetch_array($stmt)) {
    
	$product=$row['DS_PRODUCTO'];
   	$x='DESCARGADO';
    $data[$product][$x]=$row['DESCARGADO'];
	
   if($product!=$products[$i]  )

   {
	
   $i=$i+1;
   $products[$i]=$product;

   }

   }

for ($i=1;$i<count($products);$i++)
{ 
	
for ($j=1;$j<=count($categories);$j++)
{    
		
	
if(isset($data[$products[$i]][$categories[$j]])){	
	$valeur[$products[$i]][$categories[$j]]=$data[$products[$i]][$categories[$j]];
	}else $valeur[$products[$i]][$categories[$j]]=0;


}
}

//echo $valeur[$products[$i]][$categories[$j]];


?>
