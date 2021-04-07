 <?php
include("conexion.php");
$con = conectarse();
$dsn = "bppc";
	//debe ser de sistema no de usuario
	$usuario = "aries";
	$clave="aries";
$connect= odbc_connect($dsn, $usuario, $clave);
$categories[1] = "FACTURADO";


// QUERY PARA FALLAS ANULADAS Y ACTIVAS (1)

$query="select count(fg_publi) as pri_publi, sum(monto_total) as FACTURADO, fg_publica from VIEW_GRAPH_FACT_X_CLIE group by fg_publica ";
$stmt    = odbc_prepare($connect,$query);
$donnee=odbc_execute($stmt) or die(exit("Error en odbc_exec"));
//$donnee = odbc_exec($query,$connect);

				
$i=0;
$products[0]=a;
while ($row = odbc_fetch_array($stmt)) {
    
	$product=$row['fg_publica'];
   	$x='FACTURADO';
    $data[$product][$x]=$row['FACTURADO'];
	
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
