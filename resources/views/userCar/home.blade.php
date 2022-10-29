@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('List') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="flex-container">

                                @include('partials.adminCard')


                        </div>
                    </div>

                    @if(\Auth()->user())
                    <a class="btn btn-success" href="{{route('car.create')}}">Stel Samen</a>
                    @endif
                    <a href="{{route('car.index')}}" class="btn btn-primary">Terug</a>
                </div>
            </div>
        </div>
    </div>
@endsection
