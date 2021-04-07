<?php  include("bd/conexion.php"); ?>


<?php 
$conex=conectarse();
$id_buque =$_POST["id_buque"];
$id_buque =597;
 $vlc_consulta ="<div align=\"center\" id=\"tabla\">
  <table width=\"316\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"detalle1\" class=\"tablesorter\">
      <tr>
        <th width=\"80\" scope=\"col\">&nbsp;</th>
        <th width=\"47\" scope=\"col\">00-06</th>
        <th width=\"47\" scope=\"col\">06-12</th>
        <th width=\"47\" scope=\"col\">12-18</th>
        <th width=\"47\" scope=\"col\">18-24</th>
        <th width=\"43\" scope=\"col\">Total</th>
      </tr>
      <tr>
        <th height=\"26\" scope=\"row\">Gandolas</th>";
	
		if ($id_buque==0)
			$sql2 = "SELECT * FROM VIEW_GRAPH_SITUACION_DIARIA_GANDOLAS";
		else
			$sql2 = "SELECT * FROM VIEW_GRAPH_GANDOLAS_X_BUQUE_BL WHERE id_buque=$id_buque";
		$rs2=odbc_exec($conex,$sql2)or die(exit("Error en odbc_exec"));
		$total=0;
		while ( odbc_fetch_row($rs2) )
		{ 
			$gandolas=odbc_result($rs2,"GANDOLAS");
			$total=$total+$gandolas;
			$vlc_consulta .="<td align=\"center\">$gandolas</td>";
		}
			$vlc_consulta .="<td align=\"center\">$total</td>";
	
    $vlc_consulta .=  "</tr>
      <tr>
        <th height=\"26\" scope=\"row\">Turn Time </th>";
       
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
				 $vlc_consulta .="<td align=\"center\">".number_format($horas, 2, ",", ".")."</td>";
				 if($horas!=0)
				 	$c++;
			}
				if ($c>0)
				$vlc_consulta .="<td align=\"center\">".number_format($total/$c, 2, ",", ".")."</td>";
				else
				$vlc_consulta .="<td align=\"center\">".number_format(0, 2, ",", ".")."</td>";
		
     $vlc_consulta .= "</tr>
      <tr>
        <th height=\"26\" scope=\"row\">OC Tara </th>";
       
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
				 $vlc_consulta .="<td align=\"center\">".number_format($horas, 2, ",", ".")."</td>";
			}
				if ($c>0)
				$vlc_consulta .="<td align=\"center\">".number_format($total/$c, 2, ",", ".")."</td>";
				else
				$vlc_consulta .="<td align=\"center\">".number_format(0, 2, ",", ".")."</td>";
		
    $vlc_consulta .="  </tr>
    </table>
</div>

<div align=\"center\" id=\"tabla\">
  <table width=\"316\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"detalle2\" class=\"tablesorter\">
      <tr>
        <th width=\"74\" scope=\"col\">Ordenes</th>
        <th width=\"84\" scope=\"col\">Por entrar </th>
        <th width=\"70\" scope=\"col\">En Muelle </th>
        <th width=\"82\" scope=\"col\">Despachado</th>
      </tr>
      <tr>";
        
			if ($id_buque==0)
				$sql2 = "SELECT * FROM VIEW_GRAPH_SITUACION_DIARIA_CANT_OC";
			else
				$sql2 = "SELECT * FROM VIEW_GRAPH_SITUACION_DIARIA_CANT_OC_X_BUQUE_BL WHERE id_buque=$id_buque";
			$rs2=odbc_exec($conex,$sql2)or die(exit("Error en odbc_exec"));
			while ( odbc_fetch_row($rs2) )
			{ 
				$oc=odbc_result($rs2,"oc");
				 $vlc_consulta .="<td align=\"center\">$oc</td>";
			}
		
     $vlc_consulta .=" </tr>
  </table>
</div>
<div align=\"center\" id=\"tabla\">
  <table width=\"316\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"detalle3\" class=\"tablesorter\">
    <tr>
      <th width=\"75\" scope=\"col\">Muelle</th>
      <th width=\"85\" scope=\"col\">En Sitio</th>
      <th width=\"85\" scope=\"col\">Por Entrar</th>
    </tr>
    <tr>";
     
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
				 $vlc_consulta .=" <tr>";
				 $vlc_consulta .="<td align=\"center\">$nb_muelle</td>";
				  $vlc_consulta .="<td align=\"center\">$en_muelle</td>";
				  $vlc_consulta .="<td align=\"center\">$por_ingresar</td>";
				 $vlc_consulta .=" </tr>";
			}
			
		
    $vlc_consulta .="</tr>
  </table>";
  
  
  echo  $vlc_consulta;
  ?>
  </div>














