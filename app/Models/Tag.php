<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function cars()
    {
       return $this->belongsToMany(Car::class,'car_tag', 'car_id', 'tag_id');
    }


}
