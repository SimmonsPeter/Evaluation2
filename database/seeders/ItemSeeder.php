<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $items = [
            ['name' => 'Item1', 'description' => 'Description1','date_field'=>Carbon::now()],
            ['name' => 'Item2', 'description' => 'Description2','date_field'=>Carbon::now()],
            ['name' => 'Item3', 'description' => 'Description3','date_field'=>Carbon::now()],
            // Add more items here
        ];

        DB::table('items')->insert($items);
    }
}
