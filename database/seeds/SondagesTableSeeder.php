<?php

use Illuminate\Database\Seeder;
use App\Sondages;

class SondagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sondages::create([
            'name' => 'sondage_1'
        ]);
    }
}
