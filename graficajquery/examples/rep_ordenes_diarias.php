 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>Highcharts Example</title>
     
     
      <?php 
	  
	  	//include("SIT_DIARIA_EMPRE.php"); //SITUACION DIARIA DE EMPRESA DE TRANSPORTE(ORDENES)
		//include("buq_cli.php"); // REP DE PRODUCTOS DESCARGADOS 
		//include("ORDENES_DESPACHOS.php"); // REP ORDENES DESPACHADAS Y CREADAS
		// include("REP_FACT_PUB_PRIV.php"); // REP FACTURADO PUBLICO Y PRIVADO
		include("SIT_DIARIA_EMPRE_BUQ.php"); // REP ORDENES TOTALES, ST,CT,DS POR EMPRESA TRANSPORTE (POR BUQUE) ID_BUQUE NECESARIO
	   //include("SITUACION_DIARIA_OC.php"); // REP ORDENES DE CARGAS CREADAS, EN MUELLE, SIN TARA, DESPACHADAS.
	  //include("SITUACION_DIARIA_PRODUCTO.php");
	  ?>
      <!-- 2. Add the JavaScript to initialize the chart on document ready -->
      <script type="text/javascript">
         var chart;
         $(document).ready(function() {
            chart = new Highcharts.Chart({
               chart: {
                  renderTo: 'container1',
                  defaultSeriesType: 'column'
               },
               title: {
                  text: 'REPORTES ORDENES REALIZADAS'
               },
               subtitle: {
                  text: ''
               },
               xAxis: {
                  categories: [<?php for ($j=1;$j<=count($categories);$j++){echo "'".$categories[$j]."',";}?>]
               },
               yAxis: {
                  min: 0,
                  title: {
                     text: 'Numeros de Ordenes Realizadas'
                  }
               },
               legend: {
                  layout: 'vertical',
                  backgroundColor: '#FFFFFF',
                  align: 'center',
                  verticalAlign: 'bottom',
               },
               tooltip: {
                  formatter: function() {
                     return ''+
                        this.x +': '+ this.y ;
                  }
               },
			   credits: {
						enabled: false
					},
               plotOptions: {
                  
				  column: {
                     pointPadding: 0.1,
                     borderWidth: 0
                  }
               },
               <?php  echo " series: [";
                  for ($i=1; $i<count($products);$i++)
                  {
                  echo"{
                  name: ' ".$products[$i]."  ',
                  data: [";
                  for ($j=1;$j<=count($categories);$j++) {echo $valeur[$products[$i]][$categories[$j]].",";}
                  echo "]},";
                  }
                  echo "
                  ]";?>
            });
         });
   </script>
   </head>
   <body background="file:///C|/wamp/www/dise/bg.gif">
  
      <!-- 3. Add the container -->
      <div id="container1" style="width:600px; height: 500px; margin: 0 auto"></div>
	
   </body>
</html>
