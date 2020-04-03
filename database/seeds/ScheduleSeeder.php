<?php

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use Carbon\Carbon;
class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Schedule::insert([
            [
                'day'=>'lunes',
                'start'=>Carbon::create('2020-04-03 8:00'),
                'end'=>Carbon::create('2020-04-03 23:00')
            ],
            [
                'day'=>'martes',
                'start'=>Carbon::create('2020-04-03 8:00'),
                'end'=>Carbon::create('2020-04-03 23:00')
            ],
            [
                'day'=>'miércoles',
                'start'=>Carbon::create('2020-04-03 8:00'),
                'end'=>Carbon::create('2020-04-03 23:00')
            ],
            [
                'day'=>'jueves',
                'start'=>Carbon::create('2020-04-03 8:00'),
                'end'=>Carbon::create('2020-04-03 23:00')
            ],
            [
            'day'=>'viernes',
            'start'=>Carbon::create('2020-04-03 8:00'),
            'end'=>Carbon::create('2020-04-03 23:00')
            ],
            [
            'day'=>'sábado',
            'start'=>Carbon::create('2020-04-03 8:00'),
            'end'=>Carbon::create('2020-04-03 13:00')
            ]

        ]);
    }
}
