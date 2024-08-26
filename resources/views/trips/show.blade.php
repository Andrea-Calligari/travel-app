@extends('layout.app')

@section('title', 'Il tuo Viaggio')

@section('content')
<section class="py-5">
    <div class="container p-5">
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>{{ $trip->title }}</h1>
                    </div>
                    <div class="card-body d-flex flex-column align-items-start">
                        <p class="card-text"><span>Descrizione:</span> {{ $trip->description }}</p>
                        <p><span>Data di partenza: </span>{{ $trip->start_date }}</p>
                        <p><span>Data di ritorno:</span>{{ $trip->end_date }}</p>

                        @foreach ($trip->days as $dayIndex => $day)
                            <div class="mt-4">
                                <h4>Giorno {{ $dayIndex + 1 }}: {{ $day->date }}</h4>
                                @foreach ($day->steps as $stepIndex => $step)
                                    <div class="ml-3">
                                        <h5>Tappa {{ $stepIndex + 1 }}: {{ $step->title }}</h5>
                                        <p><span>Descrizione:</span> {{ $step->description }}</p>
                                        <p><span>Latitudine:</span> {{ $step->latitude }}</p>
                                        <p><span>Longitudine:</span> {{ $step->longitude }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <div id="map" style="height: 500px; width: 100%;"></div>

                        <form action="{{ route('trips.destroy', $trip) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps-web.min.js"></script>
<link rel="stylesheet" href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps.css">
<script>
    var tripLongitude = parseFloat('{{ $step->longitude }}');
    var tripLatitude = parseFloat('{{ $step->latitude }}');

    if (isNaN(tripLongitude) || isNaN(tripLatitude)) {
        console.error('Invalid trip coordinates:', tripLongitude, tripLatitude);
    } else {
        var map = tt.map({
            key: '{{ env('TOMTOM_API_KEY') }}',
            container: 'map',
            center: [tripLongitude, tripLatitude],
            zoom: 10
        });
       

        @foreach($trip->days as $day)
            @foreach($day->steps as $step)
                console.log('Step coordinates:', '{{ $step->longitude }}', '{{ $step->latitude }}');

                var stepLongitude = parseFloat('{{ $step->longitude }}');
                var stepLatitude = parseFloat('{{ $step->latitude }}');

                if (!isNaN(stepLongitude) && stepLongitude >= -180 && stepLongitude <= 180 &&
                    !isNaN(stepLatitude) && stepLatitude >= -90 && stepLatitude <= 90) {
                    var marker = new tt.Marker()
                        .setLngLat([stepLongitude, stepLatitude])
                        .setPopup(new tt.Popup({ offset: 35 }).setText('{{ $step->title }}'))
                        .addTo(map);
                }
            @endforeach
        @endforeach
    }
</script>

@endsection