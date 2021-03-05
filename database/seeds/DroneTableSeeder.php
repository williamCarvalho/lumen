<?php

use App\Models\Drone;
use Illuminate\Database\Seeder;

class DroneTableSeeder extends Seeder
{
    public function run()
    {
        Drone::create([
            'image' => 'http://laravelnews.imgix.net/images/lumen-leader.png',
            'name' => 'Ryan Victor Dias',
            'address' => 'Rua Dona Aroly Figueiredo, Teresina - PI',
            'battery' => '10',
            'max_speed' => '1.5',
            'average_speed' => '11.55',
            'status' => 'success',
        ]);

        Drone::create([
            'image' => 'http://laravelnews.imgix.net/images/lumen-leader.png',
            'name' => 'Geraldo Mário Calebe Aparício',
            'address' => 'Travessa WE-65 A, Ananindeua - PA',
            'battery' => '33',
            'max_speed' => '2.11',
            'average_speed' => '21.11',
            'status' => 'failed',
        ]);

        Drone::create([
            'image' => 'http://laravelnews.imgix.net/images/lumen-leader.png',
            'name' => 'Rosângela Helena Patrícia Aragão',
            'address' => 'Rua Ladário Teixeira, São Paulo - SP',
            'battery' => '88',
            'max_speed' => '2.66',
            'average_speed' => '266.26',
            'status' => 'success',
        ]);
    }
}
