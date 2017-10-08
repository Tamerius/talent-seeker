@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h1>{{ $user->name }}</h1>
				<h5>{{ $user->email }}</h5>
				<h5>
					@if (!empty($user['dateOfBirth']))
						{{ $user->dateOfBirth->age }} years old.
					@else
						Age unknown.
					@endif
				</h5>

				<button class="btn btn-success">Hire</button>
			</div>
		</div>
	</div>
</div>

@endsection