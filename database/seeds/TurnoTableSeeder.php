<?php

use Illuminate\Database\Seeder;

class TurnoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shift = new \App\Turno();
        $shift->nome = 'M';
        $shift->save();

        $shift = new \App\Turno();
        $shift->nome = 'T';
        $shift->save();
    }
}
