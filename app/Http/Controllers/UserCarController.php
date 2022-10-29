<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class UserCarController extends Controller
{
    public function index()
    {
        $cars = Car::where('user_id', '=',   \Auth::id())->get();

        return view('userCar.home', [
            'cars' => $cars
        ]);
    }
}
