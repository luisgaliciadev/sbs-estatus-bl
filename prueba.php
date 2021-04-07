<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Time Interval Page Element Refresh using JQuery and a sprinkle of Ajax</title>
<script language="javascript" src="jquery.js"></script>
<script language="javascript" src="timers-1.2.js"></script>

<script type="text/javascript">

$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".refreshMe").everyTime(5000,function(i){
			j.ajax({
			  url: "refresh-me.php",
			  cache: false,
			  success: function(html){
				j(".refreshMe").html(html);
			  }
			})
		})
	});
   j('.refreshMe').css({color:"red"});
});



</script>
</head>
<body>
<div class="refreshMe">This will get Refreshed in 5 Seconds</div>

</body>
</html>
