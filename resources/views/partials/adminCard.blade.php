@foreach($cars as $car)
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('storage/image/'.$car->image)}}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text">{{$car->type}}</p>
        </div>

        <form action="{{route('car.show', $car->id)}}">
            @csrf
            <button class="btn btn-default" type="submit">Details</button>
        </form>
        <form action="{{ route("car.destroy", $car->id) }}" method="post">
            @csrf
            {{ method_field('delete') }}
            <button class="btn btn-default" type="submit">Delete</button>
        </form>

        <input type="checkbox" class="toggle-class" data-toggle="toggle"
               data-id="{{$car->id}}" data-on="Enabled" data-off="Disabled"
            {{$car->status == true ? 'checked' : ''}}>
        {{--                            <input type="checkbox" id="toggle-two">--}}

        <a class="btn btn-default" href="{{route('car.edit', $car->id)}}">edit</a>

    </div>

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
                let car_id = $(this).data('id');
                let token = document.querySelector('meta[name="csrf-token"]').content;

                $.ajax({
                    type: "POST",
                    datatype: 'json',
                    url: '{{route('changeStatus')}}',
                    data: {
                        '_token': token,
                        'status': status,
                        'car_id': car_id
                    },
                    success: function (data) {

                    }
                })
            })
        </script>
    @endpush
@endforeach
