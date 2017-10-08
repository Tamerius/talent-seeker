@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Overview</div>

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
                                    {{ $application->yearsExperience }} years experience as {{ $application->position }}
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
