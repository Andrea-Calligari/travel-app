@extends('layout.app');

@section('title', 'Crea un nuovo viaggio');



@section('content')

<div class="container text-center">
    <h1>Crea un nuovo viaggio</h1>
    <form action="{{ route('trips.store') }}" method="POST">
        @csrf
        <div class="form-group text-start mb-3">
            <label for="title">Titolo</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Titolo del viaggio" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="description">Descrizione</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Descrizione"
                required>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="start_date">Data di partenza</label>
            <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Data di partenza"
                required>
            @error('start_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="end_date">Data di ritorno</label>
            <input type="date" class="form-control" name="end_date" id="end_date" placeholder="Data di ritorno"
                required>
            @error('end_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group text-start mb-3" id="days-container">
            <div class="form-group text-start mb-3">
                <label for="day-1-date">Giorno 1:</label>
                <input class="form-control" type="date" id="day-1-date" name="days[0][date]" required>
                @error('days.0.date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-warning mt-3" type="button" onclick="aggiungiGiorno()">Aggiungi Giorno</button>

                <div class="form-group text-start mb-3 steps-container">
                    <label for="day-1-step-1-title">Tappa 1:</label>
                    <input class="form-control" type="text" id="day-1-step-1-title" name="days[0][steps][0][title]"
                        required>
                    @error('days.0.steps.0.title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="day-1-step-1-description">Descrizione tappa:</label>
                    <textarea class="form-control" id="day-1-step-1-description" name="days[0][steps][0][description]"
                        required></textarea>
                    @error('days.0.steps.0.description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="day-1-step-1-latitude">Latitudine:</label>
                    <input class="form-control" type="text" id="day-1-step-1-latitude"
                        name="days[0][steps][0][latitude]" required>
                    @error('days.0.steps.0.latitude')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="day-1-step-1-longitude">Longitudine:</label>
                    <input class="form-control" type="text" id="day-1-step-1-longitude"
                        name="days[0][steps][0][longitude]" required>
                    @error('days.0.steps.0.longitude')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button type="button" class="btn btn-primary mt-3" onclick="aggiungiTappa(this)">Aggiungi
                        Tappa</button>
                </div>
            </div>
        </div>
        <button class="btn btn-success" type="submit">Crea Viaggio</button>
    </form>
</div>
@endsection

<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    console.log('Script caricato correttamente');
    let dayIndex = 1;
    let stepIndex = 1;

    window.aggiungiGiorno = function() {
        dayIndex++;
        stepIndex = 1;
        const daysContainer = document.getElementById('days-container');
        const newDay = document.createElement('div');
        newDay.classList.add('day');
        newDay.innerHTML = `
            <label for="day-${dayIndex}-date">Data del Giorno ${dayIndex}:</label>
            <input class="form-control" type="date" id="day-${dayIndex}-date" name="days[${dayIndex - 1}][date]" required>
            @error('days.${dayIndex - 1}.date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="steps-container">
                <div class="step">
                    <label for="day-${dayIndex}-step-1-title">Titolo della Tappa 1:</label>
                    <input class="form-control" type="text" id="day-${dayIndex}-step-1-title" name="days[${dayIndex - 1}][steps][0][title]" required>
                    @error('days.${dayIndex - 1}.steps.0.title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="day-${dayIndex}-step-1-description">Descrizione:</label>
                    <textarea class="form-control" id="day-${dayIndex}-step-1-description" name="days[${dayIndex - 1}][steps][0][description]" required></textarea>
                    @error('days.${dayIndex - 1}.steps.0.description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="day-${dayIndex}-step-1-latitude">Latitudine:</label>
                    <input class="form-control" type="text" id="day-${dayIndex}-step-1-latitude" name="days[${dayIndex - 1}][steps][0][latitude]" required>
                    @error('days.${dayIndex - 1}.steps.0.latitude')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="day-${dayIndex}-step-1-longitude">Longitudine:</label>
                    <input class="form-control" type="text" id="day-${dayIndex}-step-1-longitudine" name="days[${dayIndex - 1}][steps][0][longitude]" required>
                    @error('days.${dayIndex - 1}.steps.0.longitude')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="button" class="btn btn-primary mt-3" onclick="aggiungiTappa(${dayIndex})">Aggiungi Tappa</button>
        `;
        daysContainer.appendChild(newDay);
    }


   
    window.aggiungiTappa = function(button) {
        const dayDiv = button.closest('.form-group');
        console.log("dayDiv:", dayDiv); // Debug: verifica che dayDiv sia trovato

        let stepsContainer = dayDiv.querySelector('.steps-container');
        console.log("stepsContainer:", stepsContainer); // Debug: verifica che stepsContainer sia trovato

        // Se stepsContainer non esiste, crealo
        if (!stepsContainer) {
            stepsContainer = document.createElement('div');
            stepsContainer.classList.add('form-group', 'text-start', 'mb-3', 'steps-container');
            dayDiv.appendChild(stepsContainer);
            console.log("stepsContainer creato:", stepsContainer); // Debug: verifica che stepsContainer sia stato creato
        }

        stepIndex++;
        const newStep = document.createElement('div');
        newStep.classList.add('step');
        newStep.innerHTML = `
            <label for="day-1-step-${stepIndex}-title">Titolo della Tappa ${stepIndex}:</label>
            <input class="form-control" type="text" id="day-1-step-${stepIndex}-title" name="days[0][steps][${stepIndex - 1}][title]" required>
            @error('days.0.steps.${stepIndex - 1}.title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="day-1-step-${stepIndex}-description">Descrizione:</label>
            <textarea class="form-control" id="day-1-step-${stepIndex}-description" name="days[0][steps][${stepIndex - 1}][description]" required></textarea>
            @error('days.0.steps.${stepIndex - 1}.description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="day-1-step-${stepIndex}-latitude">Latitudine:</label>
            <input class="form-control" type="text" id="day-1-step-${stepIndex}-latitude" name="days[0][steps][${stepIndex - 1}][latitude]" required>
            @error('days.0.steps.${stepIndex - 1}.latitude')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="day-1-step-${stepIndex}-longitude">Longitudine:</label>
            <input class="form-control" type="text" id="day-1-step-${stepIndex}-longitude" name="days[0][steps][${stepIndex - 1}][longitude]" required>
            @error('days.0.steps.${stepIndex - 1}.longitude')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        `;
        stepsContainer.appendChild(newStep);
    }});

</script>