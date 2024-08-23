@extends('layout.app')

@section('title', 'il tuo Viaggio')

@section('content');
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


@endsection