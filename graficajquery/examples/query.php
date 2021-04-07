 <?php
include("conectar.php");
$con = conectarce();
/*$query="SELECT nombre_grupo FROM tipo_falla where fg_activo = 1";
$donnee=mysql_query($query,$con) or exit(mysql_error());
while ($row = mysql_fetch_array($donnee)) {
$i=$i+1;
$categories[$i] = $row ["nombre_grupo"];

}
$n=5;
$i=0;*/

// QUERY PARA FALLAS POR DEPARTAMENTO (1)
/*$query="SELECT DISTINCT (
solicitudes.id_departamento
), departamento.nombre_dep
FROM solicitudes, departamento
WHERE solicitudes.id_departamento = departamento.id_departamento 
";

$donnee=mysql_query($query,$con) or exit(mysql_error());
$i=0;
while ($row = mysql_fetch_array($donnee)) {
$i=$i+1;
$categories[$i] = $row["nombre_dep"];

}
$i=$i+1;*/

/*$query="SELECT count( solicitudes.id_relacion_falla ) AS cuenta, tipo_falla.nombre_grupo, tipo_falla.id_tipo_falla,solicitudes.estatu
FROM solicitudes, tipo_falla, relacion_falla
WHERE relacion_falla.id_relacion = solicitudes.id_relacion_falla
AND tipo_falla.id_tipo_falla = relacion_falla.id_tipo_falla
GROUP BY tipo_falla.nombre_grupo, solicitudes.id_relacion_falla, tipo_falla.id_tipo_falla,solicitudes.estatu";*/
$categories[1] = "ANULADO";
$categories[2] = "ACTIVO";
// QUERY PARA FALLAS ANULADAS Y ACTIVAS (1)
$query="SELECT count( solicitudes.id_relacion_falla ) AS cuenta, tipo_falla.nombre_grupo, tipo_falla.id_tipo_falla,CASE solicitudes.estatu 
  WHEN 1 THEN \"ACTIVO\"
  WHEN 0 THEN \"ANULADO\"
  END
estatu 
FROM solicitudes, tipo_falla, relacion_falla
WHERE relacion_falla.id_relacion = solicitudes.id_relacion_falla
AND tipo_falla.id_tipo_falla = relacion_falla.id_tipo_falla
GROUP BY tipo_falla.nombre_grupo, solicitudes.id_relacion_falla, tipo_falla.id_tipo_falla,solicitudes.estatu ";

// QUERY PARA FALLAS POR DEPARTAMENTO (2)
/*$query="SELECT COUNT( solicitudes.id_relacion_falla ) AS cuenta, tipo_falla.nombre_grupo, tipo_falla.id_tipo_falla, departamento.nombre_dep
FROM solicitudes, tipo_falla, relacion_falla, departamento
WHERE relacion_falla.id_relacion = solicitudes.id_relacion_falla
AND solicitudes.id_departamento = departamento.id_departamento
AND tipo_falla.id_tipo_falla = relacion_falla.id_tipo_falla 
GROUP BY tipo_falla.nombre_grupo, solicitudes.id_relacion_falla, tipo_falla.id_tipo_falla, departamento.nombre_dep";*/

$donnee=mysql_query($query,$con) or exit(mysql_error());

$i=0;
$products[0]=a;
while ($row = mysql_fetch_assoc($donnee)) {
    $product=$row['nombre_grupo'];
   	$x=$row['estatu'];
    $data[$product][$x]=$row['cuenta'];
	  
   if($product!=$products[$i]  )

   {
	
   $i=$i+1;
   $products[$i]=$product;
   }

   }

for ($i=1;$i<count($products);$i++)
{echo "$products[$i] </p>";
	
for ($j=1;$j<=count($categories);$j++)
{   // echo "$categories[$j] </p>";
		
	
if(isset($data[$products[$i]][$categories[$j]])){	
	echo $data[$products[1]][$categories[1]];
	$valeur[$products[$i]][$categories[$j]]=$data[$products[$i]][$categories[$j]];
	}else $valeur[$products[$i]][$categories[$j]]=0;


}
}


?>
