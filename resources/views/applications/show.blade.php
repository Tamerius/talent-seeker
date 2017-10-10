@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h1>{{ $application->name }}</h1>
				<h5>{{ $application->email }}</h5>
				<ul>
					<li>Years of experience: {{ $application->yearsExperience }}</li>
				</ul>

				<button class="btn btn-success">Hire</button>
			</div>
		</div>
	</div>
</div>

@endsection