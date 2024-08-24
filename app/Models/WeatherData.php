<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id', 'weather_condition_id', 'temp', 'feels_like', 'temp_min',
        'temp_max', 'pressure', 'humidity', 'sea_level', 'grnd_level', 'visibility',
        'wind_speed', 'wind_deg', 'wind_gust', 'rain_1h', 'clouds_all', 'dt', 
        'sunrise', 'sunset', 'timezone'
    ];

    public function location()
    {
        return $this->hasOne("App\Models\Location", 'id', 'location_id');
    }

    public function weatherCondition()
    {
        return $this->hasOne("App\Models\WeatherCondition", 'id', "weather_condition_id");
    }
}

