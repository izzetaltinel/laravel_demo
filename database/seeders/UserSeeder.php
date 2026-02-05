<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $totalRecords = 910_000;
        $chunkSize = 5_000; // RAM’e göre 1k–10k arası ideal

        for ($i = 0; $i < $totalRecords; $i += $chunkSize) {

            $users = [];

            for ($j = 0; $j < $chunkSize; $j++) {
                $users[] = [
                    'name' => fake()->name(),
                    'surname' => fake()->lastName(),
                    'email' => fake()->userName() . $i . $j . '@example.com',
                    'birthdate' => fake()->date(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('user')->insert($users);

            // unique() çakışmalarını önlemek için reset
            fake()->unique(true);

            echo "Inserted: " . min($i + $chunkSize, $totalRecords) . " users\n";
        }
    }
}
