<?php

namespace Database\Seeders;

use App\Models\Notebook;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        for ($i = 1; $i <= 8; $i++) {
            Notebook::create([
                'name' => 'Admin ' . $i,
                'company' => 'Test Company',
                'phone' => '+7999888776' . $i,
                'email' => 'admin' . $i . '@example.com',
                'date_of_birth' => '1998-09-09',
                'url' => 'https://via.placeholder.com/150?text=Image+' . $i,
            ]);
        }
    }
}
