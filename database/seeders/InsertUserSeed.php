<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table("user")->insert(['name' => 'Joao']);
        DB::table("user")->insert(['name' => 'Jose']);
        DB::table("user")->insert(['name' => 'Paulo']);
    }
}
