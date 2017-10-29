@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="text-center">Applications overview</h2>
                    @if (Auth::user()->admin == 1)
                        <h3 class="text-center">Filter</h3>
                        <form class="form-horizontal" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('daysAvailable') ? ' has-error' : '' }}">
                                <label for="daysAvailable" class="col-md-4 control-label">Days available</label>

                                <div class="col-md-6">
                                    <input id="daysAvailable" type="number" min="1" max="7" value="{{ $request['daysAvailable'] }}"
                                        class="form-control" name="daysAvailable" autofocus >

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
                                    <input id="yearsExperience" type="number" min="0"
                                    class="form-control" name="yearsExperience" value="{{ $request['yearsExperience'] }}">

                                    @if ($errors->has('yearsExperience'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('yearsExperience') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 class="text-center">Applications</h3>
                    @if (Auth::user()->admin == 1)
                        @forelse ($applications as $application)
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a href="/applications/{{ $application->id }}">
                                            {{ $application->name }} for the position of {{ $application->position }}.
                                        </a>
                                        @if ($application->hired == 'hired')
                                            <i class="fa fa-handshake-o pull-right"></i>
                                        @elseif ($application->hired == 'dismissed')
                                            <i class="fa fa-times pull-right"></i>
                                        @else
                                            <i class="fa fa-clock-o pull-right"></i>
                                        @endif
                                    </div>
                                    <div class="panel-body">
                                        <p>
                                            {{ $application->notesShort }}
                                        </p>
                                    </div>
                                    <div class="panel-footer">
                                        <p>
                                            {{ $application->experienceDescription }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <p>No applications found.</p>
                            </div>
                        @endforelse

                        <div class="col-md-4 col-md-offset-4 text-center">
                            <a href="/applications/create" class="btn btn-primary">New</a>
                        </div>
                    @else
                        @forelse ($applications as $application)
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <a href="/applications/{{ $application->id }}">
                                                {{ $application->position }}
                                            </a>
                                        </div>
                                    <div class="panel-body">
                                        <p>
                                            Current status: {{ $application->hired }}
                                            @if ($application->hired == 'hired')
                                                <i class="fa fa-handshake-o pull-right"></i>
                                            @elseif ($application->hired == 'dismissed')
                                                <i class="fa fa-times pull-right"></i>
                                            @else
                                                <i class="fa fa-clock-o pull-right"></i>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-4 col-md-offset-4 text-center">
                                No applications found.
                            </div>
                        @endforelse                        
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-4 col-md-offset-4 text-center">
                        {{ $applications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
