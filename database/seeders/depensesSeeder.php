<?php

namespace Database\Seeders;

use App\Models\Depense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class depensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Depense::factory()->create([
            'name'=>'landlc'
        ]);
    }
}
