<?php

namespace Database\Seeders;

use App\Models\ChecklistItem;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('users')->truncate();
        DB::table('checklist_items')->truncate();
        DB::table('tasks')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        $taskData = json_decode(File::get(database_path('seeders/data/task.json')), true);
        $checklistData = json_decode(File::get(database_path('seeders/data/checklist.json')), true);
        
        foreach ($taskData as $data) {
            Task::create($data);
        }

        // Get task ids to use for checklist items
        $taskIds = Task::pluck('id')->all();

        foreach ($checklistData as $data) {
            $data['task_id'] = $taskIds[array_rand($taskIds)];
            ChecklistItem::create($data);
        }

        User::factory(10)->create();
        User::factory(2)->unverified()->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
