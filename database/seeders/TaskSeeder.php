<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Project;
use App\Models\Tag;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory()->count(4)
        ->for(Project::factory()->create())
        ->hasAttached(Tag::factory()->count(5),[],'tags')
        ->count(10)->create();
    }
}

