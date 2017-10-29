@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h1>{{ $application->name }}</h1>
				
				@if (Auth::user()->admin == 1)
					<form class="form-horizontal" method="POST" action="/applications">
					    {{ csrf_field() }}

					    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					    	<input type="hidden" name="id" value="{{ $application->id }}" />
					        <label for="name" class="col-md-4 control-label">Name</label>

					        <div class="col-md-6">
					            <input id="name" type="text" class="form-control" name="name" value="{{ $application->name }}" required autofocus>

					            @if ($errors->has('name'))
					                <span class="help-block">
					                    <strong>{{ $errors->first('name') }}</strong>
					                </span>
					            @endif
					        </div>
					    </div>

					    <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
					        <label for="position" class="col-md-4 control-label">Job position</label>

					        <div class="col-md-6">
					            <input id="position" type="position" class="form-control" name="position" value="{{ $application->position }}" required>

					            @if ($errors->has('position'))
					                <span class="help-block">
					                    <strong>{{ $errors->first('position') }}</strong>
					                </span>
					            @endif
					        </div>
					    </div>

					    <div class="form-group{{ $errors->has('daysAvailable') ? ' has-error' : '' }}">
					        <label for="daysAvailable" class="col-md-4 control-label">Days available per week</label>

					        <div class="col-md-6">
					            <input id="daysAvailable" type="number" min="1" max="7" class="form-control" name="daysAvailable" value="{{ $application->daysAvailable }}" required>

					            @if ($errors->has('daysAvailable'))
					                <span class="help-block">
					                    <strong>{{ $errors->first('daysAvailable') }}</strong>
					                </span>
					            @endif
					        </div>
					    </div>

					    <div class="form-group{{ $errors->has('yearsExperience') ? ' has-error' : '' }}">
					        <label for="yearsExperience" class="col-md-4 control-label">Years of experience</label>

					        <div class="col-md-6">
					            <input id="yearsExperience" type="number" min="0" class="form-control" name="yearsExperience" value="{{ $application->yearsExperience }}" required>

					            @if ($errors->has('yearsExperience'))
					                <span class="help-block">
					                    <strong>{{ $errors->first('yearsExperience') }}</strong>
					                </span>
					            @endif
					        </div>
					    </div>

					    <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
					        <label for="notes" class="col-md-4 control-label">Notes</label>

					        <div class="col-md-6">
					            <textarea id="notes" class="form-control" name="notes">{{ $application->notes }}</textarea>

					            @if ($errors->has('notes'))
					                <span class="help-block">
					                    <strong>{{ $errors->first('notes') }}</strong>
					                </span>
					            @endif
					        </div>
					    </div>

						<div class="form-group">
							<div class="input-group col-md-4 col-md-offset-4">
								<div class="input-group-btn">
									<button type="submit" class="btn btn-primary">
										Save
									</button>
								</div>
								<div class="input-group-btn">
									@if (Auth::user()->admin == 1 && ($application->hired == "pending" || $application->hired == "dismissed"))
										<form action="" method="POST">
											<button class="btn btn-success">
												Hire											</button>
										</form>
									@endif
								</div>
								<div class="input-group-btn">
									@if (Auth::user()->admin == 1 && ($application->hired == 'pending' || $application->hired == 'hired'))
										<form action="" method="POST">
											<button class="btn btn-danger">
												Dismiss
											</button>
										</form>
									@endif
								</div>
								<div class="input-group-btn">
									@if (Auth::user()->admin == 1 || $application->user_id == Auth::id())
										<form action="/applications/{{ $application->id }}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button class="btn btn-warning">
												Delete
											</button>
										</form>
									@endif
								</div>
							</div>
				        </div>
					</form>
				@else
					<p>This is the overview page for your job application.</p>
					<table class="col-md-6 col-md-offset-3">
						<tr>
							<td>Naam</td>
							<td>{{ $application->name }}</td>
						</tr>
						<tr>
							<td>Position</td>
							<td>{{ $application->position }}</td>
						</tr>
						<tr>
							<td>Weekdays available</td>
							<td>{{ $application->daysAvailable }}</td>
						</tr>
						<tr>
							<td>Years of experience</td>
							<td>{{ $application->yearsExperience }}</td>
						</tr>
						<tr>
							<td>Page views</td>
							<td>{{ $application->views }}</td>
						</tr>
						<tr>
							<td>Status</td>
							<td>{{ $application->hired }}</td>
						</tr>
					</table>
				@endif
				<div class="col-md-6">
					<a href="/home" class="btn btn-link">Back to overview</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection