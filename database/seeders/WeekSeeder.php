<?php

namespace Database\Seeders;

use App\Models\Week;
use Illuminate\Database\Seeder;

class WeekSeeder extends Seeder
{
    protected $weeks = [
        [
            'name' => 'Domingo',
            'code' => 0
        ],
        [
            'name' => 'Segunda-Feira',
            'code' => 1
        ],
        [
            'name' => 'Terça-Feira',
            'code' => 2
        ],
        [
            'name' => 'Quarta-Feira',
            'code' => 3
        ],
        [
            'name' => 'Quinta-Feira',
            'code' => 4
        ],
        [
            'name' => 'Sexta-feira',
            'code' => 5
        ],
        [
            'name' => 'Sábado',
            'code' => 6
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->weeks as $week) {
            Week::create([
                'name' => $week['name'],
                'code' => $week['code']
            ]);
        }
    }
}
