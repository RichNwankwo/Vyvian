<?php

use Illuminate\Database\Seeder;

class InterventionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,20) as $row)
        {
            DB::table('intervention')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'user_id' => rand(1,100),
                'phase_id' => rand(1,20)
            ]);
        }

    }
}
