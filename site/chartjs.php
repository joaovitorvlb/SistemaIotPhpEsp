<!DOCTYPE html>
<html>
	<head>
		<title>Simples Chart com PHP</title>

		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<style type="text/css">
			#chart-container {
				width: 1040px;
				height: auto;
			}
		</style>

<script>
var myVar = setInterval(chart_load, 5000);

$(document).ready(function(){

   chart_load();
	
});

function chart_load()
{
	$.ajax({
		url: "query_select_by_page_db.php?page=20",
		method: "GET",
		success: function(data) {
			console.log(data);
			var player = [];
			var score = [];

			var json = JSON.parse(data);
			
			for(var Y in json) {
			
				for(var k in json[Y]) {
				   console.log(k, json[Y][k]);
				   
				   
				   if(k==="timestamp") {
					 player.push(json[Y][k]);
				   }
				   if( k==="valor"){
					  score.push(json[Y][k]);
				   }
				}
			}
			
			var chartdata = {
				labels: player,
				datasets : [
					{
						label: 'CursoMQTT IOT',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: score
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
}

</script>
			</head>
	<body>
		<div id="chart-container">
			<canvas id="mycanvas"></canvas>
		</div>
	</body>
</html>