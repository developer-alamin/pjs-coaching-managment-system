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
		<br>
    	<div class="chartDiv">
    		<div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Area Chart Example
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
    	</div>
	</div>
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection