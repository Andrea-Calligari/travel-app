@extends('layout.app')

@section('title', 'Viaggi')

@section('content')

<section class="py-5">
    <div class="container-fluid">
        <div class="row">
            @foreach ($trips as $trip)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <div>{{$trip->title}}</div>
                            <div>{{$trip->start_date}}</div>
                            <div>{{$trip->end_date}}</div>
                            <div>{{$trip->description}}</div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</section>






@endsection