<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="10" http-equiv="REFRESH"> </meta>
<title></title>

</head>

<body>

<div class="info">
	    <label><a href="today.php?cerrar=0">Situación General del Día</a></label>
			<div align="center">
		    <table width="300" height="17" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="110">Producto</td>
                <td width="102">Manifestado(KG)</td>
                <td width="90">Pesado(KG)</td>
              </tr>
               <?php
			  	
			  	$cont=0;
				$sql = "SP_SITUACION_GENERAL";
				$rs=odbc_exec($conex,$sql)or die(exit("Error en odbc_exec"));
				while ( odbc_fetch_row($rs) )  
				{ 
					$ds_producto=odbc_result($rs,"ds_producto");
					$sumatoria=odbc_result($rs,"sumatoria");
					$pesada=odbc_result($rs,"pesada");
					if ($cont%2!=0)
						echo(" <tr><td>$ds_producto</td><td>".number_format($sumatoria, 2, ",", ".")."</td><td>".number_format($pesada, 2, ",", ".")."</td> </tr>");
					else
						echo(" <tr><td id=\"azul\">$ds_producto</td><td id=\"azul\">".number_format($sumatoria, 2, ",", ".")."</td><td id=\"azul\">".number_format($pesada, 2, ",", ".")."</td> </tr>");
					$cont++;
				}
				
			?>
            </table>
		    </div>
		</div>
		<div class="info">
			<label><a href="buques.php?cerrar=0">Buques</a></label>
			<div align="center">
				<table width="300" height="17" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="110">Buque</td>
                <td width="102">Muelle</td>
                <td width="90">Atraque</td>
              </tr>
               <?php
			  	
			  	$cont=0;
				$sql = "SP_BUQUES";
				$rs=odbc_exec($conex,$sql)or die(exit("Error en odbc_exec"));
				while ( odbc_fetch_row($rs) )  
				{ 
					$nb_buque=odbc_result($rs,"nb_buque");
					$nb_muelle=odbc_result($rs,"nb_muelle");
					$atraque=odbc_result($rs,"atraque");
					if ($cont%2!=0)
						echo(" <tr><td>$nb_buque</td><td>$nb_muelle</td><td>$atraque</td> </tr>");
					else
						echo(" <tr><td id=\"azul\">$nb_buque</td><td id=\"azul\">$nb_muelle</td><td id=\"azul\">$atraque</td> </tr>");
					$cont++;
				}
				
			?>
            </table>
			</div>
		</div>
		<div class="info">
			<label><a href="#">Hist&oacute;rico</a></label>
			<div align="center">
				<table width="300" height="17" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="110">Buque</td>
                <td width="102">Muelle</td>
                <td width="90">Atraque</td>
              </tr>
               <?php
			  	
			  	$cont=0;
				$sql = "SP_BUQUES";
				$rs=odbc_exec($conex,$sql)or die(exit("Error en odbc_exec"));
				while ( odbc_fetch_row($rs) )  
				{ 
					$nb_buque=odbc_result($rs,"nb_buque");
					$nb_muelle=odbc_result($rs,"nb_muelle");
					$atraque=odbc_result($rs,"atraque");
					if ($cont%2!=0)
						echo(" <tr><td>$nb_buque</td><td>$nb_muelle</td><td>$atraque</td> </tr>");
					else
						echo(" <tr><td id=\"azul\">$nb_buque</td><td id=\"azul\">$nb_muelle</td><td id=\"azul\">$atraque</td> </tr>");
					$cont++;
				}
				
			?>
            </table>
			</div>
		</div>
		<div class="info">
			<label>Actividad Reciente </label>
			<?php
				$sql = "SP_ORDENES_INTERNET 0";
				$rs=odbc_exec($conex,$sql)or die(exit("Error en odbc_exec"));
				while ( odbc_fetch_row($rs) )
				{ 
					$ordenes_total=odbc_result($rs,"ordenes");
					
				}
				$sql = "SP_ORDENES_INTERNET 1";
				$rs=odbc_exec($conex,$sql)or die(exit("Error en odbc_exec"));
				while ( odbc_fetch_row($rs) )
				{ 
					$ordenes_tara=odbc_result($rs,"ordenes");
					
				}
				$sql = "SP_ORDENES_INTERNET 2";
				$rs=odbc_exec($conex,$sql)or die(exit("Error en odbc_exec"));
				while ( odbc_fetch_row($rs) )
				{ 
					$ordenes_full=odbc_result($rs,"ordenes");
					
				}
				$sql = "SP_ORDENES_INTERNET 3";
				$rs=odbc_exec($conex,$sql)or die(exit("Error en odbc_exec"));
				while ( odbc_fetch_row($rs) )
				{ 
					$ultima_orden=odbc_result($rs,"ordenes");
					
				}
				$sql = "SP_ORDENES_INTERNET 4";
				$rs=odbc_exec($conex,$sql)or die(exit("Error en odbc_exec"));
				while ( odbc_fetch_row($rs) )
				{ 
					$iltima_tara=odbc_result($rs,"ordenes");
					
				}
				$sql = "SP_ORDENES_INTERNET 5";
				$rs=odbc_exec($conex,$sql)or die(exit("Error en odbc_exec"));
				while ( odbc_fetch_row($rs) )
				{ 
					$ultima_pesada=odbc_result($rs,"ordenes");
					
				}
			
			?>
			<table width="300" height="116" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="118" id="titulo">Ordenes de Carga </td>
                <td width="100" id="titulo">Peso Tara </td>
                <td width="84" id="titulo">Despacho</td>
              </tr>
              <tr>
                <td id="conte"><?php echo $ordenes_total; ?></td>
                <td id="conte"><?php echo $ordenes_tara; ?></td>
                <td id="conte"><?php echo $ordenes_full; ?></td>
              </tr>
              <tr>
                <td id="titulo">Ult. Orden de C. </td>
                <td id="titulo">Ult. Tara </td>
                <td id="titulo">Ult. Desp. </td>
              </tr>
              <tr>
                <td id="conte"><?php echo $ultima_orden; ?></td>
                <td id="conte"><?php echo $iltima_tara; ?></td>
                <td id="conte"><?php echo $ultima_pesada; ?></td>
              </tr>
            </table>
		</div>
</body>
</html>
