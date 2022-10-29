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
@endforeach
