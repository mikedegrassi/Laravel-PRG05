@foreach($cars as $car)
    @if($car->status)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('storage/image/'.$car->image)}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{$car->type}}</p>
                <p class="card-text">{{$car->carroserie}}</p>
            </div>


            <form action="{{route('car.show', $car->id)}}">
                @csrf
                <button class="btn btn-default" type="submit">Details</button>
            </form>
        </div>
    @endif
@endforeach
