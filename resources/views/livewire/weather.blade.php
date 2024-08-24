@extends('components.layouts.app')

@section('content')
    <h1 class="mb-4">Weather Data</h1>
    <div class="table-responsive table-lg">
        <table id="weatherTable" class="table table-bordered table-borderless text-nowrap w-100 ">
            <thead>
                <tr>
                    <th scope="col" class="text-start">Localização</th>
                    <th scope="col" class="text-start">País</th>
                    <th scope="col" class="text-start">Longitude</th>
                    <th scope="col" class="text-start">Latitude</th>
                    <th scope="col" class="text-start">Clima</th>
                    <th scope="col" class="text-start">Temperatura</th>
                    <th scope="col" class="text-start">Sensação Térmica</th>
                    <th scope="col" class="text-start">ATM</th>
                </tr>
            </thead>
            <tbody>
                @forelse($weatherData as $data)
                    <tr>
                        <td scope="col" >{{ $data->location->name }}</td>
                        <td scope="col" >{{ $data->location->country }}</td>
                        <td scope="col" >{{ $data->location->lon }}</td>
                        <td scope="col" >{{ $data->location->lat }}</td>
                        <td scope="col" ><img src="https://openweathermap.org/img/wn/{{ $data->weatherCondition->icon }}.png" alt="Weather Icon">{{ $data->weatherCondition->description }}</td>
                        <td scope="col" >{{ $data->temp }} °C</td>
                        <td scope="col" >{{ $data->feels_like }} °C</td>
                        <td scope="col" >{{ $data->pressure }} hPa</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        
        $('#weatherTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    </script>
@endsection
