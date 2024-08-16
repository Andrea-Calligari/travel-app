<?php

namespace Database\Seeders;
use App\Models\Day;
use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Carbon\Carbon;
class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $trip_ids = Trip::all()->pluck('id')->all();
        // $new_day = new Day();
        // $new_day->trip_id = $faker->randomElement($trip_ids);
        // $new_day->date = Carbon::create('2024', '05', '05');
        // $new_day->save();
    }
}
