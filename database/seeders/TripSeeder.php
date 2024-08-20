<?php

namespace Database\Seeders;
use App\Models\Trip;
use App\Models\Day;
use App\Models\Step;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trips = [
            [
                'title' => 'Viaggio a Roma',
                'description' => 'Un viaggio indimenticabile nella capitale italiana',
                'start_date' => Carbon::create('2024', '09', '01'),
                'end_date' => Carbon::create('2024', '09', '10'),
                'days' => [
                    [
                        'date' => Carbon::create('2024', '09', '01'),
                        'steps' => [
                            [
                                'title' => 'Visita al Colosseo',
                                'description' => 'Una visita guidata al famoso Colosseo di Roma.',
                                'latitude' => 41.8919300,
                                'longitude' => 12.5113300,

                            ],
                            [
                                'title' => 'Pranzo a Trastevere',
                                'description' => 'Un pranzo delizioso nel quartiere di Trastevere.',
                                'latitude' => 41.8886,
                                'longitude' => 12.4663,
                            ]
                        ],
                    ],
                    [
                        'date' => Carbon::create('2024', '09', '02'),
                        'steps' => [
                            [
                                'title' => 'Visita ai Musei Vaticani',
                                'description' => 'Esplorazione dei Musei Vaticani e della Cappella Sistina.',
                                'latitude' => 41.9024,
                                'longitude' => 12.4533,
                            ],
                        ],
                    ],
                ]
            ],
            [
                'title' => 'Viaggio a Firenze',
                'description' => 'Esplorando l\'arte e la cultura di Firenze',
                'start_date' => Carbon::create('2024', '10', '01'),
                'end_date' => Carbon::create('2024', '10', '05'),
                'days' => [
                    [
                        'date' => Carbon::create('2024', '09', '01'),
                        'steps' => [
                            [
                                'title' => 'Visita al Colosseo',
                                'description' => 'Una visita guidata al famoso Colosseo di Roma.',
                                'latitude' => 41.8919300,
                                'longitude' => 12.5113300,

                            ],
                            [
                                'title' => 'Pranzo a Trastevere',
                                'description' => 'Un pranzo delizioso nel quartiere di Trastevere.',
                                'latitude' => 41.8886,
                                'longitude' => 12.4663,
                            ]
                        ],
                    ],
                    [
                        'date' => Carbon::create('2024', '09', '02'),
                        'steps' => [
                            [
                                'title' => 'Visita ai Musei Vaticani',
                                'description' => 'Esplorazione dei Musei Vaticani e della Cappella Sistina.',
                                'latitude' => 41.9024,
                                'longitude' => 12.4533,
                            ],
                        ],
                    ],
                ]

            ],
            [
                'title' => 'Viaggio a Venezia',
                'description' => 'Navigando tra i canali di Venezia',
                'start_date' => Carbon::create('2024', '11', '01'),
                'end_date' => Carbon::create('2024', '11', '07'),
                'days' => [
                    [
                        'date' => Carbon::create('2024', '09', '01'),
                        'steps' => [
                            [
                                'title' => 'Visita al Colosseo',
                                'description' => 'Una visita guidata al famoso Colosseo di Roma.',
                                'latitude' => 41.8919300,
                                'longitude' => 12.5113300,

                            ],
                            [
                                'title' => 'Pranzo a Trastevere',
                                'description' => 'Un pranzo delizioso nel quartiere di Trastevere.',
                                'latitude' => 41.8886,
                                'longitude' => 12.4663,
                            ]
                        ],
                    ],
                    [
                        'date' => Carbon::create('2024', '09', '02'),
                        'steps' => [
                            [
                                'title' => 'Visita ai Musei Vaticani',
                                'description' => 'Esplorazione dei Musei Vaticani e della Cappella Sistina.',
                                'latitude' => 41.9024,
                                'longitude' => 12.4533,
                            ],
                        ],
                    ],
                ]
            ],
        ];

        // foreach ($trips as $tripData) {

        //     $new_trip = new Trip();
        //     $new_trip->title = $tripData['title'];
        //     $new_trip->description = $tripData['description'];
        //     $new_trip->start_date = $tripData['start_date'];
        //     $new_trip->end_date = $tripData['end_date'];
        //     $new_trip->save();

        //     foreach ($tripData['days'] as $tripDay){
        //         $tripDay = new Day();
        //         $tripDay->trip_id = $new_trip->id;
        //         $tripDay->date = $tripDay['date'];
        //         $tripDay->save();


        //         foreach ($tripDay['steps'] as $tripStep){
        //             $tripStep = new Step();
        //             $tripStep->day_id = $tripDay->id;
        //             $tripStep->title = $tripStep['title'];
        //             $tripStep->description = $tripStep['description'];
        //             $tripStep->location = $tripStep['location'];
        //             $tripStep->save();
        //         }

        //     }

        // }

        foreach ($trips as $tripData) {
            $new_trip = Trip::create([
                'title' => $tripData['title'],
                'description' => $tripData['description'],
                'start_date' => $tripData['start_date'],
                'end_date' => $tripData['end_date'],
            ]);

            if (isset($tripData['days'])) {
                foreach ($tripData['days'] as $dayData) {
                    $new_day = Day::create([
                        'trip_id' => $new_trip->id,
                        'date' => $dayData['date'],
                    ]);

                    if (isset($dayData['steps'])) {
                        foreach ($dayData['steps'] as $stepData) {
                            Step::create([
                                'day_id' => $new_day->id,
                                'title' => $stepData['title'],
                                'description' => $stepData['description'],
                                'latitude' => $stepData['latitude'],
                                'longitude' => $stepData['longitude'],
                            ]);
                        }
                    }
                }
            }
        }
    }

}

