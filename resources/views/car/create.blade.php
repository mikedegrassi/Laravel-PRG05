@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Assemble Your Audi') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('car.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>

                                <div>
                                    <input id="user_id"
                                           type="hidden"
                                           name="user_id"
                                           value="{{auth()->id()}}"/>
                                    @error('user_id')
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>

                                <h2>
                                    Modellen
                                </h2>

                                <div>
                                    <select name="type" id="audi-type">
                                        <option value="e-tron">e-tron</option>
                                        <option value="A">A</option>
                                        <option value="Q">Q</option>
                                        <option value="TT">TT</option>
                                        <option value="S">S</option>
                                        <option value="RS">RS</option>
                                    </select>
                                    @error('type')
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>

                                <h2>
                                    Serie
                                </h2>
                                <div>
                                    <select name="serie" id="audi-serie">
                                        <option disabled selected value></option>
                                        <option class="number" value="1">1</option>
                                        <option class="number" value="2">2</option>
                                        <option class="number" value="3">3</option>
                                        <option class="number" value="4">4</option>
                                        <option class="number" value="5">5</option>
                                        <option class="number" value="6">6</option>
                                        <option class="number" value="7">7</option>
                                        <option class="number" value="8">8</option>
                                        <option class="number" value="Q3">Q3</option>
                                        <option class="number" value="Q4">Q4</option>
                                        <option class="number" value="Q5">Q5</option>
                                        <option class="number" value="Q7">Q7</option>
                                        <option class="number" value="Q8">Q8</option>
                                    </select>
                                    @error('serie')
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>

                                <h2>
                                    Carroserie
                                </h2>
                                <div>
                                    <select name="carroserie" id="audi-carroserie">
                                        <option value="sportback">Sportback</option>
                                        <option value="cabrio">Cabrio</option>
                                        <option value="avant">Avant</option>
                                    </select>
                                    @error('carroserie')
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>

                                <h2>
                                    Bouwjaar
                                </h2>
                                <div>
                                    <label for="year" class="form-label"></label>
                                    <input id="year"
                                           type="number"
                                           name="year"
                                           min="2010"
                                           max="2022"
                                           value="{{old('year')}}"/>
                                    @error('year')
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>

                                <h2>
                                    Paardenkracht
                                </h2>
                                <div>
                                    <label for="horsepower" class="form-label"></label>
                                    <input id="horsepower"
                                           type="number"
                                           name="horsepower"
                                           value="{{old('horsepower')}}"/>
                                    @error('horsepower')
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>

                                <h2>
                                    Informatie
                                </h2>
                                <div>
                                    <label for="information" class="form-label"></label>
                                    <input id="information"
                                           type="text"
                                           name="information"
                                           value="{{old('information')}}"/>
                                    @error('information')
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>

                                <h2>
                                    Image
                                </h2>

                                <div>
                                    <label for="image" class="form-label"></label>
                                    <input id="image"
                                           type="file"
                                           name="image"
                                           value="{{old('image')}}" required/>
                                    @error('image')
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>

                                <h2>
                                    Tag
                                </h2>

                                @foreach($tags as $tag)
                                    <div>
                                        <input id="tag"
                                               type="checkbox"
                                               name="tags[]"
                                               value="{{$tag->id}}"
                                               @if(old('tags') && in_array($tag->id, old('tags'))) checked="checked" @endif/>
                                        <label for="tag" class="form-label">{{$tag->name}}</label>
                                        @error('tag')
                                        <span>{{$message}}</span>
                                        @enderror
                                    </div>
                                @endforeach

                                <input type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
