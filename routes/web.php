<?php

use App\Http\Controllers\ApiController;
use App\Livewire\WeatherTable;
use Illuminate\Support\Facades\Route;


Route::get("/api-weather/{lat}/{lon}", [ApiController::class, 'getApi']);

Route::get('/weather', WeatherTable::class);