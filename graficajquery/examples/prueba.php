 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>Highcharts Example</title>
      <!-- 1. Add these JavaScript inclusions in the head of your page -->
      <script type="text/javascript" src="../js/jquery.min.js"></script>
      <script type="text/javascript" src="../js/highcharts.js"></script>
      <!-- 1a) Optional: the exporting module -->
      <script type="text/javascript" src="../js/modules/exporting.js"></script>
      <!-- ***récupération des données*** -->
      <?php include("query.php");?>
      <!-- 2. Add the JavaScript to initialize the chart on document ready -->
      <script type="text/javascript">
         var chart;
         $(document).ready(function() {
            chart = new Highcharts.Chart({
               chart: {
                  renderTo: 'container',
                  defaultSeriesType: 'bar'
               },
               title: {
                  text: 'Monthly Average Rainfall'
               },
               subtitle: {
                  text: 'Source: portaone'
               },
               xAxis: {
                  categories: [<?php for ($j=1;$j<=count($categories);$j++){echo "'".$categories[$j]."',";}?>]
               },
               yAxis: {
                  min: 0,
                  title: {
                     text: 'Fallas Presentadas al Departamento'
                  }
               },
               legend: {
                  layout: 'horizontal',
                  backgroundColor: '#FFFFFF',
                  align: 'center',
                  verticalAlign: 'bottom',
               },
               tooltip: {
                  formatter: function() {
                     return ''+
                        this.x +': '+ this.y +' Fallas';
                  }
               },
               plotOptions: {
                  
				  column: {
                     pointPadding: 0.2,
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
   <?php
   		 
                  
                  
                
		
   ?>
      <!-- 3. Add the container -->
      <div id="container" style="width:600px; height: 400px; margin: 0 auto"></div>
   </body>
</html>
