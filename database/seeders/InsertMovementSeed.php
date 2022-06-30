<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertMovementSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table("movement")->insert(['name' => 'Deadlift']);
        DB::table("movement")->insert(['name' => 'Back Squat']);
        DB::table("movement")->insert(['name' => 'Bench Press']);
    }
}
