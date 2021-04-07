<?php include("bd/conexion.php"); ?>
<?php 
$conex=conectarse();
$id_buque =$_POST["id_buque"];
$vln_trans_x_buque="";
$vln_trans_x_buque.= " <table width=\"630\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"trans\" class=\"tablesorter\">
					<thead>
					<tr>
					  <th width=\"285\" scope=\"col\">Transporte</th>
					  <th width=\"75\" scope=\"col\">BL</th>
					  <th width=\"85\" scope=\"col\">Producto</th>
					  <th width=\"85\" scope=\"col\">Por Ingresar </th>
					  <th width=\"85\" scope=\"col\">En Muelle </th>
					  <th width=\"85\" scope=\"col\">Despachadas </th>
					  <th width=\"85\" scope=\"col\">Total</th>
					</tr>
					</thead>
					<tbody>
					<tr>";
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
				$vln_trans_x_buque.=" <tr>";
				$vln_trans_x_buque.="<td align=\"left\">$nb_benef</td>";
				$vln_trans_x_buque.="<td align=\"center\">$cod_bl</td>";
				$vln_trans_x_buque.="<td align=\"center\">$ds_producto</td>";
				$vln_trans_x_buque.="<td align=\"center\">$por_ingresar</td>";
				$vln_trans_x_buque.="<td align=\"center\">$en_muelle</td>";
				$vln_trans_x_buque.="<td align=\"center\">$despachado</td>";
				$vln_trans_x_buque.="<td align=\"center\">$total</td>";
				$vln_trans_x_buque.=" </tr>";
			}
		$vln_trans_x_buque.=" </tr>
		  </tbody></table>";
		  echo $vln_trans_x_buque;
?>


		 