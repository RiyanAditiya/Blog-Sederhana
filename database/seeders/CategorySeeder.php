<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category::create([
            'name' => 'Web Development',
            'slug' => Str::slug('Web Development'),
            'color' => 'bg-red-100',
        ]);

        Category::create([
            'name' => 'Data Analyst',
            'slug' => Str::slug('Data Analyst'),
            'color' => 'bg-green-100',
        ]);

        Category::create([
            'name' => 'UIUX Design',
            'slug' => Str::slug('UIUX Design'),
            'color' => 'bg-blue-100',
        ]);
        
    }
}
