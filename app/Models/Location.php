<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'lon', 'lat', 'country'
    ];

    public function weatherData()
    {
        return $this->hasOne(WeatherData::class);
    }
}

