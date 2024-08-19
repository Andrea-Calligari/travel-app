@extends('layout.app')

@section('title', 'Viaggi')

@section('content')

<section class="py-5">
    <div class="container-fluid">
        <div class="row">
            @foreach ($trips as $trip)
                <div class="col-4 p-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{$trip->title}}</h5>
                            <p class="card-text"><strong>Inizio:</strong> {{$trip->start_date}}</p>
                            <p class="card-text"><strong>Fine:</strong> {{$trip->end_date}}</p>
                            <p class="card-text">{{$trip->description}}</p>
                        </div>
                        @if ($trip->days->isNotEmpty() && $trip->days->first()->steps->isNotEmpty())
                            <div class="accordion accordion-flush" id="accordionFlushExample{{ $trip->id }}">
                                <div class="accordion-item border-2">
                                    <h2 class="accordion-header" id="heading{{ $trip->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{ $trip->id }}" aria-expanded="false"
                                            aria-controls="flush-collapse{{ $trip->id }}">
                                            Tappe e giornate
                                        </button>
                                    </h2>
                                    <div id="flush-collapse{{ $trip->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $trip->id }}"
                                        data-parent="#accordionFlushExample{{ $trip->id }}">
                                        <div class="accordion-body">
                                            @foreach ($trip->days as $day)
                                                <p><strong>Data del Giorno:</strong> {{ $day->date }}</p>
                                                @foreach ($day->steps as $step)
                                                    <p><strong>Titolo della Tappa:</strong> {{ $step->title }}</p>
                                                    <p><strong>Descrizione della Tappa:</strong> {{ $step->description }}</p>
                                                    <p><strong>Luogo della Tappa:</strong> {{ $step->location }}</p>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection