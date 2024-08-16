<?php

namespace Database\Seeders;
use App\Models\Day;
use App\Models\Step;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $day_ids = Day::all()->pluck('id')->all();

        // $new_step = new Step();
        // $new_step->day_id = $faker->randomElement($day_ids);
        // $new_step->title  = 'Visita al Colosseo';
        // $new_step->description =  'Una visita guidata al famoso Colosseo di Roma.';
        // $new_step->location = 'ROma, Italia';
        // $new_step->save();


    }
}
