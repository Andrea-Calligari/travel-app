<?php

namespace App\Http\Controllers;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::with('days.steps')->get();

        return view('trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trips.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validazione
        try {
            $validateData = $request->validate([
                'title' => 'required|string|max:200',
                'description' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'days' => 'required|array',
                'days.*.date' => 'required|date',
                'days.*.steps' => 'required|array',
                'days.*.steps.*.title' => 'required|string|max:255',
                'days.*.steps.*.description' => 'required|string',
                'days.*.steps.*.latitude' => 'required|numeric',
                'days.*.steps.*.longitude' => 'required|numeric',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        //creazione viaggio dopo validazione 
        $new_trip = Trip::create($validateData);

        //crazione giorni
        foreach ($validateData['days'] as $dayData) {
            $day = $new_trip->days()->create(['date' => $dayData['date']]);
            //creazione tappe
            foreach ($dayData['steps'] as $stepData) {
                $day->steps()->create($stepData);
            }
        }

        return redirect()->route('trips.show', $new_trip);

    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        return view('trips.show', compact('trip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
