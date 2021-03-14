@extends('layouts.master')
@section('title')
    Admin
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
                        <div class="h4 mb-0"> {{ count($bookmarkers) }}</div>
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
                        <div class="h4 mb-0">{{ count($publiclotteries) }}</div>
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
                    <div class="h4 mb-0"> {{ count($bookmarkers) }}</div>
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
                        <div class="h4 mb-0"></div>
                        <div class="weight-600 font-14"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-box mb-30">
        <h2 class="h4 pd-20">Best Gaming </h2>
        <div class="bg-white pd-20 card-box mb-30">
        @section('content')
    <div class="card-box mb-30">
        <h2 class="h4 pd-20">Best Gaming </h2>
            <div id="companyggrchart">
                {{-- {!! $companyggrchart->container() !!} --}}
            </div>
    </div>
@endsection
    </div>

	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-3d.js"></script>
	<script src="src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
	<script src="vendors/scripts/highchart-setting.js"></script>

@endsection
