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

$categories1[1] = 'MANIFESTADO';
$categories1[2] = 'DESPECHADO';
$categories1[3] = 'ROB';

// QUERY PARA FALLAS ANULADAS Y ACTIVAS (1)
$idb=$_POST["id_buque"];
$query="SELECT  'BL '+ cod_bl+' '+ ds_producto as cod_bl, CANT_MANIFESTADA, CANTIDAD_PESADA,ROB
FROM VIEW_GRAPH_SITUACION_DIARIA_BUQUE where id_buque = $idb";

$stmt    = odbc_prepare($connect,$query);
$donnee=odbc_execute($stmt) or die(exit("Error en odbc_exec"));
//$donnee = odbc_exec($query,$connect);

				
$i=0;
$products1[0]='a';
while ($row = odbc_fetch_array($stmt)) {
    
	$product=$row['cod_bl'];
   	$x=$categories1[1];
    $data[$product][$x]=$row['CANT_MANIFESTADA'];
	
	$product=$row['cod_bl'];
   	$x=$categories1[2];
    $data[$product][$x]=$row['CANTIDAD_PESADA'];
	
	$product=$row['cod_bl'];
   	$x=$categories1[3];
    $data[$product][$x]=$row['ROB'];
	

	
	
   if($product!=$products1[$i]  )

   	{
	
	   $i=$i+1;
	   $products1[$i]=$product;

  	 }

   }

for ($i=1;$i<count($products1);$i++)
{ 
	
for ($j=1;$j<=count($categories1);$j++)
{    
		
	
if(isset($data[$products1[$i]][$categories1[$j]])){	
	$valeur[$products1[$i]][$categories1[$j]]=$data[$products1[$i]][$categories1[$j]];
	}else $valeur[$products1[$i]][$categories1[$j]]=0;


}
}

//echo $valeur[$products[$i]][$categories[$j]];


?>
