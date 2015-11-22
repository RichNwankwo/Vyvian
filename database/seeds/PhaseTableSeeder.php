<?php

use Illuminate\Database\Seeder;

class PhaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,10) as $phase)
        {
            DB::table('phase')->insert([
                'phase' => str_random(10)
            ]);
        }
    }
}
