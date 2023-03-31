@extends('admin.app')
@section('title','Admin | Home')
@section('content')
	<div class="homepageDiv">
		<div class="homeCardDiv">
			<br>
			<div class="row">
				<div class="col-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">All</h5>
							<h4 class="card-title">22</h4>
						</div>
					</div>
				</div>
				<div class="col-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Five</h5>
							<h4 class="card-title">22</h4>
						</div>
					</div>
				</div>
				<div class="col-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Six</h5>
							<h4 class="card-title">22</h4>
						</div>
					</div>
				</div>
				<div class="col-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Seven</h5>
							<h4 class="card-title">22</h4>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Eight</h5>
							<h4 class="card-title">22</h4>
						</div>
					</div>
				</div>
				<div class="col-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Nine</h5>
							<h4 class="card-title">22</h4>
						</div>
					</div>
				</div>
				<div class="col-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">SSC</h5>
							<h4 class="card-title">22</h4>
						</div>
					</div>
				</div>
				<div class="col-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">HSC</h5>
							<h4 class="card-title">22</h4>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Collage</h5>
							<h4 class="card-title">22</h4>
						</div>
					</div>
				</div>
				<div class="col-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Arts</h5>
							<h4 class="card-title">22</h4>
						</div>
					</div>
				</div>
				<div class="col-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">science</h5>
							<h4 class="card-title">22</h4>
						</div>
					</div>
				</div>
				<div class="col-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Madrasah</h5>
							<h4 class="card-title">22</h4>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="chatTitle">
			<h4>PJS Coaching Center Student Chart</h4>
		</div>
		<div class="row">
		 	<div class="col-12">
		 		 <canvas id="myChart" style="width:100%;height: 400px;"></canvas>
		 	</div>
		</div>
	</div>
@endsection

@section('script')
<script type="text/javascript">
	const xValues = ['January','February','March','April','May','June','July','August','September','October','November','December'];
const yValues = [7,8,8,9,9,9,10,11,14,14,15,10];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 1, max:50}}],
    }
  }
});




google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([
  ['Contry', 'Mhl'],
  ['Five',54.8],
  ['Six',48.6],
  ['Seven',44.4],
  ['Eight',23.9],
  ['Nine',30.5],
  ['Ten',48.6],
  ['SSC',48.6],
  ['Collage',48.6],
  ['HSC',48.6]
]);

var options = {
  title:'PJS Coaching Center Student Chart',
  is3D:true
};

var chart = new google.visualization.PieChart(document.getElementById('circlemyChart'));
  chart.draw(data, options);
}
</script>
@endsection