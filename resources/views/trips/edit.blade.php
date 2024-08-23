@extends('layout.app')
@section('title', 'Modifica viaggio')

@section('content')

<div class=" py-3 container text-center">
    <h1>Modifica Viaggio</h1>

    <form action="{{ route('trips.store') }}" method="POST">
    @csrf
    <div class="form-group text-start mb-3">
        <label for="title">Titolo</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" placeholder="Titolo del viaggio" required>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="description">Descrizione</label>
        <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}" placeholder="Descrizione" required>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="start_date">Data di partenza</label>
        <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
        @error('start_date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="end_date">Data di ritorno</label>
        <input type="date" class="form-control" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
        @error('end_date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group text-start mb-3" id="days-container">
        <div class="form-group text-start mb-3">
            <label for="day-1-date">Giorno 1:</label>
            <input class="form-control" type="date" id="day-1-date" name="days[0][date]" value="{{ old('days.0.date') }}" required>
            @error('days.0.date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group text-start mb-3 steps-container">
                <label for="day-1-step-1-title">Tappa 1:</label>
                <input class="form-control" type="text" id="day-1-step-1-title" name="days[0][steps][0][title]" value="{{ old('days.0.steps.0.title') }}" required>
                @error('days.0.steps.0.title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="day-1-step-1-description">Descrizione tappa:</label>
                <textarea class="form-control" id="day-1-step-1-description" name="days[0][steps][0][description]" required>{{ old('days.0.steps.0.description') }}</textarea>
                @error('days.0.steps.0.description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="day-1-step-1-latitude">Latitudine:</label>
                <input class="form-control" type="text" id="day-1-step-1-latitude" name="days[0][steps][0][latitude]" value="{{ old('days.0.steps.0.latitude') }}" required>
                @error('days.0.steps.0.latitude')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="day-1-step-1-longitude">Longitudine:</label>
                <input class="form-control" type="text" id="day-1-step-1-longitude" name="days[0][steps][0][longitude]" value="{{ old('days.0.steps.0.longitude') }}" required>
                @error('days.0.steps.0.longitude')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <button class="btn btn-success" type="submit">Crea Viaggio</button>
</form>


</div>
@endsection