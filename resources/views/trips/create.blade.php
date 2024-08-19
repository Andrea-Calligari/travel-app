@extends('layout.app');

@section('title', 'Crea un nuovo viaggio');


@section('content');
<div class="container text-center">
    <!-- 
    <h1>Crea un nuovo viaggio</h1>
    <form action="{{ route('trips.store') }}" method="POST">

        @csrf
        <div class="form-group text-start mb-3">
            <label for="title">Titolo</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Titolo del viaggio" required>
            <label for="description">Descrizione</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Descrizioone"
                required>
            <label for="start_date">Data di partenza </label>
            <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Data di partenza"
                required>
            <label for="end_date">Data di ritorno</label>
            <input type="date" class="form-control" name="end_date" id="end_date" placeholder="Data di ritorno"
                required>
        </div>

        <div class="form-group text-start mb-3" id="days-container">
            <div class="form-group text-start mb-3">
                <label for="days">Giorno 1:</label>
                <input class="form-control" type="text" id="days" name="days" required>
                <button class="btn btn-warning mt-3" type="button" onclick="aggiungiGiorno()">Aggiungi Giorno</button>

                <div class="form-group text-start mb-3 steps-container">
                    <label for="steps">Tappa 1:</label>
                    <input class="form-control" type="text" id="steps" name="steps" required>
                    <button type="button" class="btn btn-primary mt-3" onclick="aggiungiTappa(this)">Aggiungi
                        Tappa</button>
                </div>
            </div>
        </div>
        <button class="btn btn-success" type="submit">Crea Viaggio</button>
    </form>
    <script>
        let dayIndex = 1;
        let stepIndex = 1;

        function aggiungiGiorno() {
            dayIndex++;
            stepIndex = 1;
            const daysContainer = document.getElementById('days-container');
            const newDay = document.createElement('div');
            newDay.classList.add('day');
            newDay.innerHTML = `
            <label for="day-${dayIndex}-date">Data del Giorno ${dayIndex}:</label>
            <input class="form-control" type="date" id="day-${dayIndex}-date" name="days[${dayIndex - 1}][date]" required>

            <div class="steps-container">
                <div class="step">
                    <label for="day-${dayIndex}-step-1-title">Titolo della Tappa 1:</label>
                    <input class="form-control" type="text" id="day-${dayIndex}-step-1-title" name="days[${dayIndex - 1}][steps][0][title]" required>

                    <label for="day-${dayIndex}-step-1-description">Descrizione:</label>
                    <textarea class="form-control" id="day-${dayIndex}-step-1-description" name="days[${dayIndex - 1}][steps][0][description]" required></textarea>

                    <label for="day-${dayIndex}-step-1-location">Luogo:</label>
                    <input class="form-control" type="text" id="day-${dayIndex}-step-1-location" name="days[${dayIndex - 1}][steps][0][location]" required>
                </div>
            </div>
            <button type="button" onclick="aggiungiTappa(this)">Aggiungi Tappa</button>
        `;
            daysContainer.appendChild(newDay);
        }

        function aggiungiTappa(button) {

            const stepsContainer = button.previousElementSibling;
            const dayDiv = button.parentElement;
            const dayId = dayDiv.querySelector('input[type="date"]').id.split('-')[1];
            stepIndex++;
            const newStep = document.createElement('div');
            newStep.classList.add('step');
            newStep.innerHTML = `
            <label for="day-${dayId}-step-${stepIndex}-title">Titolo della Tappa ${stepIndex}:</label>
            <input class="form-control" type="text" id="day-${dayId}-step-${stepIndex}-title" name="days[${dayId - 1}][steps][${stepIndex - 1}][title]" required>

            <label for="day-${dayId}-step-${stepIndex}-description">Descrizione:</label>
            <textarea class="form-control" id="day-${dayId}-step-${stepIndex}-description" name="days[${dayId - 1}][steps][${stepIndex - 1}][description]" required></textarea>

            <label for="day-${dayId}-step-${stepIndex}-location">Luogo:</label>
            <input class="form-control" type="text" id="day-${dayId}-step-${stepIndex}-location" name="days[${dayId - 1}][steps][${stepIndex - 1}][location]" required>
        `;
            stepsContainer.appendChild(newStep);
        }
    </script> -->
    <div class="container text-center">
        <h1>Crea un nuovo viaggio</h1>
        <form action="{{ route('trips.store') }}" method="POST">
            @csrf
            <div class="form-group text-start mb-3">
                <label for="title">Titolo</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Titolo del viaggio"
                    required>
                <label for="description">Descrizione</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Descrizione"
                    required>
                <label for="start_date">Data di partenza</label>
                <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Data di partenza"
                    required>
                <label for="end_date">Data di ritorno</label>
                <input type="date" class="form-control" name="end_date" id="end_date" placeholder="Data di ritorno"
                    required>
            </div>

            <div class="form-group text-start mb-3" id="days-container">
                <div class="form-group text-start mb-3">
                    <label for="days">Giorno 1:</label>
                    <input class="form-control" type="text" id="days" name="days[0][date]" required>
                    <button class="btn btn-warning mt-3" type="button" onclick="aggiungiGiorno()">Aggiungi
                        Giorno</button>

                    <div class="form-group text-start mb-3 steps-container">
                        <label for="steps">Tappa 1:</label>
                        <input class="form-control" type="text" id="steps" name="days[0][steps][0][title]" required>
                        <button type="button" class="btn btn-primary mt-3" onclick="aggiungiTappa(this)">Aggiungi
                            Tappa</button>
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">Crea Viaggio</button>
        </form>
    </div>

    <script>
        let dayIndex = 1;
        let stepIndex = 1;

        function aggiungiGiorno() {
            dayIndex++;
            stepIndex = 1;
            const daysContainer = document.getElementById('days-container');
            const newDay = document.createElement('div');
            newDay.classList.add('day');
            newDay.innerHTML = `
                <label for="day-${dayIndex}-date">Data del Giorno ${dayIndex}:</label>
                <input class="form-control" type="date" id="day-${dayIndex}-date" name="days[${dayIndex - 1}][date]" required>

                <div class="steps-container">
                    <div class="step">
                        <label for="day-${dayIndex}-step-1-title">Titolo della Tappa 1:</label>
                        <input class="form-control" type="text" id="day-${dayIndex}-step-1-title" name="days[${dayIndex - 1}][steps][0][title]" required>

                        <label for="day-${dayIndex}-step-1-description">Descrizione:</label>
                        <textarea class="form-control" id="day-${dayIndex}-step-1-description" name="days[${dayIndex - 1}][steps][0][description]" required></textarea>

                        <label for="day-${dayIndex}-step-1-location">Luogo:</label>
                        <input class="form-control" type="text" id="day-${dayIndex}-step-1-location" name="days[${dayIndex - 1}][steps][0][location]" required>
                    </div>
                </div>
                <button type="button" class="btn btn-primary mt-3" onclick="aggiungiTappa(this)">Aggiungi Tappa</button>
            `;
            daysContainer.appendChild(newDay);
        }

        function aggiungiTappa(button) {
            const stepsContainer = button.previousElementSibling;
            const dayDiv = button.parentElement;
            const dayId = dayDiv.querySelector('input[type="date"]').id.split('-')[1];
            stepIndex++;
            const newStep = document.createElement('div');
            newStep.classList.add('step');
            newStep.innerHTML = `
                <label for="day-${dayId}-step-${stepIndex}-title">Titolo della Tappa ${stepIndex}:</label>
                <input class="form-control" type="text" id="day-${dayId}-step-${stepIndex}-title" name="days[${dayId - 1}][steps][${stepIndex - 1}][title]" required>

                <label for="day-${dayId}-step-${stepIndex}-description">Descrizione:</label>
                <textarea class="form-control" id="day-${dayId}-step-${stepIndex}-description" name="days[${dayId - 1}][steps][${stepIndex - 1}][description]" required></textarea>

                <label for="day-${dayId}-step-${stepIndex}-location">Luogo:</label>
                <input class="form-control" type="text" id="day-${dayId}-step-${stepIndex}-location" name="days[${dayId - 1}][steps][${stepIndex - 1}][location]" required>
            `;
            stepsContainer.appendChild(newStep);
        }
    </script>
</div>

@endsection