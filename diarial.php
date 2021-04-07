<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>jQuery UI Example Page</title>
        <link rel="stylesheet" href="css/jq.css" type="text/css" media="print, projection, screen" />
		<link rel="stylesheet" href="css/estilo.css" type="text/css" media="print, projection, screen" />
		<script type="text/javascript" src="js/jquery-latest.js"></script>
        <script type="text/javascript" src="js/jquery.tablesorter.js"></script>
        <script type="text/javascript" src="js/chili/chili-1.8b.js"></script>
        <script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script>
        <script type="text/javascript" src="js/docs.js"></script>
        <script type="text/javascript">
        $(function() {

		$("trans").tablesorter({widthFixed: true, widgets: ['zebra']})

			.tablesorterPager({container: $("#pager")});

	});

        </script>
        
        
        <link rel="stylesheet" href="css/demo.css" type="text/css"  media="screen" /> 
		<link type="text/css" href="jqueryui/css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="jqueryui/js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="jqueryui/js/jquery-ui-1.8.16.custom.min.js"></script>
        <script language="javascript" src="js/jquery.timers-1.0.0.js"></script> 
		 <script type="text/javascript">
		$(document).ready(function(){
		   
		$('#dialog_buques_cargando').css("display", "none");	
		  
		});
		
		</script>
		<script type="text/javascript">
			
			
			function menu (id_buque){
				
			 		
			}
			function idbuques (id_buque)
 			{ 
				vln_idbuque = id_buque;
				alert(vln_idbuque)
				<!-- Consulta para ordenes de pesaje por transportistas -->
				$.ajax({
					type: "POST",
					dataType:"html",
					url: "consultas/transporte_x_buque.php",			
					data: "id_buque="+vln_idbuque,			
					beforeSend: function() {			
						setTimeout ('', 10000);
						$('#trans').remove();
						$('#dialog_buques_cargando').css("display", "block");	
												
							
					},			
					complete: function() {			
						$('#dialog_buques_cargando').css("display", "none");		
					},        			
					cache: false,			
					success: function(result) {			
						$('#dialog_buques').append(result);
						
						 return result;			
					},			
					error: function(error) {			
						$("img#busy").hide();			
						$("button#check").show();			
						alert("Some problems have occured. Please try again later: " + error);			
					}
			
				});			
				
				<!-- Consulta para ordenes de pesaje por transportistas -->
					$.ajax({
					type: "POST",
					dataType:"html",
					url: "consultas/detalles.php",			
					data: "id_buque="+vln_idbuque,			
					beforeSend: function() {			
						setTimeout ('', 10000);
						$('#detalle1').remove();
						$('#detalle2').remove();
						$('#detalle3').remove();
						$('#dialog_buques_cargando_1').css("display", "block");	
												
							
					},			
					complete: function() {			
						$('#dialog_buques_cargando_1').css("display", "none");		
					},        			
					cache: false,			
					success: function(result) {			
						$('#detalles').append(result);
						
						 return result;			
					},			
					error: function(error) {			
						$("img#busy").hide();			
						$("button#check").show();			
						alert("Some problems have occured. Please try again later: " + error);			
					}
			
				});	
 			
			
				<!-- Consulta para ordenes de pesaje por transportistas -->
				
					
			}	
						
			
			$(function(){

				// Dialogo de situacion del dia width: 315, 				height: 230,			
				$('#dialog_st_dia').dialog({
					autoOpen: true,	
					width: 315,				
					resizable: false
					
				});
				
				
				$('#dialog_Buque').dialog({
					autoOpen: true,	
					width: 315,				
					resizable: false,
					buttons: { "Ver mas": function() { $(this).dialog({height: 600,  }); }, 
					"Ocultar": function() { $(this).dialog({height: 250, }); } }
					
				});
				
				$("#dialog_st_dia").dialog('option', 'position', [20,10]); 
				
				// Dialogo de Buques
				$('#dialog_buques').dialog({
					autoOpen: true,
					resizable: false,
					width: 650,
					
				});
				
				// Dialogo de historico
				$('#graficas').dialog({
					autoOpen: true,
					width: 400
					
				});
				
				// Dialogo actividad reciente
				$('#detalles').dialog({
					autoOpen: true,
					resizable: false,
					width: 335
					
				});
				
				// Dialog Link
				$('#grafica1s').click(function(){
					$('#dialog_st_dia').dialog('open');
					return false;
				});

		
				
			});
			
		</script>
       
      
		<style type="text/css">
			/*demo page css*/
			body{ font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
		</style>	
    
     <style type="text/css">   
        tr:hover{
   			 background-color: #FFFFCC; /* amarillo */
		}
    
	</style>		


	</head>
	<body background="images/background.png">
	<h1>&nbsp;</h1>
	<div id="tabs"> </div>
<?php	
    include("bd/conexion.php");
	$conex=conectarse();
	//<p><a href="#" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-newwin"></span>Open Dialog</a></p>
?>
	<!-- Dialog NOTE: Dialog is not generated by UI in this demo so it can be visually styled in themeroller-->
		
		<!-- Ventana de situacion del dia de mercancia -->
		<div id="dialog_st_dia" title="Buques en operación">
		  	
            <p>
			           
           
		    <table width="300" height="17" border="0" cellpadding="0" cellspacing="0" >
              <tr>
                <td width="110">Buques</td>
              </tr>
               <?php
			  	
			  	$cont=0;
				$sql = "exec SP_BUQUE";;
				$rs=odbc_exec($conex,$sql)or die(exit("Error en odbc_exec"));
				while ( odbc_fetch_row($rs) )  
				{ 
					$nb_buque=odbc_result($rs,"nb_buque");
					$id_buque=odbc_result($rs,"id_buque");
								
						echo(" <tr><td><a name=\"link\" id=$id_buque href=\"#\" onclick=idbuques($id_buque)>$nb_buque</a></td></tr>");
									
				}				
			   ?>
            </table>
		    </div>
            
            </p>
		</div>
		
        

		
        <!-- Ventana de situacion del dia de buques ROB -->
		<div id="dialog_buques" title="Buques">		  	
       		<div id="dialog_buques_cargando" align="center" style="display:none; margin:auto; position:relative;" ><img src="images/16.gif" width="160" height="20"></div>
		</div>
        		
			
            <!-- Ventana de Historico  -->
		<div id="detalles" title="Detalles General">
        <div id="dialog_buques_cargando_1" align="center" style="display:none; margin:auto; position:relative;" ><img src="images/16.gif" width="160" height=	"20"></div>
        
        <div id="graficas" title="Graficas">
        <div id="dialog_buques_cargando_2" align="center" style="display:none; margin:auto; position:relative;" ><img src="images/16.gif" width="160" height=	"20"></div>
			
		</div>	 
	</body>
</html>


