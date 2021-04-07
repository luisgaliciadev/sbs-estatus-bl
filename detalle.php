
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!-- 1. Add these JavaScript inclusions in the head of your page -->
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/gray.js"></script>
      <script type="text/javascript" src="js/highcharts.js"></script>
      <!-- 1a) Optional: the exporting module -->
      <script type="text/javascript" src="js/modules/exporting.js"></script>
      <!-- ***récupération des données*** -->
</head>

<body>
 <?php
	if (isset($_GET['id_buque']))
		$id_buque=$_GET['id_buque'];
	else
		$id_buque=0;
?>
<?php
	echo("<div align=\"right\">
	<label><a href=\"index.php\">
    Atrás</a></label>
</a></div>");
	if($id_buque!=0)
	{	
	echo("<div align=\"right\">
		<label><a href=\"today.php\">
		Todos</a></label>
	</a></div>");}
?>
<div align="center">
	  <?php
		if($id_buque!=0)
		{
			echo("<div id=\"productos\">
			<table width=\"350\" border=\"0\" cellpadding=\"0\" cellspacing=\"3\">
			  <tr>
			  	<td width=\"50\" bgcolor=\"#EDFCD6\">BL</td>
				<td width=\"108\" bgcolor=\"#EDFCD6\">Producto</td>
				<td width=\"98\" bgcolor=\"#EDFCD6\">Pesado</td>
				<td width=\"94\" bgcolor=\"#EDFCD6\">ROB</td>
			  </tr>
			  ");
			  		if ($id_buque==0)
						$sql2 = "SELECT * FROM VIEW_GRAPH_SITUACION_DIARIA_BUQUE ";
					else
						$sql2 = "SELECT * FROM VIEW_GRAPH_SITUACION_DIARIA_BUQUE WHERE id_buque='$id_buque'";
					$rs2=odbc_exec($conex,$sql2)or die(exit("Error en odbc_exec"));
					while ( odbc_fetch_row($rs2) )
					{ 
						$ds_producto=odbc_result($rs2,"ds_producto");
						$cant_manifestada=odbc_result($rs2,"cant_manifestada");
						$rob=odbc_result($rs2,"rob");
						$cod_bl=odbc_result($rs2,"cod_bl");
						echo"<tr><td bgcolor=\"#F2F2F2\">$cod_bl</td><td bgcolor=\"#F2F2F2\">$ds_producto</td>
						<td bgcolor=\"#F2F2F2\">".number_format($cant_manifestada, 2, ",", ".")."</td>
						<td bgcolor=\"#F2F2F2\">".number_format($rob, 2, ",", ".")."</td>
						</tr>";
					}
		
				echo("	  
					
				  </table></div>
				</div>
			  </div>");
			 }
			?>

<div align="center" id="tabla">
  <table width="316" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <th width="80" scope="col">&nbsp;</th>
        <th width="47" scope="col">00-06</th>
        <th width="47" scope="col">06-12</th>
        <th width="47" scope="col">12-18</th>
        <th width="47" scope="col">18-24</th>
        <th width="43" scope="col">Total</th>
      </tr>
      <tr>
        <th height="26" scope="row">Gandolas</th>
	<?php
		if ($id_buque==0)
			$sql2 = "SELECT * FROM VIEW_GRAPH_SITUACION_DIARIA_GANDOLAS";
		else
			$sql2 = "SELECT * FROM VIEW_GRAPH_GANDOLAS_X_BUQUE_BL WHERE id_buque=$id_buque";
		$rs2=odbc_exec($conex,$sql2)or die(exit("Error en odbc_exec"));
		$total=0;
		while ( odbc_fetch_row($rs2) )
		{ 
			$gandolas=odbc_result($rs2,"gandolas");
			$total=$total+$gandolas;
			 echo("<td align=\"center\">$gandolas</td>");
		}
			echo("<td align=\"center\">$total</td>");
	?>
      </tr>
      <tr>
        <th height="26" scope="row">Turn Time </th>
       <?php
			if ($id_buque==0)
				$sql2 = "SELECT * FROM VIEW_GRAPH_SITUACION_DIARIA_TURN_TIME";
			else
				$sql2 = "SELECT * FROM VIEW_GRAPH_TURN_TIME_X_BUQUE_BL WHERE id_buque=$id_buque";
			$rs2=odbc_exec($conex,$sql2)or die(exit("Error en odbc_exec"));
			$total=0;
			$c=0;
			while ( odbc_fetch_row($rs2) )
			{ 
				$horas=odbc_result($rs2,"horas");
				$total=$total+$horas;
				 echo("<td align=\"center\">".number_format($horas, 2, ",", ".")."</td>");
				 if($horas!=0)
				 	$c++;
			}
				if ($c>0)
				echo("<td align=\"center\">".number_format($total/$c, 2, ",", ".")."</td>");
				else
				echo("<td align=\"center\">".number_format(0, 2, ",", ".")."</td>");
		?>
      </tr>
      <tr>
        <th height="26" scope="row">OC Tara </th>
        <?php
			if ($id_buque==0)
				$sql2 = "SELECT * FROM VIEW_GRAPH_SITUACION_DIARIA_OC_TARA";
			else
				$sql2 = "SELECT * FROM VIEW_GRAPH_OC_TARA_X_BUQUE_BL WHERE id_buque=$id_buque";
			$rs2=odbc_exec($conex,$sql2)or die(exit("Error en odbc_exec"));
			$total=0;
			$c=0;
			while ( odbc_fetch_row($rs2) )
			{ 
				$horas=odbc_result($rs2,"horas");
				$total=$total+$horas;
				if($horas!=0)
				 	$c++;
				 echo("<td align=\"center\">".number_format($horas, 2, ",", ".")."</td>");
			}
				if ($c>0)
				echo("<td align=\"center\">".number_format($total/$c, 2, ",", ".")."</td>");
				else
				echo("<td align=\"center\">".number_format(0, 2, ",", ".")."</td>");
		?>
      </tr>
    </table>
</div>

<div align="center" id="tabla">
  <table width="316" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <th width="74" scope="col">Ordenes</th>
        <th width="84" scope="col">Por entrar </th>
        <th width="70" scope="col">En Muelle </th>
        <th width="82" scope="col">Despachado</th>
      </tr>
      <tr>
        <?php
			if ($id_buque==0)
				$sql2 = "SELECT * FROM VIEW_GRAPH_SITUACION_DIARIA_CANT_OC";
			else
				$sql2 = "SELECT * FROM VIEW_GRAPH_SITUACION_DIARIA_CANT_OC_X_BUQUE_BL WHERE id_buque=$id_buque";
			$rs2=odbc_exec($conex,$sql2)or die(exit("Error en odbc_exec"));
			while ( odbc_fetch_row($rs2) )
			{ 
				$oc=odbc_result($rs2,"oc");
				 echo("<td align=\"center\">$oc</td>");
			}
		?>
      </tr>
  </table>
</div>
<div align="center" id="tabla">
  <table width="316" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <th width="75" scope="col">Muelle</th>
      <th width="85" scope="col">En Sitio</th>
      <th width="85" scope="col">Por Entrar</th>
    </tr>
    <tr>
      <?php
			if ($id_buque==0)
				$sql2 = "SELECT * FROM VIEW_GRAPH_SITUACION_DIARIA_MUELLES";
			else
				$sql2 = "SELECT * FROM VIEW_GRAPH_SITUACION_DIARIA_MUELLES WHERE cod_buque=$id_buque";
			
			$rs2=odbc_exec($conex,$sql2)or die(exit("Error en odbc_exec"));
			while ( odbc_fetch_row($rs2) )
			{ 
				$nb_muelle=odbc_result($rs2,"nb_muelle");
				$por_ingresar=odbc_result($rs2,"por_ingresar");
				$en_muelle=odbc_result($rs2,"en_muelle");
				 echo(" <tr>");
				 echo("<td align=\"center\">$nb_muelle</td>");
				  echo("<td align=\"center\">$en_muelle</td>");
				   echo("<td align=\"center\">$por_ingresar</td>");
				 echo(" </tr>");
			}
			
		?>
    </tr>
  </table>
  </div>
  <div align="center" id="tabla">
  	<div id="titulo">	Titulo
	</div>
  <?php 
  	if($id_buque==0)
	{
		 echo(" <table width=\"605\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
				<tr>
				  <th width=\"335\" scope=\"col\">Transporte</th>
				  <th width=\"75\" scope=\"col\">Por Ingresar </th>
				   <th width=\"65\" scope=\"col\">En Muelle </th>
					<th width=\"65\" scope=\"col\">Despachadas </th>
					<th width=\"65\" scope=\"col\">Total</th>
				</tr>
				<tr>");
	
    
			$sql2 = "SELECT * FROM VIEW_GRAPH_SITUACION_DIARIA_EMPRESA_SUMA";		
			$rs2=odbc_exec($conex,$sql2)or die(exit("Error en odbc_exec"));
			while ( odbc_fetch_row($rs2) )  
			{ 
				$nb_benef=odbc_result($rs2,"nb_proveed_benef");
				$por_ingresar=odbc_result($rs2,"por_ingresar");
				$en_muelle=odbc_result($rs2,"en_muelle");
				$despachado=odbc_result($rs2,"despachados");
				$total=odbc_result($rs2,"total");
				 echo(" <tr>");
				 echo("<td align=\"left\">$nb_benef</td>");
				  echo("<td align=\"center\">$por_ingresar</td>");
				   echo("<td align=\"center\">$en_muelle</td>");
				   echo("<td align=\"center\">$despachado</td>");
				   echo("<td align=\"center\">$total</td>");
				 echo(" </tr>");
			}
			
	
		 echo("   </tr>
		  </table>");

  		}
		else
		{
			  echo(" <table width=\"630\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
					<tr>
					  <th width=\"285\" scope=\"col\">Transporte</th>
					  <th width=\"75\" scope=\"col\">BL</th>
					  <th width=\"85\" scope=\"col\">Producto</th>
					  <th width=\"85\" scope=\"col\">Por Ingresar </th>
					  <th width=\"85\" scope=\"col\">En Muelle </th>
					  <th width=\"85\" scope=\"col\">Despachadas </th>
					  <th width=\"85\" scope=\"col\">Total</th>
					</tr>
					<tr>");
			$sql2 = "SELECT * FROM VIEW_GRAPH_SITUACION_DIARIA_EMPRESA WHERE id_buque=$id_buque";		
			$rs2=odbc_exec($conex,$sql2)or die(exit("Error en odbc_exec"));
			while ( odbc_fetch_row($rs2) )
			{ 
				
				$nb_benef=odbc_result($rs2,"nb_proveed_benef");
				$cod_bl=odbc_result($rs2,"cod_bl");
				$ds_producto=odbc_result($rs2,"ds_producto");
				$por_ingresar=odbc_result($rs2,"por_ingresar");
				$en_muelle=odbc_result($rs2,"en_muelle");
				$despachado=odbc_result($rs2,"despachados");
				$total=odbc_result($rs2,"total");
				 echo(" <tr>");
				 echo("<td align=\"left\">$nb_benef</td>");
				 echo("<td align=\"center\">$cod_bl</td>");
				 echo("<td align=\"center\">$ds_producto</td>");
				 echo("<td align=\"center\">$por_ingresar</td>");
				 echo("<td align=\"center\">$en_muelle</td>");
				 echo("<td align=\"center\">$despachado</td>");
				 echo("<td align=\"center\">$total</td>");
				 echo(" </tr>");
			}
		 echo("   </tr>
		  </table>");
		}
	?>
  </div>
  
</div>

 
</body>
</html>
