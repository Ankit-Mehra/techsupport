<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Open',
            'Closed',
            'Pending',
        ];

        foreach ($statuses as $status) {
            Status::create([
                'name' => $status,
            ]);
        }
    }
}
