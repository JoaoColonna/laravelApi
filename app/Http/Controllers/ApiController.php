<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\WeatherCondition;
use App\Models\WeatherData;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    protected $apiKey;
    public function __construct()
    {
        $this->apiKey = env("API_WEATHER_KEY");
    }

    public function getApi($lat = false, $lon = false)
    {   
        if (!is_numeric($lat) || !isset($lat)) {
            return view("result", ['status' => "error", 'message' => 'Valor de latitude inválido!']);
        } else if (!is_numeric($lon) || !isset($lon)) {
            return view("result", ['status' => "error", 'message' => 'Valor de longitudo inválido!']);
        }   

        try {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&lang=pt&appid=" . $this->apiKey);
        } catch (\Exception $e) {
            Log::error($e);
            return view("result", ['status' => "error", 'message' => 'Não foi possível retornar os dados da Api']);
        }
        
        if ($response->successful()) {
            $this->store($response->json());
            return view("result", ["status" => "success", "message" => "Sucesso!", "jsonData" => json_encode($response->json(), JSON_PRETTY_PRINT)]);
            // return response()->json(["status" => "success", "message" => $response->json()]);
        } else {
            return view("result", ['status' => "error", 'message' => 'Não foi possível retornar os dados da Api']);
        }
    }

    private function store($json = false)
    {
        if (!$json) {
            return;
        }
        
        try {
            
            $locationData = [
                'name' => !empty($json['name']) ? $json['name'] : 'Desconhecido',
                'lon' => $json['coord']['lon'] ?? 0,
                'lat' => $json['coord']['lat'] ?? 0,
                'country' => $json['sys']['country'] ?? 'Unknown'
            ];
    
            $location = Location::updateOrCreate(
                ['lat' => $locationData['lat'], 'lon' => $locationData['lon']],
                $locationData
            );
    
            $weatherConditionData = $json['weather'][0] ?? [];
            $weatherCondition = WeatherCondition::updateOrCreate(
                ['icon' => $weatherConditionData['icon']],
                [
                    'main' => $weatherConditionData['main'] ?? 'Unknown',
                    'description' => $weatherConditionData['description'] ?? 'Unknown'
                ]
            );
            
            WeatherData::updateOrCreate(
                ['location_id' => $location->id, 'weather_condition_id' => $weatherCondition->id, 'dt' => $json['dt'] ?? time()],
                [
                    'temp' => $this->convertKinC($json['main']['temp']) ?? 0,
                    'feels_like' => $this->convertKinC($json['main']['feels_like']) ?? 0,
                    'temp_min' => $this->convertKinC($json['main']['temp_min']) ?? 0,
                    'temp_max' => $this->convertKinC($json['main']['temp_max']) ?? 0,
                    'pressure' => $json['main']['pressure'] ?? 0,
                    'humidity' => $json['main']['humidity'] ?? 0,
                    'sea_level' => $json['main']['sea_level'] ?? 0,
                    'grnd_level' => $json['main']['grnd_level'] ?? 0,
                    'visibility' => $json['visibility'] ?? 0,
                    'wind_speed' => $json['wind']['speed'] ?? 0,
                    'wind_deg' => $json['wind']['deg'] ?? 0,
                    'wind_gust' => $json['wind']['gust'] ?? 0,
                    'rain_1h' => $json['rain']['1h'] ?? 0,
                    'clouds_all' => $json['clouds']['all'] ?? 0,
                    'dt' => $json['dt'] ?? time(),
                    'sunrise' => $json['sys']['sunrise'] ?? 0,
                    'sunset' => $json['sys']['sunset'] ?? 0,
                    'timezone' => $json['timezone'] ?? 0,
                ]
            );
        } catch (\Exception $e) {
            Log::error($e);
            return view("result", ['status' => "error", 'message' => 'Não foi possível inserir as informações da api no banco de dados']);
        }
    }

    private function convertKinC($val){
        return $val - 273.15;
        
    }

}
