<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function getApi($lat = false, $lon = false)
    {   
        if (!is_numeric($lat) || !isset($lat)) {
            return view("result", ['status' => "error", 'message' => 'Valor de latitude inválido!']);
        } elseif (!is_numeric($lon) || !isset($lon)) {
            return view("result", ['status' => "error", 'message' => 'Valor de longitude inválido!']);
        }

        try {
            $data = $this->weatherService->getWeatherData($lat, $lon);

            if ($data['status'] == "success") {
                return view("result", ["status" => "success", "message" => "Sucesso!", "jsonData" => json_encode($data['jsonData'], JSON_PRETTY_PRINT)]);
            } else {
                return view("result", ['status' => "error", 'message' => $data['message']]);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return view("result", ['status' => "error", 'message' => 'Não foi possível retornar os dados da API']);
        }
    }
}
