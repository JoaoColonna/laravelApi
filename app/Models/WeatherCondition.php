<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'main', 'description', 'icon'
    ];

    public function weatherData()
    {
        return $this->hasOne(WeatherData::class);
    }
}
