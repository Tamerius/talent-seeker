@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Applications overview</div>

                <div class="panel-body">
                    <form action="/home" type="POST" class="col-md-6 col-md-offset-3">
                        <input type="submit" value="Filter" />
                    </form>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->admin == 1)
                        @forelse ($applications as $application)
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a href="/applications/{{ $application->id }}">
                                            {{ $application->name }} for the position of {{ $application->position }}.
                                        </a>
                                    </div>
                                    <div class="panel-body">
                                        <p>
                                            @if ($application->yearsExperience == 0)
                                                No experience yet.
                                            @elseif ($application->yearsExperience == 1)
                                                {{ $application->yearsExperience }} year of experience as {{ $application->position }}.
                                            @else
                                                {{ $application->yearsExperience }} years of experience as {{ $application->position }}.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                No applications yet.
                            </div>
                        @endforelse

                        <div class="col-md-12 text-center">
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
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                No applications yet.
                            </div>
                        @endforelse                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
