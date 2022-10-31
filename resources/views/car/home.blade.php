@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <span style="text-align: center; color: red">{{$melding}}</span>

                    <div class="card-header">{{ __('Collection') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="flex-container">

                            @if(\Auth()->user() && \Auth()->user()->role === 'admin')
                                @include('partials.adminCard')
                            @else()
                                @include('partials.userCard')
                            @endif

                        </div>
                    </div>

                    @if(\Auth()->user())
                        <a class="btn btn-success" href="{{route('car.create')}}">Stel Samen</a>
                    @endif
                </div>

                @foreach($tags as $tag)
                    <form action="{{route('tagSearch')}}">
                        <div class="btn-group" role="group" style="margin-top: 20px">
                            <button type="submit" name="searchedTag" value="{{$tag->name}}"
                                    class="btn btn-outline-info">{{$tag->name}}</button>
                        </div>
                    </form>
                @endforeach

                {{$cars->links()}}
            </div>
        </div>
    </div>
@endsection
