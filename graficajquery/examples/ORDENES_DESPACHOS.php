 <?php

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

$categories[1] = 'ORDENES';
$categories[2] = 'DESPACHOS';

// QUERY PARA FALLAS ANULADAS Y ACTIVAS (1)

$query="SELECT    fecha_cre, ORDENES, DESPACHOS
FROM         VIEW_GRAPH_ORDEN_DESPACHO
WHERE     (fecha_cre>='21-03-2011' AND FECHA_CRE <='21-05-2011')";
$stmt    = odbc_prepare($connect,$query);
$donnee=odbc_execute($stmt) or die(exit("Error en odbc_exec"));
//$donnee = odbc_exec($query,$connect);

				
$i=0;
$products[0]=a;
while ($row = odbc_fetch_array($stmt)) {
    
	$product=$row['fecha_cre'];
   	$x=$categories[1];
    $data[$product][$x]=$row['ORDENES'];
	
	$product=$row['fecha_cre'];
   	$x=$categories[2];
    $data[$product][$x]=$row['DESPACHOS'];

	
	
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
