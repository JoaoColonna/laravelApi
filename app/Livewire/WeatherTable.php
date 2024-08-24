<?php

namespace App\Livewire;

use App\Models\WeatherData;
use Livewire\Component;
use Livewire\WithPagination;

class WeatherTable extends Component
{
    use WithPagination;
    public $weatherData;

    public function mount()
    {
        $this->weatherData = WeatherData::with('location', 'weatherCondition')->get();
    }

    public function render()
    {
        return view('livewire.weather'); // Certifique-se de que essa view existe e está no local correto
    }
}