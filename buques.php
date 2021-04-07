<?php extract($_REQUEST); ?>
<?php
	session_start();
	if (!isset($_GET["cerrar"]))
		$_GET["cerrar"]="";
	if ($_GET["cerrar"]==1)
		unset($_SESSION['user']);
		
	if (!isset($_SESSION["user"]))
		header ("Location:index.php"); 
		
	include("bd/conexion.php");
	$conex=conectarse();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/gray.js"></script>
      <script type="text/javascript" src="js/highcharts.js"></script>
      <!-- 1a) Optional: the exporting module -->
      <script type="text/javascript" src="js/modules/exporting.js"></script>
<script type="text/javascript">

$(document).ready(function(){

	//Menu desplegable
	$("#menu ul li ul").hide();	
	$("#menu ul li span.current").addClass("open").next("ul").show();
	$("#menu ul li span").click(function(){	
		$(this).next("ul").slideToggle("slow").parent("li").siblings("li").find("ul:visible").slideUp("slow");
		$("#menu ul li").find("span").removeClass("open");
		$(this).addClass("open");
	});

});
</script>
</head>

<body>

<div id="pagina">
    <div id="menu">
        <h3>Buques</h3>
        <ul>
            <?php
				if (isset($_GET['id_buque']))
					$id_buque2=$_GET['id_buque'];
				else
					$id_buque2=0;	
				$sql = "exec SP_BUQUE";
				$rs=odbc_exec($conex,$sql)or die(exit("Error en odbc_exec"));
				while ( odbc_fetch_row($rs) )
				{ 
					$nb_buque=odbc_result($rs,"nb_buque");
					$nb_muelle=odbc_result($rs,"nb_muelle");
					$atraque=odbc_result($rs,"fecha_hora_real_atraque");
					$id_buque=odbc_result($rs,"id_buque");
					if($id_buque==$id_buque2)
						$class="\"current\"";
					else
						$class="";
					echo("<li><span class=$class><a href=\"javascript:void(0);\" id=\"link-opciones\">$nb_buque</a></span>");
					echo("<ul>");
					echo("<li><a href=\"#\" class=\"bullet\">Muelle: $nb_muelle</a></li>");
					echo("<li><a href=\"#\" class=\"bullet\">Atraque: $atraque</a></li>");
					echo("<li><a href=\"today.php?id_buque=$id_buque\" class=\"bullet\">Detalles del Buque</a></li>");
					echo("<li><a href=\"today.php?id_buque=$id_buque&link=graficajquery/examples/grafica.php\" class=\"bullet\">Graficas</a></li>");
					echo("</ul></li>");
				}
			?>
            	<li><span class="current"><a href="javascript:void(0);" id="link-opciones">Sumario</a></span>
                <ul>
                    <li><a href="../menu-acordeon-jquery/?p=opciones&amp;sec=opcion-lectura" class="bullet">Lectura</a></li>
                    <li><a href="../menu-acordeon-jquery/?p=opciones&amp;sec=opcion-escritura" class="bullet">Escritura</a></li>
                    <li><a href="../menu-acordeon-jquery/?p=opciones&amp;sec=opcion-discusion" class="bullet">Discusi&oacute;n</a></li>
                    <li><a href="../menu-acordeon-jquery/?p=opciones&amp;sec=opcion-permalinks" class="bullet">Permalinks</a></li>
                </ul>
            	</li>
        </ul>
  </div>
    <!--/menu-->
    <div id="contenido">       
        <?php
		
		if (!isset($_GET['link'])){
			include("detalle.php");
		} else {
			include($_GET['link']);
		} 
		?>        
    </div>
    <!--/contenido-->
</div>
<!--/pagina-->

</body>
</html>