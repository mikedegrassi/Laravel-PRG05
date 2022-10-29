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

                        <form action="{{route('car.update', $car->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="row mb-3">
                                <label for="audi-type" class="col-md-4 col-form-label text-md-end">Modellen</label>

                                <div class="col-md-6">
                                    <select name="type" id="audi-type">
                                        <option>{{old('type', $car->type)}}</option>
                                        <option value="e-tron">e-tron</option>
                                        <option value="A">A</option>
                                        <option value="Q">Q</option>
                                        <option value="TT">TT</option>
                                        <option value="S">S</option>
                                        <option value="RS">RS</option>
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="audi-serie" class="col-md-4 col-form-label text-md-end">Serie</label>

                                <div class="col-md-6">
                                    <select name="serie" id="audi-serie">
                                        <option>{{old('serie', $car->serie)}}</option>
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
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="audi-carroserie"
                                       class="col-md-4 col-form-label text-md-end">Carroserie</label>

                                <div class="col-md-6">
                                    <select name="carroserie" id="audi-carroserie">
                                        <option value="sportback">Sportback</option>
                                        <option value="cabrio">Cabrio</option>
                                        <option value="avant">Avant</option>
                                    </select>
                                    @error('carroserie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="audi-year"
                                       class="col-md-4 col-form-label text-md-end">Bouwjaar</label>

                                <div class="col-md-6">
                                    <input id="audi-year"
                                           type="number"
                                           name="year"
                                           min="2010"
                                           max="2022"
                                           value="{{old('year', $car->year)}}"/>
                                    @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="audi-horsepower"
                                       class="col-md-4 col-form-label text-md-end">Paardenkracht</label>
                                <div class="col-md-6">
                                    <input id="audi-horsepower"
                                           type="number"
                                           name="horsepower"
                                           value="{{old('horsepower', $car->horsepower)}}"/>
                                    @error('horsepower')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="audi-information"
                                       class="col-md-4 col-form-label text-md-end">Informatie</label>
                                <div class="col-md-6">
                                    <input id="audi-information"
                                           type="text"
                                           name="information"
                                           value="{{old('information', $car->information)}}"/>
                                    @error('information')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="audi-image"
                                       class="col-md-4 col-form-label text-md-end">Foto</label>
                                <div class="col-md-6">
                                    <input id="audi-image"
                                           type="file"
                                           name="image"
                                           value="{{old('image')}}" required/>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <h2>Tags</h2>

                            @foreach($tags as $tag)

                                <div>
                                    <div class="form-check form-switch" style="margin-top: 5px;">
                                        <input name="tags[]" class="form-check-input" type="checkbox"
                                               id="flexSwitchCheckDefault" value="{{$tag->id}}"
                                             @if($car->tags->contains($tag->id)) checked="checked" @endif>
                                        <label class="form-check-label"
                                               for="flexSwitchCheckDefault">{{$tag->name}}</label>
                                    </div>
                                    @error('tags')
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>
                            @endforeach


                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
