<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Priority;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priorities = [
            'Low',
            'Medium',
            'High',
            'Urgent',
        ];

        foreach ($priorities as $priority) {
            Priority::create([
                'name' => $priority,
            ]);
        }
    }
}
