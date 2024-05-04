<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //detele all file images
        Storage::deleteDirectory('public/products');
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'roles' => 'ADMIN',
            'password' => bcrypt('12345678')
        ]);



        user::factory(10)->create();

        Product::factory(10)->create();
    }
}
