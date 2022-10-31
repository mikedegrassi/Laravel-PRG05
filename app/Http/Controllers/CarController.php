<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Tag;
use Illuminate\Http\Request;


class CarController extends Controller
{
    public function __construct()
    {
//        $this->middleware(['auth','admin'])->except(['index', 'show', 'create']);
        $this->middleware(['admin'])->only(['destroy', 'changeStatus']);
        $this->middleware(['admin', 'auth'])->only(['create', 'store', 'update', 'edit']);

    }

    public function index()
    {
        $cars = Car::Paginate(3);
        $tags = Tag::all();
        $melding = '';


        return view('car.home', [
            'cars' => $cars,
            'tags' => $tags,
            'melding' => $melding
        ]);
    }

    public function show($id)
    {
        $cars = Car::Paginate(3);
        $tags = Tag::all();

        $madeCars = Car::where('user_id', '=', \Auth::id())->count();
        $melding = 'Je moet eerst drie autos bezitten wil je andermans auto details zien.';

        $car = Car::find($id);

        if (\Auth::guest() || \Auth::id() !== $car->user_id && \Auth::user()->role !== 'admin') {
            return view('car.home', compact('melding', 'tags', 'cars', $madeCars));
        }

        return view('car.detail', [
                'car' => $car
            ]
        );
    }

    public function create()
    {
        $tags = Tag::all();
        return view('car.create', [
            'tags' => $tags
        ]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'type' => 'required',
            'serie' => 'required',
            'carroserie' => 'required',
            'year' => 'required',
            'horsepower' => 'required',
            'tags' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg,png'
            ]);
        }

        $request->file('image')->storePublicly('image', 'public');

        $car = new Car([
            "user_id" => \Auth::user()->id,
            "type" => $request->get('type'),
            "serie" => $request->get('serie'),
            "carroserie" => $request->get('carroserie'),
            "year" => $request->get('year'),
            "horsepower" => $request->get('horsepower'),
            "information" => $request->get('information'),
            "image" => $request->file('image')->hashName(),
        ]);

        $car->save();

        $car->tags()->attach($request->input('tags'));

        return redirect()->route('car.index');
    }

    public function edit($id)
    {
        $car = Car::find($id);
        if ($car->user_id !== \Auth::user()->id ) {
            return redirect()->route('car.index');
        } else {
            $tags = Tag::all();
            return view('car.edit', compact('tags', 'car'));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'serie' => 'required',
        ]);

        $request->file('image')->storePublicly('image', 'public');

        $car = Car::find($id);
        if ($car->user_id !== \Auth::user()->id) {
            return redirect()->route('car.index');
        } else {
            $car->type = $request->get('type');
            $car->serie = $request->get('serie');
            $car->carroserie = $request->get('carroserie');
            $car->year = $request->get('year');
            $car->horsepower = $request->get('horsepower');
            $car->information = $request->get('information');
            $car->image = $request->file('image')->hashName();
        }

        $car->update();

        $car->tags()->sync($request->input('tags'));

        return redirect()->route('car.index');
    }

    public function destroy($id)
    {
        $car = Car::find($id);
        if ($car->user_id === \Auth::id() || \Auth::user()->role === 'admin') {
            $car->delete();
        }

        if (\Auth::user() && \Auth::user()->role === 'admin') {
            return redirect('car');
        } elseif (\Auth::user()) {
            return redirect('userCar');
        }
    }

    public function changeStatus(Request $request)
    {
        $car = Car::find($request->car_id);
        $car->status = $request->status;
        $car->save();
    }

    public function search()
    {

        $searched_Car = $_GET['searchQuery'];
        $cars = Car::where('type', 'LIKE', '%' . $searched_Car . '%')
            ->orWhere('serie', 'LIKE', '%' . $searched_Car . '%')->get();

        return view('car.search', compact('cars'));
    }

    public function tagSearch()
    {
        $searched_tag = $_GET['searchedTag'];
        $cars = Car::whereHas('tags', function ($q) use ($searched_tag) {
            $q->where('name', '=', $searched_tag);
        })->get();

        return view('car.search', compact('cars'));
    }

}
