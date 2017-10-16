@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h1>View or edit {{ $application->name }}</h1>
				
				@if (Auth::user()->admin == 1)
					<form class="form-horizontal" method="POST" action="/applications">
					    {{ csrf_field() }}

					    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
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
					            <input id="daysAvailable" type="number" min="1" max="5" class="form-control" name="daysAvailable" value="{{ $application->daysAvailable }}" required>

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
					            <textarea id="notes" class="form-control" name="notes">
					            	{{ $application->notes }}
					            </textarea>

					            @if ($errors->has('notes'))
					                <span class="help-block">
					                    <strong>{{ $errors->first('notes') }}</strong>
					                </span>
					            @endif
					        </div>
					    </div>

					    <div class="form-group">
					        <div class="col-md-6 col-md-offset-4">
					            <button type="submit" class="btn btn-primary">
					                Save
					            </button>
					        </div>
					    </div>
					</form>
					<button class="btn btn-success">Hire!</button>
				@endif
				<a href="/home" class="btn btn-primary">Back to overview</a>
			</div>
		</div>
	</div>
</div>

@endsection