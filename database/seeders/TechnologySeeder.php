<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['JS6', 'SQL', 'HTML', 'CSS', 'PHP', 'LARAVEL', 'VUE'];

        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->technology =  $technology;
            $new_technology->save();
        }
    }
}
