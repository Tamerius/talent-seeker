@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h1>{{ $application->name }}</h1>
				<h5>{{ $application->email }}</h5>
				<div>Years of experience: {{ $application->yearsExperience }}</div>

				<a href="/home" class="btn btn-primary">Back to overview</a>
				@if (Auth::user()->admin == 1)
					<button class="btn btn-success">Hire!</button>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection