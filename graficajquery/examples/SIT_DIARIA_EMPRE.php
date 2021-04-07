 <?php
include("conexion.php");
$con = conectarse();
$dsn = "bppc";
	//debe ser de sistema no de usuario
	$usuario = "aries";
	$clave="aries";
$connect= odbc_connect($dsn, $usuario, $clave);

$categories[1] = 'TOTAL';
$categories[2] = 'POR INGRESAR';
$categories[3] = 'MUELLES';
$categories[4] = 'DESPACHOS';
// QUERY PARA FALLAS ANULADAS Y ACTIVAS (1)

$query="SELECT nb_proveed_benef, TOTAL, POR_INGRESAR, EN_MUELLE, DESPACHADOS
FROM VIEW_GRAPH_SITUACION_DIARIA_EMPRESA_SUMA";
$stmt    = odbc_prepare($connect,$query);
$donnee=odbc_execute($stmt) or die(exit("Error en odbc_exec"));
//$donnee = odbc_exec($query,$connect);

				
$i=0;
$products[0]=a;
while ($row = odbc_fetch_array($stmt)) {
   
	$product=$row['nb_proveed_benef'];
   	$x=$categories[1];
    $data[$product][$x]=$row['TOTAL'];
	
	$product=$row['nb_proveed_benef'];
   	$x=$categories[2];
    $data[$product][$x]=$row['POR_INGRESAR'];
	
	$product=$row['nb_proveed_benef'];
   	$x=$categories[3];
    $data[$product][$x]=$row['EN_MUELLE'];
	
	$product=$row['nb_proveed_benef'];
   	$x=$categories[4];
    $data[$product][$x]=$row['DESPACHADOS'];
	
	
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




?>
