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
                    <a href="{{route('car.index')}}" class="btn btn-primary">Terug</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#toggle-two').bootstrapToggle({
                on: 'Enabled',
                off: 'Disabled'
            });
        })
    </script>

    <script>
        $('.toggle-class').on('change', function () {
            let status = $(this).prop('checked') === true ? 1 : 0;
            alert(status);
            let car_id = $(this).data('id');
            alert(car_id);

            $.ajax({
                type: 'GET',
                datatype: 'JSON',
                url: '{{route('changeStatus')}}',
                data: {
                    'status': status,
                    'car_id': car_id
                },
                success: function (data) {

                }
            })
        })
    </script>
@endpush
