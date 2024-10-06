<?php

namespace Database\Seeders;

use App\Models\permohonan_surat;
use App\Models\PermohonanSurat;
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
        // User::factory(10)->create();
        User::where('username', 'admin')->delete();
         // Membuat user default
         User::factory()->create([
            'username' => 'admin',
            'password' => bcrypt('admin123321'),
            'email' => 'admin@gmail.com', // Jangan lupa bcrypt untuk hashing password
            'role' =>'admin',
            
        ]);

     

    
    }
}
