@extends('layout.app');

@section('title', 'il tuo Viaggio');


@section('content');
<section class="py-5 ">
    <div class="container  p-5">
        <div class="d-flex justify-contente-center align-items-center">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header text-center">
                        <h1>{{ $trip->title }}</h1>
                    </div>
                    <div class="card-body d-flex flex-column align-items-start">
                        <p class="card-text"><span>Descrizione:</span> {{  $trip->description }}</p>
                        <p><span>Data di partenza: </span>{{  $trip->start_date }}</p>
                        <p> <span>Data di ritorno:</span>{{ $trip->end_date }}</p>
                    </div>
                </div>
    
            </div>
        </div>
    
    </div>

</section>

@endsection