<html>
<head>
<meta http-equiv="refresh" content="300; URL=http://p3a.erviker.info">
<LINK href="style.css" rel="stylesheet" type="text/css">


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

<script language="javascript" type="text/javascript">
function loadsum(){
	$('#sum').load('data.php',function () {
			$(this).unwrap();
			});
}
function loadsong(){
        $('#song').load('song.php',function () {
                        $(this).unwrap();
                        });
}

function loadtid(){
        $('#tid').load('ti.php',function () {
                        $(this).unwrap();
                        });
}
loadtid();
loadsum();
loadsong();
setInterval(function(){loadtid()}, 10000);
setInterval(function(){loadsum()}, 10000);
setInterval(function(){loadsong()}, 10000);
</script>


<script type="text/javascript"
src="https://www.google.com/jsapi?autoload={
'modules':[{
	'name':'visualization',
		'version':'1',
		'packages':['corechart']
}]
}"></script>

<script type="text/javascript">
google.setOnLoadCallback(drawChart);

function drawChart() {
	var data = google.visualization.arrayToDataTable([
			<?php include("graphdata.php"); ?>
			]);

	var options = {
	title: '',
	curveType: 'function',
	legend: { position: 'bottom' },
	backgroundColor: "transparent",
	};

	var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

	chart.draw(data, options);
}
</script>
</head>
<body>
<div id="head">
P3 Aksjonen 2015
</div>
<div id="headu">
&#216;veste del oppdatere seg kvart 1 minutt, nederste kvart 5 min.
</div>


<div id="tid">
laster...
</div>
<div id="sum">
Laster...
<table id="sumtabell">
<tbody>
<tr><td>P3A til 2133: </td><td> Laster... </td></tr>
<tr><td>Auksjoner:    </td><td> Laster...</td></tr>
<tr><td>Total:       </td><td> Laster...</td></tr>
</tbody>
</table>
</div>
<div id=song>
Laster...
</div>


<div id="curve_chart"</div>

</body>
</html>
