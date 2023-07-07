<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;
use App\Models\Task;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()->count(2)
        ->for(User::factory()->create())
        ->has(Task::factory()->count(10), 'tasks')->create();
    }
}
