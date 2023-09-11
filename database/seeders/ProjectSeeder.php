<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder


{
    public function run(Generator $faker): void
    {
        $type_ids = Type::pluck('id')->toArray();

        Storage::makeDirectory('project_images');
        for ($i = 1; $i <= 5; $i++) {
            $project = new Project();
            $project->type_id = Arr::random($type_ids);
            $project->title = $faker->text(20);
            $project->slug = Str::slug($project->title, '-');
            //$project->image = Storage::putFile('project_images', $faker->image(storage_path('app/public/project_images'), 250, 250));
            $project->content = $faker->paragraph(50, true);
            $project->save();
        }
    }
}
