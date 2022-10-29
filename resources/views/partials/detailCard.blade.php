<div class="card" style="width: 30rem; margin: auto">
    <img class="card-img-top" src="{{asset('storage/image/'.$car->image)}}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Audi {{$car->type. $car->serie}} {{$car->carroserie}}</h5>
        <p class="card-text">Deze auto heeft een vermogen van {{$car->horsepower}}pk ({{$car->horsepower*0.73}}kw).
            Hij is samengesteld in {{$car->year}}.</p>
        <a href="{{route('car.index')}}" class="btn btn-primary">Terug</a>
    </div>

    @if($car->tags)
        <div style="display: flex; border-top: 1px solid rgba(0, 0, 0, 0.18)">
            @endif
            @foreach($car->tags as $tag)
                <button type="button" class="btn btn-info"
                        style="width: 6rem; margin: 12px;border-radius: 25px">{{$tag->name}}</button>
            @endforeach

        </div>
</div>
