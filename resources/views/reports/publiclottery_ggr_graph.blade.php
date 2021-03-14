@extends('layouts.master')
@section('title')
    Company GGR Reports
@endsection
@section('filter')
<form>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">From</label>
		<div class="col-sm-12 col-md-10">
			<input name="from" class="form-control form-control-sm form-control-line" type="date">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">To</label>
		<div class="col-sm-12 col-md-10">
			<input name="to" class="form-control form-control-sm form-control-line" type="date">
		</div>
	</div>
	<!-- <div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Subject</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control form-control-sm form-control-line" type="text">
		</div>
	</div> -->
	<div class="text-right">
		<button type="submit" class="btn btn-primary">Search</button>
	</div>
</form>
@endsection
@section('content')
    <div class="card-box mb-30">
        <h2 class="h4 pd-20">Public Lottery </h2>
            <div id="publiclotteryggrchart">
                {!! $publiclotteryggrchart->container() !!}
            </div>
    </div>
@endsection