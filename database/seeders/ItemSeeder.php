<?php

namespace Database\Seeders;

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
            ['name' => 'Item1', 'description' => 'Description1'],
            ['name' => 'Item2', 'description' => 'Description2'],
            ['name' => 'Item3', 'description' => 'Description3'],
            // Add more items here
        ];

        DB::table('items')->insert($items);
    }
}
