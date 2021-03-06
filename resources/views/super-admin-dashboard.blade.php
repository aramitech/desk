@extends('layouts.master')
@section('title')
    SuperAdmin
@endsection
@section('content')
<div class="row">
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <div id="chart"></div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">2020</div>
                        <div class="weight-600 font-14">Bookmarkers</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <div id="chart2"></div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">400</div>
                        <div class="weight-600 font-14">Public Lottery</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <div id="chart3"></div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">350</div>
                        <div class="weight-600 font-14">Public Gaming</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <div id="chart4"></div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">Ksh 6060</div>
                        <div class="weight-600 font-14">Worth</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20">Activity</h2>
                <div id="chart5"></div>
            </div>
        </div>
        <div class="col-xl-4 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20">Lead Target</h2>
                <div id="chart6"></div>
            </div>
        </div>
    </div>
    <div class="card-box mb-30">
        <h2 class="h4 pd-20">Best Gaming </h2>
        <div class="bg-white pd-20 card-box mb-30">
					<div id="chart1"></div>
				</div>
				<div class="bg-white pd-20 card-box mb-30">
					<div id="chart2"></div>
				</div>
				<div class="bg-white pd-20 card-box mb-30">
					<div id="chart3"></div>
				</div>
				<div class="bg-white pd-20 card-box mb-30">
					<div id="chart4"></div>
				</div>
				<div class="bg-white pd-20 card-box mb-30">
					<div id="chart5"></div>
				</div>
				<div class="bg-white pd-20 card-box mb-30">
					<div id="chart6"></div>
				</div>
				<div class="bg-white pd-20 card-box mb-30">
					<div id="chart7"></div>
				</div>
				<div class="bg-white pd-20 card-box mb-30">
					<div id="chart8"></div>
				</div>
    </div>

	<script src="src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-3d.js"></script>
	<script src="src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
	<script src="vendors/scripts/highchart-setting.js"></script>
@endsection
