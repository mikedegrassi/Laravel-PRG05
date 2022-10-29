<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'user_id',
        'serie',
        'carroserie',
        'year',
        'horsepower',
        'information',
        'image',
        'tags'
    ];

    public $timestamps = false;

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function tags()
    {
       return $this->belongsToMany(Tag::class);
    }
}
