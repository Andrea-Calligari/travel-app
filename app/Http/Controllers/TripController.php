<?php

namespace App\Http\Controllers;
use App\Models\Trip;
use Illuminate\Http\Request;
// use ValidationException;

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
                'days.*.steps' => 'nullable|array',
                'days.*.steps.*.title' => 'required_with:days.*.steps|string|max:255',
                'days.*.steps.*.description' => 'required_with:days.*.steps|string',
                'days.*.steps.*.latitude' => 'required_with:days.*.steps|numeric',
                'days.*.steps.*.longitude' => 'required_with:days.*.steps|numeric',
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
    public function show($id)
    {
        $trip = Trip::with('days.steps')->findOrFail($id);
        return view('trips.show', compact('trip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        $trip->load('days.steps');
        return view('trips.edit', compact('trip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'days' => 'required|array',
            'days.*.date' => 'required|date',
            'days.*.steps' => 'nullable|array',
            'days.*.steps.*.title' => 'required_with:days.*.steps|string|max:255',
            'days.*.steps.*.description' => 'required_with:days.*.steps|string',
            'days.*.steps.*.latitude' => 'required_with:days.*.steps|numeric',
            'days.*.steps.*.longitude' => 'required_with:days.*.steps|numeric',
        ]);

        $trip->update($validateData);

        foreach ($validateData['days'] as $dayData) {
            $day = $trip->days()->updateOrCreate(
                ['id' => $dayData['id'] ?? null],
                ['date' => $dayData['date']]
            );

            if (isset($dayData['steps'])) {
                foreach ($dayData['steps'] as $stepData) {
                    $day->steps()->updateOrCreate(
                        ['id' => $stepData['id'] ?? null],
                        [
                            'title' => $stepData['title'],
                            'description' => $stepData['description'],
                            'latitude' => $stepData['latitude'],
                            'longitude' => $stepData['longitude']
                        ]
                    );
                }
            }
        }

        return redirect()->route('trips.show', $trip);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->route('trips.index');
    }
}
