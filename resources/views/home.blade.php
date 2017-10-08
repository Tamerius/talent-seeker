@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Applications overview</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @forelse ($applications as $application)
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    {{ $application->name }}
                                </div>
                                <div class="panel-body">
                                    @if ($application->yearsExperience == 0)
                                        No experience yet.
                                    @elseif ($application->yearsExperience == 1)
                                        {{ $application->yearsExperience }} year of experience as {{ $application->position }}.
                                    @else
                                        {{ $application->yearsExperience }} years of experience as {{ $application->position }}.
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            No applications yet.
                        </div>
                    @endforelse

                    <div class="col-md-12 text-center">
                        <a href="/applications/create" class="btn btn-success">Start new application</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
